<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CampaignCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class CampaignCategoryController extends Controller
{
    public function index(Request $request)
    {
        return DataTables::of(CampaignCategory::select(['id', 'name']))
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