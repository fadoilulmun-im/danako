<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Withdrawal;
use App\Models\WithdrawalCalculation;
use App\Models\WithdrawalDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class WithdrawalController extends Controller
{
    public function index(Request $request)
    {
        $model = Withdrawal::with(['campaign.user.detail']);

        $startDate = $request->get('from');
        $endDate = $request->get('to');

        if ($request->filled('status')) {
            $model->where('status', $request->get('status'));
        }
        if($startDate && $endDate) {
            $model->whereDate('withdrawals.created_at', '>=', $startDate);
            $model->whereDate('withdrawals.created_at', '<=', $endDate);
        }

        return DataTables::of($model)
            ->addColumn('action', function ($data) {
                $html = '';
                $html .= '
                    <span onclick="detail('. $data->id .')" class="fas fa-eye text-primary me-1" style="font-size: 1.2rem; cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Show"></span>
                ';
                // if(!$data->distributionReport){
                //     $html .= '
                //         <span onclick="report('. $data->id .')" class="fas fa-info-circle text-secondary me-1" style="font-size: 1.2rem"></span>
                //     ';
                // }else{
                //     $html .= '
                //         <a href="'. route('admin.user.detail', $data->id) .'" onclick="loading()" class="fas fa-info-circle text-primary me-1" style="font-size: 1.2rem" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"></a>
                //     ';
                // }
                return $html;
            })
            ->editColumn('status', function ($data) {
                if($data->status){
                    switch ($data->status) {
                        case 'processing':
                            $return  = '<span class="badge p-1 bg-warning">Processing</span>';
                            break;

                        case 'rejected':
                            $return  = '<span class="badge p-1 bg-danger">Rejected</span>';
                            break;

                        case 'approved':
                            $return  = '<span class="badge p-1 bg-success">Approved</span>';
                            break;
                        
                        default:
                            $return = '<span class="badge p-1 bg-warning">Processing</span>';
                            break;
                    }
                    return $return;
                }else{
                    return '<span class="badge p-1 bg-warning">Processing</span>';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'status'])
            ->make(true);
    }

    public function store(Request $request){

        // $withdraw = Withdrawal::where('campaign_id', $request->campaign_id)->exists();
        // if (!$withdraw) {
        //     $maxWithdraw = Campaign::select('real_time_amount')->where('id', $request->campaign_id);
        // } else {
        //     $maxWithdraw = Withdrawal::select('remaining_amount')->where('campaign_id', $request->campaign_id)->sum('remaining_amount');
        // }

        $rules = [
            'campaign_id' => 'required|exists:campaigns,id',
            'description' => 'required',
            'amount' => 'required|numeric',
            // 'amount' => 'required|numeric|min:100000|max:'.$maxWithdraw,
            'documents' => 'nullable|array',
            'documents.*' => 'required|file|mimes:jpeg,png,jpg',
            'bank_name' => 'nullable|string',
            'rek_name' => 'nullable|string',
            'rek_number' => 'nullable|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first(), 422);
        }
        
        DB::beginTransaction();

        $withdrawal = new Withdrawal();
        $withdrawal->description = $request->description;
        $withdrawal->amount = $request->amount;
        $withdrawal->campaign_id = $request->campaign_id;
        $withdrawal->bank_name = $request->bank_name;
        $withdrawal->rek_name = $request->rek_name;
        $withdrawal->rek_number = $request->rek_number;
        $withdrawal->status = 'processing';
        $withdrawal->save();

        foreach(($request->documents ?? []) as $doc){
            $withdrawalDocument = new WithdrawalDocument();
            $withdrawalDocument->withdrawal_id = $withdrawal->id;
            $withdrawalDocument->type = "dokumen pendukung";
            $path = '/withdrawal/dokumen-pendukung';
            if (!File::exists(public_path('uploads' . $path))) {
                File::makeDirectory(public_path('uploads' . $path), 0777, true, true);
            }
            $fileName = time() . rand(1, 99) . '.' . $doc->extension();
            $doc->move(public_path('uploads' . $path), $fileName);

            $withdrawalDocument->path = $path . '/' . $fileName;
            $withdrawalDocument->save();
        }
        
        DB::commit();

        return $this->setResponse(null, 'Withdrawal created successfully');
    }

    // public function storeCoba(Request $request){
    //     $rules = [
    //         'title' => 'required|string',
    //         'campaign_id' => 'required|exists:campaigns,id',
    //         'description' => 'required',
    //         'amount' => 'required|numeric',
    //         'documents' => 'nullable',
    //     ];

    //     $validator = Validator::make($request->all(), $rules);
    //     if ($validator->fails()) {
    //         return $this->setResponse($validator->errors(), $validator->errors()->first(), 422);
    //     }
        
    //     DB::beginTransaction();

    //     $withdrawal = new Withdrawal();
    //     $withdrawal->campaign_id = $request->campaign_id;
    //     $withdrawal->title = $request->title;
    //     $withdrawal->description = $request->description;
    //     $withdrawal->amount = $request->amount;
    //     $withdrawal->status = 'processing';
    //     $withdrawal->save();

    //     foreach(($request->documents ?? []) as $document){
    //         $withdrawalDocument = new WithdrawalImage();
    //         $withdrawalDocument->withdrawal_id = $withdrawal->id;
    //         $withdrawalDocument->type = "Dokumen pendukung";
    //         $path = '/withdrawal/dokumen-pendukung';
    //         if (!File::exists(public_path('uploads' . $path))) {
    //             File::makeDirectory(public_path('uploads' . $path), 0777, true, true);
    //         }
    //         $fileName = time() . rand(1, 99) . '.' . $document->extension();
    //         $document->move(public_path('uploads' . $path), $fileName);

    //         $withdrawalDocument->path = $path . '/' . $fileName;
    //         $withdrawalDocument->save();
    //     }
        
    //     DB::commit();

    //     return $this->setResponse(null, 'Withdrawal created successfully');
    // }

    public function show($id)
    {
        $model = Withdrawal::where('id', $id)->with(['document', 'campaign.user.detail'])->first();

        if(!$model){
            return $this->setResponse(null, 'Withdrawal not found', 404);
        }

        return $this->setResponse($model, 'Withdrawal retrieved successfully');
    }

    public function list($id, Request $request)
    {
        $model = Withdrawal::where('campaign_id', $id)->with(['document', 'campaign.user.detail'])->get();

        if ($request->filled('status')) {
            $model->where('status', $request->status)->get();
        }

        if(!$model){
            return $this->setResponse(null, 'Withdrawal not found', 404);
        }

        return $this->setResponse($model, 'Withdrawal retrieved successfully');
    }

    public function updateVerifiying($id, Request $request){
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:0,1',
            'invoice' => 'nullable|required_if:status,1|image|mimes:png,jpg,jpeg',
            'reject_note' => 'nullable|required_if:status,0|string',
        ]);

        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first(), 422);
        }

        $withdrawal = Withdrawal::where('id', $id)->first();
        $campaignId = $withdrawal->campaign_id;
        $campaign = Campaign::find($campaignId);
        $realtime_amount = $campaign->real_time_amount;
        $target_amount = $campaign->target_amount;

        if (!$withdrawal) {
            return $this->setResponse(null, 'Data not found', 404);
        }

        DB::beginTransaction();
        $withdrawal->status = $request->status ? 'approved' : 'rejected';
        $withdrawal->reject_note = $request->reject_note;
        $withdrawal->save();

        if($request->hasFile('invoice')) {
            $invoice = new WithdrawalDocument();
            $invoice->type = 'bukti transfer admin';
            $invoice->withdrawal_id = $withdrawal->id;
            $path = '/withdrawal/invoice';
            if(!File::exists(public_path('uploads'. $path))){
                File::makeDirectory(public_path('uploads'. $path), 0777, true, true);
            }
            $fileName = time().'.'.$request->file('invoice')->extension();
            $request->file('invoice')->move(public_path('uploads'. $path), $fileName);

            $invoice->path = $fileName;
            $invoice->save();
        }

        // if ($withdrawal->status == 'approved'){
        //     $ada = Withdrawal::whereHas('');
        //     // bingunggg;
        //     if('kalo ga pernah narik dan ga kecatet ditabel calculate withdrawal'){
        //         'remaining_withdrawal = target amount - amount withdrawal ini';
        //     } else {
        //         'remaining_withdrawal = remaining withdrawal->paling terakhir - amount withdrawal ini';
        //     }
        //     $totalWithdrawal = Withdrawal::where('campaign_id', $campaignId)->where('status', 'approved')->sum('amount');

        //     $calculate = new WithdrawalCalculation();
        //     $calculate->withdrawal_id = $withdrawal->id;
        //     $calculate->remaining_withdrawal = $target_amount - $totalWithdrawal;
        // }

        DB::commit();

        return $this->setResponse($withdrawal, 'Withdrawal updated', 200);
    }

    public function bankList($id)
    {
        $bank = withdrawal::where('id', $id)->with(['campaign.user.detail'])->first();

        if (!$bank) {
            return $this->setResponse(null, 'Campaign not found', 404);
        }

        return $this->setResponse($bank, 'Campaign retrieved successfully');
    }
}
