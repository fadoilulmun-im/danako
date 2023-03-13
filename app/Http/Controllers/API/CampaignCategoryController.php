<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CampaignCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignCategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = CampaignCategory::query();
        if($request->filled('search')){
            $data->where(DB::raw('LOWER(name)'), 'LIKE', '%'.strtolower($request->input('search')).'%');
        }

        return $data->orderBy($request->input('order', 'id'), $request->input('dir', 'DESC'))->paginate($request->input('limit') ?? CampaignCategory::count());
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            CampaignCategory::create(['name' => $request->input('name')]);
        });
        return $this->setResponse(null, 'Campaign Category created successfully');
    }

    public function update(Request $request, $id)
    {
        $data = CampaignCategory::findOrFail($id);
        DB::transaction(function () use ($request, $data) {
            $data->update(['name' => $request->input('name')]);
        });
        return $this->setResponse($data, 'Campaign Category updated successfully');
    }
}
?>