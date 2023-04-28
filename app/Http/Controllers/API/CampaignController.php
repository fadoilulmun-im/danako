<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CampaignDocument;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Laravel\Sanctum\PersonalAccessToken;
use Yajra\DataTables\DataTables;
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
        ];
    }

    public function index(Request $request)
    {
        $campaign = Campaign::with(['user', 'category']);
        return DataTables::of($campaign)
            ->addColumn('action', function ($data) {
                return '
                    <span onclick="detail('. $data->id .')" class="fas fa-eye text-primary me-1" style="font-size: 1.2rem; cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"></span>
                    <span onclick="edit('. $data->id .')" class="edit-admin fas fa-pen text-warning me-1" style="font-size: 1.2rem; cursor: pointer" title="Edit"></span>
                    <span onclick="destroy('. $data->id .')" class="fas fa-trash-alt text-danger" style="font-size: 1.2rem; cursor: pointer" title="Delete"></span>
                ';
            })
            ->editColumn('img_path', function ($data) {
                if(File::exists(public_path('uploads'. $data->img_path))){
                    $path = 'uploads'. $data->img_path;
                }else{
                    $path = 'assets/images/image-solid.svg';
                }
                return '<img src="'. asset($path) .'" alt="logo" style="width: 100px; height: 100px">';
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'img_path'])
            ->make(true);


    }

    public function store(Request $request)
    {
        $rules = $this->rules();
        $rules['image'] .= '|required';
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), 'Silahkan isi form dengan benar', 422);
        } else {
            DB::beginTransaction();
            $campaign = new Campaign;
            $campaign->user_id = $request->input('user_id');
            $campaign->category_id = $request->input('category_id');
            $campaign->title = $request->input('title');
            $campaign->description = $request->input('description');
            $campaign->target_amount = $request->input('target_amount');
            $campaign->receiver = $request->input('receiver');
            $campaign->purpose = $request->input('purpose');
            $campaign->address_receiver = $request->input('address_receiver');
            $campaign->detail_usage_of_funds = $request->input('detail_usage_of_funds');
            $campaign->start_date = $request->input('start_date');
            $campaign->end_date = $request->input('end_date');

            $path = '/campaign';
            if(!File::exists(public_path('uploads'. $path))){
                File::makeDirectory(public_path('uploads'. $path), 0777, true, true);
            }
            $fileName = time().'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('uploads'. $path), $fileName);

            $campaign->img_path = $path . '/' . $fileName;
            $campaign->save();

            DB::commit();
            return $this->setResponse($campaign, 'Campaign created successfully');
        }
    }

    public function show($id)
    {
        $campaign = Campaign::with(['user.photoProfile', 'category'])->find($id);

        if(!$campaign){
            return $this->setResponse(null, 'Campaign not found', 404);
        }

        return $this->setResponse($campaign, 'Campaign retrieved successfully');
    }

    public function update(Request $request, $id)
    {
        $rules = $this->rules();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), null, 422);
        } else {
            $campaign = Campaign::find($id);
            $campaign->user_id = $request->input('user_id');
            $campaign->category_id = $request->input('category_id');
            $campaign->title = $request->input('title');
            $campaign->description = $request->input('description');
            $campaign->target_amount = $request->input('target_amount');
            $campaign->receiver = $request->input('receiver');
            $campaign->purpose = $request->input('purpose');
            $campaign->address_receiver = $request->input('address_receiver');
            $campaign->detail_usage_of_funds = $request->input('detail_usage_of_funds');
            $campaign->start_date = $request->input('start_date');
            $campaign->end_date = $request->input('end_date');

            if($request->hasFile('image')){
                $campaign->deleteImageFile();
                $path = '/campaign';
                
                if(!File::exists(public_path('uploads'. $path))){
                    File::makeDirectory(public_path('uploads'. $path), 0777, true, true);
                }
        
                $fileName = time().'.'.$request->file('image')->extension();
                $request->file('image')->move(public_path('uploads'. $path), $fileName);
                $campaign->img_path = $path . '/' . $fileName;
            }

            $campaign->save();
            DB::commit();
            return $this->setResponse($campaign, 'Campaign updated successfully');
        }
    }

    public function delete($id)
    {
        $campaign = Campaign::findOrFail($id);

        if(!$campaign){
            return $this->setResponse(null, 'Campaign not found', 404);
        }
        else {
            $campaign->delete();
            return $this->setResponse(null, 'Campaign deleted successfully');
        }
    }

    public function list(Request $request)
    {
        $model = Campaign::select(['campaigns.id as id', 'campaigns.title as title', 'campaigns.category_id', 'campaign_categories.name as category_name'])
            ->join('campaign_categories', 'campaign_categories.id', '=', 'campaigns.category_id');

        if($request->filled('category')){
            $model->where('category_id', $request->category);
        }

        if($request->filled('search')){
            $model->where(DB::raw('LOWER(title)'), 'like', '%' . strtolower($request->input('search')) . '%');
        }

        if ($request->has('q')) {
            $search = $request->q;
            $model->orderby('title', 'asc')
                ->where('title', 'LIKE', "%$search%")
                ->get();
        } else {
            $model->orderby('title', 'asc')->limit(10)->get();
        }

        return $this->setResponse($model->get(), null, 200);
    }

    public function pagination(Request $request)
    {
        $model = Campaign::query();

        if($request->filled('search')){
            $model->where(DB::raw('LOWER(title)'), 'like', '%' . strtolower($request->input('search')) . '%');
        }

        if($request->filled('category_id')){
            $model->where('category_id', $request->category_id);
        }

        if($request->input('token')){
            $token = PersonalAccessToken::findToken($request->input('token'));
            $user = $token->tokenable;
            $model->where('user_id', $user->id);
        }

        $model->orderby($request->input('order', 'title'), $request->input('sort', 'asc'));

        return $this->setResponse($model->paginate($request->input('per_page', 10)), null, 200);
    }

    public function storeUser(Request $request)
    {
        $rules = [
            'category_id' => 'required|numeric|exists:campaign_categories,id',
            'title' => 'required|string',
            'slug' => 'required|string|unique:campaigns,slug|alpha_dash',
            'img' => 'required|image|mimes:jpeg,png,jpg',
            'description' => 'required|string',
            'target_amount' => 'required|numeric',
            'receiver' => 'required|string',
            'purpose' => 'required|string',
            'address_receiver' => 'required|string',
            'detail_usage_of_funds' => 'required|string',
            'range_date' => 'required|string',
            'documents' => 'nullable|array',
            'documents.*' => 'required|file|mimes:pdf,jpeg,png,jpg',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), $validator->errors()->first() , 422);
        }

        DB::beginTransaction();

        $campaign = new Campaign();
        $campaign->user_id = Auth::id();
        $campaign->category_id = $request->input('category_id');
        $campaign->title = $request->input('title');
        $campaign->slug = $request->input('slug', Str::slug($request->input('title')));

        $path = '/campaign';
        if(!File::exists(public_path('uploads'. $path))){
            File::makeDirectory(public_path('uploads'. $path), 0777, true, true);
        }
        $fileName = time().'.'.$request->file('img')->extension();
        $request->file('img')->move(public_path('uploads'. $path), $fileName);

        $campaign->img_path = $path . '/' . $fileName;

        $campaign->description = $request->input('description');
        $campaign->target_amount = $request->input('target_amount');
        $campaign->receiver = $request->input('receiver');
        $campaign->purpose = $request->input('purpose');
        $campaign->address_receiver = $request->input('address_receiver');
        $campaign->detail_usage_of_funds = $request->input('detail_usage_of_funds');
        $range_date = explode(' to ', $request->input('range_date'));
        $campaign->start_date = Carbon::parse($range_date[0])->format('Y-m-d');
        $campaign->end_date = Carbon::parse($range_date[1])->format('Y-m-d');
        $campaign->verification_status = 'processing';
        $campaign->save();

        foreach(($request->documents ?? []) as $document){
            $campaignDocument = new CampaignDocument();
            $campaignDocument->campaign_id = $campaign->id;

            $path = '/campaign-document';
            if(!File::exists(public_path('uploads'. $path))){
                File::makeDirectory(public_path('uploads'. $path), 0777, true, true);
            }
            $fileName = time().'.'.$document->extension();
            $document->move(public_path('uploads'. $path), $fileName);

            $campaignDocument->path = $path . '/' . $fileName;
            $campaignDocument->save();
        }

        DB::commit();
        return $this->setResponse(null, 'Campaign created successfully');
    }
}
