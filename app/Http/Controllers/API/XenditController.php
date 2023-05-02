<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                'success_redirect_url' => url('payment-sukses'),
                'failure_redirect_url' => url('payment-gagal'),
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
        $donation->paid_at = $data['paid_at'];
        $donation->save();
        DB::commit();

        return $this->setResponse($donation, 'Invoice updated successfully');
    }
}
