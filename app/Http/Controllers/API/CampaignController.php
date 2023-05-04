<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CampaignDocument;
use Carbon\Carbon;
use App\Models\CampaignDocument;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Sanctum\PersonalAccessToken;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Str;

class CampaignController extends Controller
{
    protected function rules()
    {
        return [
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
            'target_amount' => 'required|numeric',
            'image' => 'image',
            'receiver' => 'required|string',
            'purpose' => 'required|string',
            'address_receiver' => 'required|string',
            'detail_usage_of_funds' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'documents' => 'nullable|array',
            'documents.*' => 'required|file|mimes:pdf,jpeg,png,jpg',
        ];
    }

    protected function rules()
    {
        return [
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
            'target_amount' => 'required|numeric',
            'image' => 'image',
            'receiver' => 'required|string',
            'purpose' => 'required|string',
            'address_receiver' => 'required|string',
            'detail_usage_of_funds' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'documents' => 'nullable|array',
            'documents.*' => 'required|file|mimes:pdf,jpeg,png,jpg',
        ];
    }

    public function index(Request $request)
    {
        $campaign = Campaign::with(['user', 'category']);

        if ($request->filled('verif')) {
            $campaign->where('verification_status', $request->get('verif'));
        }
        if ($request->filled('status')) {
            $campaign->where('activity', $request->get('status'));
        }
        return DataTables::of($campaign)
            ->addColumn('action', function ($data) {
                return '
                    <span onclick="detail('. $data->id .')" class="fas fa-eye text-primary me-1" style="font-size: 1.2rem; cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"></span>
                ';
                // <span onclick="edit('. $data->id .')" class="edit-admin fas fa-pen text-warning me-1" style="font-size: 1.2rem; cursor: pointer" title="Edit"></span>
                // <span onclick="destroy('. $data->id .')" class="fas fa-trash-alt text-danger" style="font-size: 1.2rem; cursor: pointer" title="Delete"></span>
            })
            ->editColumn('img_path', function ($data) {
                if(File::exists(public_path('uploads'. $data->img_path))){
                    $path = 'uploads'. $data->img_path;
                }else{
                    $path = 'assets/images/image-solid.svg';
                }
                return '<img src="'. asset($path) .'" alt="logo" style="width: 100px; height: 100px">';
            })
            ->editColumn('img_path', function ($data) {
                if(File::exists(public_path('uploads'. $data->img_path))){
                    $path = 'uploads'. $data->img_path;
                }else{
                    $path = 'assets/images/image-solid.svg';
                }
                return '<img src="'. asset($path) .'" alt="logo" style="width: 100px; height: 100px">';
            })
            ->editColumn('verification_status', function ($data) {
                if($data->verification_status){
                    switch ($data->verification_status) {
                        case 'processing':
                            $return  = '<span class="badge p-1 bg-warning">Processing</span>';
                            break;

                        case 'rejected':
                            $return  = '<span class="badge p-1 bg-danger">Rejected</span>';
                            break;

                        case 'verified':
                            $return  = '<span class="badge p-1 bg-success">Verified</span>';
                            break;
                        
                        default:
                            $return = '<span class="badge p-1 bg-secondary">Unverified</span>';
                            break;
                    }
                    return $return;
                }else{
                    return '<span class="badge p-1 bg-secondary">Unverified</span>';
                }
            })
            ->editColumn('category_id', function ($data)  {
                return $data->category->name;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'img_path', 'verification_status', 'activity'])
            ->make(true);
    }
}
