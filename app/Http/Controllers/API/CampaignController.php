<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CampaignCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

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
                    <span onclick="edit('. $data->id .')" class="edit-admin fas fa-pen text-warning mr-1" style="font-size: 1.2rem; cursor: pointer" title="Edit"></span>
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

    public function userList(Request $request)
    {
        $user = [];
        if ($request->has('q')) {
            $search = $request->q;
            $user = User::orderby('username', 'asc')
                ->select("id", "username")
                ->where('username', 'LIKE', "%$search%")
                ->get();
        } else {
            $user = User::orderby('username', 'asc')->select("id", "username")->limit(10)->get();
        }
        return $this->setResponse($user);
    }

    public function categoryList(Request $request)
    {
        $category = [];
        if ($request->has('q')) {
            $search = $request->q;
            $category = CampaignCategory::orderby('name', 'asc')
                ->select("id", "name")
                ->where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $category = CampaignCategory::orderby('name', 'asc')->select("id", "name")->limit(10)->get();
        }
        return $this->setResponse($category);
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
        $campaign = Campaign::with(['user', 'category'])->find($id);

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

    public function pagination(Request $request)
    {
        $campaign = Campaign::paginate($request->input('limit', 2));
        return $this->setResponse($campaign);
    }
}
