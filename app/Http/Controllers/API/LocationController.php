<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function listProvince(Request $request){
        $model = Province::select(['id', 'name']);

        if($request->filled('search')){
            $model->where(DB::raw('LOWER(name)'), 'like', '%' . strtolower($request->input('search')) . '%');
        }

        $model = $model->orderby('name', 'asc');

        if($request->filled('limit')){
            $model = $model->limit($request->input('limit'));
        }

        return $this->setResponse($model->get());
    }
    
    public function listRegency(Request $request){
        $model = Regency::select(['id', 'name']);

        if($request->filled('search')){
            $model->where(DB::raw('LOWER(name)'), 'like', '%' . strtolower($request->input('search')) . '%');
        }

        if($request->filled('province_id')){
            $model->where('province_id', $request->input('province_id'));
        }

        $model = $model->orderby('name', 'asc');

        if($request->filled('limit')){
            $model = $model->limit($request->input('limit'));
        }

        return $this->setResponse($model->get());
    }
    
    public function listSubDistrict(Request $request){
        $model = District::select(['id', 'name']);

        if($request->filled('search')){
            $model->where(DB::raw('LOWER(name)'), 'like', '%' . strtolower($request->input('search')) . '%');
        }

        if($request->filled('regency_id')){
            $model->where('regency_id', $request->input('regency_id'));
        }

        // tambahkan kondisi where untuk memfilter SubDistrict sesuai dengan Regency
        if($request->filled('province_id')){
            $model->whereHas('regency', function ($query) use ($request) {
                $query->where('province_id', $request->input('province_id'));
            });
        }

        $model = $model->orderby('name', 'asc');

        if($request->filled('limit')){
            $model = $model->limit($request->input('limit'));
        }

        return $this->setResponse($model->get());
    }

    
    public function listVillage(Request $request){
        $model = Village::select(['id', 'name']);

        if($request->filled('search')){
            $model->where(DB::raw('LOWER(name)'), 'like', '%' . strtolower($request->input('search')) . '%');
        }

        if($request->filled('subdistrict_id')){
            $model->where('district_id', $request->input('subdistrict_id'));
        }

        $model = $model->orderby('name', 'asc');

        if($request->filled('limit')){
            $model = $model->limit($request->input('limit'));
        }

        return $this->setResponse($model->get());
    }
}
