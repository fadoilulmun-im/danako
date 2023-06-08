<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\DonationMail;
use App\Models\Donation;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Str;

class XenditController extends Controller
{
    public function createInvoice(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'amount' => 'required|numeric',
            'campaign_id' => 'required|exists:campaigns,id',
            'hope' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first, 422);
        }

        DB::beginTransaction();

        $external_id = 'DA-' . Str::random(10);

        $client = new Client();
        $data_request = $client->request('POST', config('xendit.url') . 'invoices', [
            'headers' => [
                'Authorization' => 'Basic ' . config('xendit.key_auth'),
            ],
            'json' => [
                'external_id' => $external_id,
                'amount' => $request->amount,
                'customer' => [
                    'given_names' => $user->name ?? null,
                    'surname' => $user->username ?? null,
                    'email' => $user->email ?? null,
                ],
                'success_redirect_url' => url('payment-sukses/'.$external_id),
                'failure_redirect_url' => url('payment-gagal/'.$external_id),
            ],
        ]);

        $response = json_decode($data_request->getBody());

        $donation = new Donation();
        $donation->user_id = $user->id;
        $donation->campaign_id = $request->campaign_id;
        $donation->amount_donations = $request->amount;
        $donation->hope = $request->hope;
        $donation->status = $response->status;
        $donation->payment_link = $response->invoice_url;
        $donation->external_id = $external_id;
        $donation->save();

        DB::commit();

        return $this->setResponse($donation, 'Invoice created successfully', 201);
    }

    public function callback(Request $request)
    {

        if(config('env.app_env') == 'test-local'){
            $client = new Client();
            $data_request = $client->request('POST', config('env.local_url') . '/api/xendit/callback', [
                'headers' => ['ngrok-skip-browser-warning' => 'true'],
                'form_params' => $request->all(),
            ]);

            return json_decode($data_request->getBody());
        }

        // $data = request()->all();
        DB::beginTransaction();
        $donation = Donation::where('external_id', $request->external_id)->first();
        if(!$donation){
            return $this->setResponse(null, 'Donation not found', 404);
        }
        $donation->status = $request->status;
        $donation->payment_method = $request->payment_method;
        $donation->payment_channel = $request->payment_channel;
        if($request->paid_at){
            $donation->paid_at = date('Y-m-d H:i:s', strtotime($request->paid_at));
        }
        $donation->save();

        if(($donation->status == 'PAID') && ($donation->paid_at)){
            $grossAmount = $donation->amount_donations;
            switch ($donation->payment_method) {
                case 'QR_CODE':
                    $transactionFee = round(($grossAmount * 0.007));
                    $platformFee = round((0.05 * ($grossAmount - $transactionFee)));
                    $totalNetAmount = $grossAmount - $transactionFee - $platformFee;
                    $donation->transaction_fee = $transactionFee;
                    $donation->platform_fee = $platformFee;
                    $donation->net_amount = $totalNetAmount;
                    $donation->save();
                    break;

                case 'BANK_TRANSFER':
                    $transactionFee = 4000;
                    $tax = round(($transactionFee * 0.11));
                    $platformFee = round((0.05 * ($grossAmount - $transactionFee - $tax)));
                    $totalNetAmount = $grossAmount - $transactionFee - $tax - $platformFee;
                    $donation->transaction_fee = $transactionFee + $tax;
                    $donation->platform_fee = $platformFee;
                    $donation->net_amount = $totalNetAmount;
                    $donation->save();
                    break;

                case 'EWALLET':
                    $transactionFee = round(($grossAmount * 0.015));
                    $tax = round(($transactionFee * 0.11));
                    $platformFee = round((0.05 * ($grossAmount - $transactionFee - $tax)));
                    $totalNetAmount = $grossAmount - $transactionFee - $tax - $platformFee;
                    $donation->transaction_fee = $$transactionFee + $tax;
                    $donation->platform_fee = $platformFee;
                    $donation->net_amount = $totalNetAmount;
                    $donation->save();
                    break;
                
                default:
                $donation->transaction_fee = 0;
                $donation->platform_fee = 0;
                $donation->net_amount = 0;
                $donation->save();
            }
        }

        if($donation->status == 'PAID'){
            $campaign = $donation->campaign;
            // $campaign->real_time_amount += $campaign->donations->where('status', 'PAID')->sum('amount');
            $campaign->real_time_amount = Donation::where('status', 'PAID')->where('campaign_id', $campaign->id)->sum('net_amount');
            $campaign->save();
        }
        
        if(($donation->email ?? false) && ($donation->status == 'PAID')){
            Mail::to($donation->email)->send(new DonationMail($donation));
        }

        if(($donation->phone_number ?? false) && ($donation->status == 'PAID')){
            $client = new Client();
            $data_request = $client->request('POST', 'https://broadcast.kamiberbagi.id/index.php/api/send_message', [
                'form_params' => [
                    'token' => config('env.token_api_wa', 'e63b482fd887b408d87a4d66e5913187'),
                    'number' => $donation->phone_number,
                    'message' => "Assalamualaikum Warahmatullahi Wabarakatuh\n\n".
                        "Bapak/Ibu/Sdr ".$donation->name."\n".
                        "telah bertransaksi di ".url('/')."\n".
                        "pada tanggal ".date('Y-m-d H:i:s', strtotime($donation->paid_at))."\n".
                        "sebesar Rp. ".number_format($donation->amount_donations,0,',','.')."\n".
                        "Semoga apa yang anda berikan menjadi keberkahan dan bertambahnya kebahagiaan dunia akhirat anda".
                    "",
                ],
            ]);

            $response_wa = json_decode($data_request->getBody());
        }
        

        DB::commit();

        return $this->setResponse([
            'donation' => $donation,
            'response_wa' => $response_wa ?? null,
        ], 'Invoice updated successfully');
    }
}
