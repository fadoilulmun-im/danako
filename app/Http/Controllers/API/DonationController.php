<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        $donation = Donation::with(['user', 'campaign']);

        $startDate = $request->get('from');
        $endDate = $request->get('to');

        if($startDate && $endDate) {
            $donation->whereDate('donations.created_at', '>=', $startDate)->whereDate('donations.created_at', '<=', $endDate);
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
            ->addIndexColumn()
            ->rawColumns(['action', 'payment_link', 'status'])
            ->make(true);
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'campaign_id' => 'required|exists:campaigns,id',
            'amount_donations' => 'required|numeric',
            'hope' => 'nullable|string',
        ];
    }

    public function store(Request $request)
    {
        $rules = $this->rules();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), 'Silahkan isi form dengan benar', 422);
        } else {
            DB::beginTransaction();
            $donation = new Donation;
            $donation->user_id = $request->input('user_id');
            $donation->campaign_id = $request->input('campaign_id');
            $donation->amount_donations = $request->input('amount_donations');
            $donation->hope = $request->input('hope');
            $donation->save();
            DB::commit();
            return $this->setResponse($donation, 'Donation created successfully');
        }
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
        $model = Donation::with(['user.photoProfile']);

        if($request->filled('campaign_id')){
            $model->where('campaign_id', $request->campaign_id);
        }

        if($request->filled('status')){
            $model->where('status', strtoupper($request->status));
        }

        return $this->setResponse($model->get(), null, 200);
    }
}
