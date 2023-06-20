<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\DistributionReport;
use App\Models\DistributionReportImage;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Http\Request;

class DistributionReportController extends Controller
{
    public function store(Request $request){

        $withdrawal = Withdrawal::where('id', $request->withdrawal_id)->first();
        $report = DistributionReport::where('withdrawal_id', $request->withdrawal_id)->where('status', 'approved');
        $campaign = Campaign::where('id', $request->campaign_id)->first();

        $user = auth()->user();
        if($user->id != $campaign->user_id){
            return $this->setResponse(null, 'Anda tidak memiliki akses', 403);
        }

        $rules = [
            'withdrawal_id' => 'required|exists:withdrawals,id',
            'title' => 'required|string',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first(), 422);
        }
        
        DB::beginTransaction();

        $report = new DistributionReport();
        $report->withdrawal_id = $request->withdrawal_id;
        $report->description = $request->description;
        $report->title = $request->title;
        $report->save();
        
        DB::commit();

        return $this->setResponse(null, 'Withdrawal created successfully');
    }

    public function upload(Request $request){

        $withdrawal = Withdrawal::where('id', $request->withdrawal_id)->first();
        $report = DistributionReport::where('withdrawal_id', $request->withdrawal_id)->where('status', 'approved');
        $campaign = Campaign::where('id', $request->campaign_id)->first();

        $user = auth()->user();
        if($user->id != $campaign->user_id){
            return $this->setResponse(null, 'Anda tidak memiliki akses', 403);
        }

        $rules = [
            'withdrawal_id' => 'required|exists:withdrawals,id',
            'title' => 'required|string',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first(), 422);
        }
        
        DB::beginTransaction();

        $report = new DistributionReport();
        $report->withdrawal_id = $request->withdrawal_id;
        $report->description = $request->description;
        $report->title = $request->title;
        $report->save();
        
        DB::commit();

        return $this->setResponse(null, 'Withdrawal created successfully');
    }
}
