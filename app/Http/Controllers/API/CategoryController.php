<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CampaignCategory;
use App\Models\ZakatCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;
class CategoryController extends Controller
{
    protected function rules()
    {
        return [
            'type' => 'required|in:zakat,campaign,waqaf',
            'name' => 'required|string',
            'logo' => 'nullable|image',
        ];
    }

    public function index(Request $request)
    {
        switch ($request->input('type')) {
            case 'zakat':
                $model = ZakatCategory::select(['id', 'name', 'logo_path']);
                break;
            
            default:
                $model = CampaignCategory::select(['id', 'name', 'logo_path']);
                break;
        };
        return DataTables::of($model)
            ->editColumn('logo_path', function ($data) {
                return '<img src="'. asset('uploads'. $data->logo_path) .'" alt="logo" style="width: 100px; height: 100px">';
            })
            ->addColumn('action', function ($data) {
                return '
                    <span onclick="edit('. $data->id .')" class="edit-admin fas fa-pen text-warning mr-1" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Edit"></span>
                    <span onclick="destroy('. $data->id .')" class="fas fa-trash-alt text-danger" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Delete"></span>
                ';
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'logo_path'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $rules = $this->rules();
        $rules['logo'] .= '|required';
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), null, 422);
        }

        DB::beginTransaction();
        switch ($request->input('type')) {
            case 'zakat':
                $model = new ZakatCategory;
                break;
            
            default:
                $model = new CampaignCategory;
                break;
        };

        $model->name = $request->input('name');

        $fileName = time().'.'.$request->file('logo')->extension();
        $path = '/category';
        $file = $request->file('logo');

        $canvas = Image::canvas(300, 300, '#ffffff');
        $img = Image::make($file->getRealPath());
        $height = $img->height();
        $width = $img->width();
        $img->resize($width > $height ? 300 : null, $height >= $width ? 300 : null, function ($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $canvas->insert($img, 'center');
        $canvas->save(public_path('uploads') . $path . '/' . $fileName);

        $model->logo_path = $path . '/' . $fileName;

        $model->save();

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
            return $this->setResponse($validator->errors(), null, 422);
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

        $model->name = $request->input('name');
        if($request->hasFile('logo')){
            $model->deleteLogoFile();

            $fileName = time().'.'.$request->file('logo')->extension();
            $path = '/category';
            $file = $request->file('logo');
    
            $canvas = Image::canvas(300, 300, '#ffffff');
            $img = Image::make($file->getRealPath());
            $height = $img->height();
            $width = $img->width();
            $img->resize($width > $height ? 300 : null, $height >= $width ? 300 : null, function ($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $canvas->insert($img, 'center');
            $canvas->save(public_path('uploads') . $path . '/' . $fileName);
            $model->logo_path = $path . '/' . $fileName;
        }

        $model->save();
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

    public function list(Request $request)
    {
        switch ($request->input('type')) {
            case 'zakat':
                $model = ZakatCategory::select(['id', 'name', 'logo_path AS logo_link']);
                break;
            
            default:
                $model = CampaignCategory::select(['id', 'name', 'logo_path AS logo_link']);
                break;
        };

        if($request->filled('search')){
            $model->where(DB::raw('LOWER(name)'), 'like', '%' . strtolower($request->input('search')) . '%');
        }

        if($request->input('limit')){
            $model->limit($request->input('limit'));
        }

        return $this->setResponse($model->get(), 'Category list retrieved successfully');
    }
}
