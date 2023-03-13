<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CampaignCategory;
use App\Models\ZakatCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    protected function rules()
    {
        return [
            'type' => 'required|in:zakat,campaign,waqaf',
            'name' => 'required|string',
        ];
    }

    public function index(Request $request)
    {
        switch ($request->input('type')) {
            case 'zakat':
                $model = ZakatCategory::select(['id', 'name']);
                break;
            
            default:
                $model = CampaignCategory::select(['id', 'name']);
                break;
        };
        return DataTables::of($model)
            ->addColumn('action', function ($data) {
                return '
                    <span onclick="edit('. $data->id .')" class="edit-admin fas fa-pen text-warning mr-1" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Edit"></span>
                    <span onclick="destroy('. $data->id .')" class="fas fa-trash-alt text-danger" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Delete"></span>
                ';
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            return $this->setResponse(null, $validator->errors(), 422);
        }

        DB::beginTransaction();
        switch ($request->input('type')) {
            case 'zakat':
                $model = ZakatCategory::create(['name' => $request->input('name')]);
                break;
            
            default:
                $model = CampaignCategory::create(['name' => $request->input('name')]);
                break;
        };
        DB::commit();
        return $this->setResponse($model, 'Category created successfully');
    }

    public function show($id, Request $request)
    {
        switch ($request->input('type')) {
            case 'zakat':
                $model = ZakatCategory::find($id);
                break;
            
            default:
                $model = CampaignCategory::find($id);
                break;
        };

        if(!$model){
            return $this->setResponse(null, 'Category not found', 404);
        }

        return $this->setResponse($model, 'Category retrieved successfully');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            return $this->setResponse(null, $validator->errors(), 422);
        }
        
        DB::beginTransaction();
        switch ($request->input('type')) {
            case 'zakat':
                $model = ZakatCategory::find($id);
                break;
            
            default:
                $model = CampaignCategory::find($id);
                break;
        };
        if(!$model){
            return $this->setResponse(null, 'Category not found', 404);
        }
        $model->update(['name' => $request->input('name')]);
        DB::commit();
        return $this->setResponse($model, 'Category updated successfully');
    }

    public function delete($id, Request $request)
    {
        DB::beginTransaction();
        switch ($request->input('type')) {
            case 'zakat':
                $model = ZakatCategory::find($id);
                break;
            
            default:
                $model = CampaignCategory::find($id);
                break;
        };
        if(!$model){
            return $this->setResponse(null, 'Category not found', 404);
        }
        $model->delete();
        DB::commit();
        return $this->setResponse(null, 'Category deleted successfully');
    }
}
