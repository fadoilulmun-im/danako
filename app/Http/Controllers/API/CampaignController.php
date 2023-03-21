<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CategoryCampaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CampaignController extends Controller
{
    public function index(Request $request)
    {
        return DataTables::of(Campaign::select(['id', 'user_id', 'category_id', 'name', 'description', 'img_path', 'amount', 'start_date', 'end_date', 'receiver', 
        'purpose', 'address_receiver', 'real_time_amount', 'verification_status', 'activity'])->with(['user', 'category']))
            ->addColumn('action', function ($data) {
                return '
                    <span onclick="edit('. $data->id .')" class="edit-admin fas fa-pen text-warning mr-1" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Edit"></span>
                    <span onclick="destroy('. $data->id .')" class="fas fa-trash-alt text-danger" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Delete"></span>
                ';
            })
            ->editColumn('user_id', function ($data)  {
                return $data->user->username;
            })
            ->editColumn('category_id', function ($data)  {
                return $data->category->name;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
