<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;
use Yajra\DataTables\DataTables;
use \Str;
use GuzzleHttp\Psr7;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $donation = Donation::with(['campaign.user.detail']);

        $startDate = $request->get('from');
        $endDate = $request->get('to');

        if($startDate && $endDate) {
            $donation->whereDate('donations.created_at', '>=', $startDate);
            $donation->WhereDate('donations.created_at', '<=', $endDate);
        }
        if ($request->filled('status')) {
            $donation->where('status', $request->get('status'));
        }
        if ($request->filled('method')) {
            $donation->where('payment_method', $request->get('method'));
        }
        if ($request->filled('channel')) {
            $donation->where('payment_channel', $request->get('channel'));
        }

        return DataTables::of($donation)
            ->addColumn('action', function ($data) {
                return '
                    <span onclick="detail('. $data->id .')" class="fas fa-eye text-primary me-1" style="font-size: 1.2rem; cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"></span>
                ';
                // <span onclick="edit('. $data->id .')" class="edit-admin fas fa-pen text-warning me-1" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Edit"></span>
                // <span onclick="destroy('. $data->id .')" class="fas fa-trash-alt text-danger" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Delete"></span>
            })
            ->editColumn('payment_link', function($data){
                $html = '';
                if ($data->payment_link != null){
                    $html .= '<a href="'. $data->payment_link .'" onclick="loading()" class="fas fa-link text-primary me-1" style="font-size: 1.2rem" 
                    data-bs-toggle="tooltip" title="Payment link" data-bs-original-title="Payment link" aria-label="Payment link"></a>';
                } else {
                    $html .= '<span align=Center>Not found</span>';
                }  
                return $html;
            })
            // ->editColumn('payment_channel', function($data){
            //     if ($data->payment_channel) {
            //         switch ($data->payment_channel) {
            //             case 'MANDIRI':
            //                 $return  = '<center><img width="70" height="20" src="'. asset('/danako/img/payments/mandiri_logo.png') .'"></center>';
            //                 break;

            //             case 'BRI':
            //                 $return  = '<center><img width="60" height="30" src="'. asset('/danako/img/payments/bri_logo.png') .'"></center>';
            //                 break;

            //             case 'BSI':
            //                 $return  = '<center><img width="60" height="50" src="'. asset('/danako/img/payments/logo-bsi.png') .'"></center>';
            //                 break;

            //             case 'BNI':
            //                 $return  = '<center><img width="60" height="20" src="'. asset('/danako/img/payments/bni_logo.png') .'"></center>';
            //                 break;
                        
            //             case 'PERMATA':
            //                 $return  = '<center><img width="70" height="30" src="'. asset('/danako/img/payments/permata_logo.png') .'"></center>';
            //                 break;
                        
            //             case 'OVO':
            //                 $return  = '<center><img width="60" height="20" src="'. asset('/danako/img/payments/ovo_logo.png') .'"></center>';
            //                 break;

            //             case 'DANA':
            //                 $return  = '<center><img width="65" height="20" src="'. asset('/danako/img/payments/dana_logo.png') .'"></center>';
            //                 break;

            //             case 'LINKAJA':
            //                 $return  = '<center><img width="45" height="40" src="'. asset('/danako/img/payments/linkaja_logo.png') .'"></center>';
            //                 break;

            //             case 'QRIS':
            //                 $return  = '<center><img width="60" height="30" src="'. asset('/danako/img/payments/qris_logo.png') .'" alt="QRIS"></center>';
            //                 break;
                        
            //             default:
            //                 $return = '<center><h5><span class="badge p-1 badge-soft-secondary">'. $data->payment_channel .'</span></h5><center>';
            //                 break;
            //         }
            //         return $return;
            //     } else {
            //         return '<center><h5><span>NOT FOUND</span></h5></center>';
            //     }
            // })
            // ->editColumn('payment_method', function($data){
            //     if ($data->payment_method) {
            //         switch ($data->payment_method) {
            //             case 'QR_CODE':
            //                 $return  = '<center><h5><span>QR Code</span></h5></center>';
            //                 break;

            //             case 'EWALLET':
            //                 $return  = '<center><h5><span>e-Wallet</span></h5></center>';
            //                 break;

            //             case 'BANK_TRANSFER':
            //                 $return  = '<center><h5><span>Bank Transfer</span></h5></center>';
            //                 break;
                        
            //             default:
            //                 $return = '<center><h5><span class="badge p-1 badge-soft-secondary">'. $data->payment_method .'</span></h5><center>';
            //                 break;
            //         }
            //         return $return;
            //     } else {
            //         return '<center><h5><span>NOT FOUND</span></h5></center>';
            //     }
            // })
            ->editColumn('status', function($data){
                if ($data->status) {
                    switch ($data->status) {
                        case 'PAID':
                            $return  = '<h5><span class="badge p-1 badge-soft-success">PAID</span></h5>';
                            break;

                        case 'PENDING':
                            $return  = '<h5><span class="badge p-1 badge-soft-warning">PENDING</span></h5>';
                            break;

                        default:
                            $return = '<h5><span class="badge p-1 badge-soft-danger">'. $data->status .'</span></h5>';
                            break;
                    }
                    return $return;
                } else {
                    return '<h5><span class="badge p-1 badge-soft-danger">UNPAID</span></h5>';
                }
                // if ($data->status == 'PAID'){
                //     return '
                //     <h5><span class="badge p-1 badge-soft-success">Paid</span></h5>
                //     '; 
                // } else {
                //     return '<h5><span class="badge p-1 badge-soft-warning">'. $data->id .'</span></h5>';
                // }   
            })
            ->editColumn('net_amount', function($data){
                if(($data->status == 'PAID') && ($data->paid_at)){
                    $grossAmount = $data->amount_donations;
                    switch ($data->payment_method) {
                        case 'QR_CODE':
                            $transactionFee = round(($grossAmount * 0.007));
                            $platformFee = round((0.05 * ($grossAmount - $transactionFee)));
                            $totalNetAmount = $grossAmount - $transactionFee - $platformFee;
                            return $data->net_amount = $totalNetAmount;
                            break;
        
                        case 'BANK_TRANSFER':
                            $transactionFee = 4000;
                            $tax = round(($transactionFee * 0.11));
                            $platformFee = round((0.05 * ($grossAmount - $transactionFee - $tax)));
                            $totalNetAmount = $grossAmount - $transactionFee - $tax - $platformFee;
                            return $data->net_amount = $totalNetAmount;
                            break;

                        case 'EWALLET':
                            $transactionFee = round(($grossAmount * 0.015));
                            $tax = round(($transactionFee * 0.11));
                            $platformFee = round((0.05 * ($grossAmount - $transactionFee - $tax)));
                            $totalNetAmount = $grossAmount - $transactionFee - $tax - $platformFee;
                            return $data->net_amount = $totalNetAmount;
                            // .' platfee = '.$platformFee.' tax = '.$tax.' tfee = '.$transactionFee;
                            break;
        
                        default:
                            return 0;
                            break;
                    }
                }
            })
            ->addColumn('transaction_fee', function ($data) {
                if(($data->status == 'PAID') && ($data->paid_at)){
                    $grossAmount = $data->amount_donations;
                    switch ($data->payment_method) {
                        case 'QR_CODE':
                            $transactionFee = round(($grossAmount * 0.007));
                            return $transactionFee;
                            break;
        
                        case 'BANK_TRANSFER':
                            $transactionFee = 4000;
                            $tax = round(($transactionFee * 0.11));
                            return $transactionFee + $tax;
                            break;

                        case 'EWALLET':
                            $transactionFee = round(($grossAmount * 0.015));
                            $tax = round(($transactionFee * 0.11));
                            return $transactionFee + $tax;
                            // .' platfee = '.$platformFee.' tax = '.$tax.' tfee = '.$transactionFee;
                            break;
        
                        default:
                            return 0;
                            break;
                    }
                }
            })
            ->addColumn('platform_fee', function ($data) {
                if(($data->status == 'PAID') && ($data->paid_at)){
                    $grossAmount = $data->amount_donations;
                    switch ($data->payment_method) {
                        case 'QR_CODE':
                            $transactionFee = round(($grossAmount * 0.007));
                            $platformFee = round((0.05 * ($grossAmount - $transactionFee)));
                            return $platformFee;
                            break;
        
                        case 'BANK_TRANSFER':
                            $transactionFee = 4000;
                            $tax = round(($transactionFee * 0.11));
                            $platformFee = round((0.05 * ($grossAmount - $transactionFee - $tax)));
                            $totalNetAmount = $grossAmount - $transactionFee - $tax - $platformFee;
                            return $platformFee;
                            break;

                        case 'EWALLET':
                            $transactionFee = round(($grossAmount * 0.015));
                            $tax = round(($transactionFee * 0.11));
                            $platformFee = round((0.05 * ($grossAmount - $transactionFee - $tax)));
                            $totalNetAmount = $grossAmount - $transactionFee - $tax - $platformFee;
                            return $platformFee;
                            // .' platfee = '.$platformFee.' tax = '.$tax.' tfee = '.$transactionFee;
                            break;
        
                        default:
                            return 0;
                            break;
                    }
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'payment_link', 'status', 'transaction_fee', 'platform_fee'])
            ->make(true);
    }

    public function rules()
    {
        return [
            'user_id' => 'nullable|exists:users,id',
            'campaign_id' => 'required|exists:campaigns,id',
            'amount_donations' => 'required|numeric',
            'hope' => 'nullable|string',
            'name' => 'nullable|string',
            'email' => 'nullable|email|string',
            'phone_number' => 'nullable|numeric',
        ];
    }

    public function store(Request $request)
    {
        if($request->filled('user_id')){
            $user = User::find($request->input('user_id'));
        }else{
            $user = auth()->user();
        }

        DB::beginTransaction();

        if($user){
            $request->request->add(['user_id' => $user->id]);
            if($user->name){
                $request->request->add(['name' => $user->name]);
            }else{
                $user->name = $request->input('name');
            }

            if($user->email){
                $request->request->add(['email' => $user->email]);
            }else{
                $user->email = $request->input('email');
            }

            if($user->phone_number){
                $request->request->add(['phone_number' => $user->phone_number]);
            }else{
                $user->phone_number = $request->input('phone_number');
            }

            $user->save();
        }

        $rules = $this->rules();
        $validator = Validator::make($request->all(), $rules, [], ['amount_donations' => 'nominal donasi']);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first(), 422);
        }

        $external_id = 'DA-' . strtoupper(Str::random(10));
        while (Donation::where('external_id', $external_id)->first()) {
            $external_id = 'DA-' . strtoupper(Str::random(10));
        }

        $customer = [
            'given_names' => $request->name,
            'email' => $request->email,
        ];

        if($request->filled('phone_number')){
            $customer['mobile_number'] = $request->phone_number;
        }

        try {
            $client = new Client();
            $data_request = $client->request('POST', config('xendit.url') . 'invoices', [
                'headers' => [
                    'Authorization' => 'Basic ' . config('xendit.key_auth'),
                ],
                'json' => [
                    'external_id' => $external_id,
                    'amount' => $request->input('amount_donations'),
                    'description' => 'Donasi untuk - ' . Campaign::find($request->input('campaign_id'))->title,
                    'customer' => $customer,
                    'success_redirect_url' => url('payment-sukses/'.$external_id),
                    'failure_redirect_url' => url('payment-gagal/'.$external_id),
                    'customer_notification_preference' => [
                        'invoice_created' => [
                            "whatsapp",
                            "email",
                        ],
                        'invoice_reminder' => [
                            "whatsapp",
                        ],
                        'invoice_expired' => [
                            "whatsapp",
                            "email",
                        ],
                    ],
                    'locale' => 'id',
                ],
            ]);
            $response = json_decode($data_request->getBody());
        } catch (ClientException $e) {
            return $this->setResponse([
                'request' => Psr7\Message::toString($e->getRequest()),
                'response' => Psr7\Message::toString($e->getResponse()),
            ], $e->getMessage(), $e->getCode());
        }
        
        $donation = new Donation;
        $donation->user_id = $request->input('user_id');
        $donation->campaign_id = $request->input('campaign_id');
        $donation->amount_donations = $request->input('amount_donations');
        $donation->hope = $request->input('hope');

        $donation->name = $request->input('name');
        $donation->email = $request->input('email');
        $donation->phone_number = $request->input('phone_number');

        $donation->status = $response->status;
        $donation->payment_link = $response->invoice_url;
        $donation->external_id = $external_id;

        $donation->save();
        DB::commit();

        return $this->setResponse($donation, 'Donation created successfully', 201);
    }

    public function show($id)
    {
        $donation = Donation::with(['user', 'campaign'])->find($id);

        if(!$donation){
            return $this->setResponse(null, 'Donation not found', 404);
        }

        return $this->setResponse($donation, 'Donation retrieved successfully');
    }

    public function update(Request $request, $id)
    {
        $rules = $this->rules();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), 'Silahkan isi form dengan benar', 422);
        } else {
            DB::beginTransaction();
            $donation = Donation::find($id);
            $donation->user_id = $request->input('user_id');
            $donation->campaign_id = $request->input('campaign_id');
            $donation->amount_donations = $request->input('amount_donations');
            $donation->hope = $request->input('hope');
            $donation->save();
            DB::commit();
            return $this->setResponse($donation, 'Donation updated successfully');
        }
    }

    public function delete($id)
    {
        $donation = Donation::findOrFail($id);

        if(!$donation){
            return $this->setResponse(null, 'Donation not found', 404);
        }
        else {
            $donation->delete();
            return $this->setResponse(null, 'Donation deleted successfully');
        }
    }

    public function list(Request $request)
    {
        $model = Donation::with(['user.photoProfile', 'campaign']);

        if($request->filled('token')){
            $token = PersonalAccessToken::findToken($request->input('token'));
            $user = $token->tokenable;
            $model->where('user_id', $user->id);
        }

        if($request->filled('campaign_id')){
            $model->where('campaign_id', $request->campaign_id);
        }

        if($request->filled('status')){
            $model->where('status', strtoupper($request->status));
        }

        return $this->setResponse($model->get(), null, 200);
    }
}
