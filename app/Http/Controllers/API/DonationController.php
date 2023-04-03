<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            // ->editColumn('user_id', function ($data)  {
            //     return $data->user->username;
            // })
            // ->editColumn('campaign_id', function ($data)  {
            //     return $data->campaign->title;
            // })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function rules()
    {
        return [
            'user_id' => 'required',
            'campaign_id' => 'required',
            'amount_donations' => 'required||numeric',
            'hope' => 'nullable|string',
        ];
    }

    public function campaignList(Request $request)
    {
        $campaign = [];
        if ($request->has('q')) {
            $search = $request->q;
            $campaign = Campaign::orderby('title', 'asc')
                ->select("id", "title")
                ->where('title', 'LIKE', "%$search%")
                ->get();
        } else {
            $campaign = Campaign::orderby('title', 'asc')->select("id", "title")->limit(10)->get();
        }
        return $this->setResponse($campaign);
    }

    public function store(Request $request)
    {
        $rules = $this->rules();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), null, 422);
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
            return $this->setResponse($validator->errors(), null, 422);
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
}
