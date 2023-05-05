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
        $data = request()->all();
        DB::beginTransaction();
        $donation = Donation::where('external_id', $data['external_id'])->first();
        $donation->status = $data['status'];
        $donation->payment_method = $data['payment_method'];
        $donation->payment_channel = $data['payment_channel'];
        if(isset($data['paid_at']) && $data['paid_at'] != null){
            $donation->paid_at = date('Y-m-d H:i:s', strtotime($data['paid_at']));
        }
        $donation->save();

        if($donation->status == 'PAID'){
            $campaign = $donation->campaign;
            $campaign->real_time_amount += $campaign->donations->where('status', 'PAID')->sum('amount');
            $campaign->save();
        }
        
        if(($donation->user->email ?? false) && ($donation->status == 'PAID')){
            Mail::to($donation->user->email)->send(new DonationMail($donation));
        }

        if(($donation->user->detail->phone_number ?? false) && ($donation->status == 'PAID')){
            $client = new Client();
            $data_request = $client->request('POST', 'https://broadcast.kamiberbagi.id/index.php/api/send_message', [
                'json' => [
                    'token' => config('env.token_api_wa'),
                    'number' => $donation->user->detail->phone_number,
                    'message' => "
                        Assalamualaikum Warahmatullahi Wabarakatuh
                
                        Bapak/Ibu/Sdr ".$donation->user->name."
                        telah bertransaksi di danako.my.id
                        pada tanggal ".date('Y-m-d H:i:s', $donation->paid_at)."
                        sebesar ".$donation->amount_donations."
                        Semoga apa yang anda berikan menjadi keberkahan dan bertambahnya kebahagiaan dunia akhirat anda
                    ",
                ],
            ]);
        }
        

        DB::commit();

        return $this->setResponse($donation, 'Invoice updated successfully');
    }
}
