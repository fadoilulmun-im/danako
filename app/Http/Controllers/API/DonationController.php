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
        return DataTables::of($donation)
            ->addColumn('action', function ($data) {
                return '
                    <span onclick="detail('. $data->id .')" class="fas fa-eye text-primary me-1" style="font-size: 1.2rem; cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"></span>
                    <span onclick="edit('. $data->id .')" class="edit-admin fas fa-pen text-warning me-1" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Edit"></span>
                    <span onclick="destroy('. $data->id .')" class="fas fa-trash-alt text-danger" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Delete"></span>
                ';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function rules()
    {
        return [
            'user_id' => 'required',
            'campaign_id' => 'required',
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
        $model = Donation::select(['campaigns.id as id', 'campaigns.title as title', 'campaigns.category_id', 'campaign_categories.name as category_name'])
            ->join('campaign_categories', 'campaign_categories.id', '=', 'campaigns.category_id');

        if($request->filled('category')){
            $model->where('category_id', $request->category);
        }

        if($request->filled('search')){
            $model->where(DB::raw('LOWER(title)'), 'like', '%' . strtolower($request->input('search')) . '%');
        }

        return $this->setResponse($model->get(), null, 200);
    }
}
