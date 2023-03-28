<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DonationController extends Controller
{
    public function index(Request $request)
    {
        return DataTables::of(Donation::select(['id', 'user_id', 'campaign_id', 'amount_donations', 'hope']))
            ->addColumn('action', function ($data) {
                return '
                    <span onclick="edit('. $data->id .')" class="edit-admin fas fa-pen text-warning mr-1" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Edit"></span>
                    <span onclick="destroy('. $data->id .')" class="fas fa-trash-alt text-danger" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Delete"></span>
                ';
            })
            ->editColumn('user_id', function ($data)  {
                return $data->user->username;
            })
            ->editColumn('campaign_id', function ($data)  {
                return $data->campaign->title;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        
    }
}
