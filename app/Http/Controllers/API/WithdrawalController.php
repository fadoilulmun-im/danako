<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class WithdrawalController extends Controller
{
    public function index(Request $request)
    {
        $model = Withdrawal::select(['campaign_id', 'title', 'description', 'amount', 'status']);

        return DataTables::of($model)
            // ->addColumn('action', function ($data) {
            //     return '
            //         <span onclick="detail('. $data->id .')" class="fas fa-eye text-primary me-1" style="font-size: 1.2rem; cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"></span>
            //     ';
            // })
            ->editColumn('status', function ($data) {
                if($data->status){
                    switch ($data->status) {
                        case 'processing':
                            $return  = '<span class="badge p-1 bg-warning">Processing</span>';
                            break;

                        case 'rejected':
                            $return  = '<span class="badge p-1 bg-danger">Rejected</span>';
                            break;

                        case 'done':
                            $return  = '<span class="badge p-1 bg-success">Done</span>';
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
            ->rawColumns(['status'])
            ->make(true);
    }

    public function store(Request $request){
        $rules = [
            'campaign_id' => 'required|exists:campaigns,id',
            'title' => 'required|string',
            'description' => 'required',
            'amount' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first(), 422);
        }
        
        DB::beginTransaction();

        $withdrawal = new Withdrawal();
        $withdrawal->title = $request->title;
        $withdrawal->description = $request->description;
        $withdrawal->amount = $request->amount;
        $withdrawal->campaign_id = $request->campaign_id;
        $withdrawal->status = 'processing';
        $withdrawal->save();

        DB::commit();

        return $this->setResponse(null, 'Withdrawal created successfully');
    }
}
