<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\DistributionReports;
use App\Models\DistributionReportImage;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class DistributionReportController extends Controller
{
    public function index(Request $request)
    {
        $model = DistributionReports::select('distribution_reports.id','distribution_reports.withdrawal_id', 'distribution_reports.title', 
        'distribution_reports.description', 'distribution_reports.created_at', 'campaigns.title as campaign_title')
        ->join('withdrawals', 'withdrawals.id', '=', 'distribution_reports.withdrawal_id')
        ->join('campaigns', 'withdrawals.campaign_id', '=', 'campaigns.id');

        $startDate = $request->get('from');
        $endDate = $request->get('to');

        if($startDate && $endDate) {
            $model->whereDate('distribution_report.created_at', '>=', $startDate);
            $model->WhereDate('distribution_report.created_at', '<=', $endDate);
        }

        return DataTables::of($model)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request){

        $withdrawal = Withdrawal::where('id', $request->withdrawal_id)->first();
        $report = DistributionReports::where('withdrawal_id', $request->withdrawal_id)->where('status', 'approved');
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

        $report = new DistributionReports();
        $report->withdrawal_id = $request->withdrawal_id;
        $report->description = $request->description;
        $report->title = $request->title;
        $report->save();
        
        DB::commit();

        return $this->setResponse(null, 'Report created successfully');
    }

    public function upload(Request $request){

        foreach(($request->upload ?? []) as $doc){
            $path = '/kabar-terbaru';
            if (!File::exists(public_path('uploads' . $path))) {
                File::makeDirectory(public_path('uploads' . $path), 0777, true, true);
            }
            $fileName = time() . rand(1, 99) . '.' . $doc->extension();
            $doc->move(public_path('uploads' . $path), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = $path . '/' . $fileName;
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
