<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request){
        $model = User::select(['users.id', 'users.name', 'username', 'email', 'is_active', 'roles.name as role_name', 'referral_code'])
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->leftJoin('user_details', 'user_details.user_id', '=', 'users.id')
            ;
        if($request->filled('type')){
            $model->where('roles.name', strtolower($request->type));
        }else{
            $model->where('roles.name', 'user');
        }
        if ($request->get('status') == '0' || $request->get('status') == '1') {
            $model->where('is_active', $request->get('status'));
        }
        if ($request->filled('verif')) {
            if($request->verif == 'unverified'){
                $model->where(function($q) use($request){
                    $q->whereHas('detail', function($q) use($request) {
                        $q->where('status', $request->verif);
                    })->orWhereDoesntHave('detail');
                });
            } else {
                $model->where('user_details.status', $request->get('verif'));
            }
        }

        return DataTables::of($model)
            ->addColumn('status', function ($data) {
                $checked = $data->is_active ? 'checked' : '';
                return '
                <div class="text-center w-100">
                    <div class="form-check form-switch justify-content-center" >
                        <input role="button" onchange="changeStatus(this,' . $data->id . ')" class="form-check-input" type="checkbox" '. $checked . ' data-bs-toggle="tooltip" data-bs-placement="top" title="Change Status"/>
                    </div>
                </div>';
            })
            ->addColumn('action', function ($data) {
                $html = '';
                if(!$data->detail){
                    $html .= '
                        <span onclick="detail('. $data->id .')" class="fas fa-info-circle text-secondary me-1" style="font-size: 1.2rem"></span>
                    ';
                }else{
                    $html .= '
                        <a href="'. route('admin.user.detail', $data->id) .'" onclick="loading()" class="fas fa-info-circle text-primary me-1" style="font-size: 1.2rem" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"></a>
                    ';
                }
                $html .= '
                    <span onclick="resetPassword('. $data->id .')" class="fas fa-redo-alt text-danger" style="font-size: 1.2rem; cursor: pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password"></span>
                ';
                return $html;
            })
            ->addColumn('verification', function ($data) {
                if($data->detail){
                    $detail = $data->detail;
                    switch ($detail->status) {
                        case 'processing':
                            $return  = '<span class="badge p-1 bg-warning">Processing</span>';
                            break;

                        case 'rejected':
                            $return  = '<span class="badge p-1 bg-danger">Rejected</span>';
                            break;

                        case 'verified':
                            $return  = '<span class="badge p-1 bg-success">Verified</span>';
                            break;
                        
                        default:
                            $return = '<span class="badge p-1 bg-secondary">Unverified</span>';
                            break;
                    }
                    return $return;
                }else{
                    return '<span class="badge p-1 bg-secondary">Unverified</span>';
                }
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'status', 'verification'])
            ->make(true);
    }

    public function changeStatus($id){
        $model = User::find($id);

        if(!$model){
            return $this->setResponse(null, 'Data not found', 404);
        }

        DB::beginTransaction();
        $model->is_active = !$model->is_active;
        $model->save();
        DB::commit();
        return $this->setResponse(null, 'Status changed', 200);
    }

    public function resetPassword($id){
        $model = User::find($id);

        if(!$model){
            return $this->setResponse(null, 'Data not found', 404);
        }

        DB::beginTransaction();
        $model->password = bcrypt(config('env.default_password'));
        $model->save();
        DB::commit();
        return $this->setResponse(null, 'Reset password successfully', 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username|alpha_dash|min:3',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), null, 422);
        }

        DB::beginTransaction();
        $model = new User;
        $model->name = $request->name;
        $model->username = strtolower($request->username);
        $model->email = $request->email;
        $model->phone_number = $request->phone_number;
        $model->password = bcrypt(config('env.default_password'));
        $model->role_id = strtolower($request->input('type', 'user')) == 'admin' ? config('env.role.admin') : config('env.role.user');
        $model->email_verified_at = now();
        $model->save();
        DB::commit();
        
        return $this->setResponse($model, 'User created', 201);
    }

    public function list(Request $request){
        $model = User::select(['users.id', 'users.name', 'username', 'email', 'is_active', 'role_id', 'roles.name as role_name'])
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->where('is_active', true);

        if($request->filled('role')){
            $model->where('role_id', $request->role);
        }

        if ($request->has('q')) {
            $search = $request->q;
            $model->orderby('users.name', 'asc')->where('users.name', 'LIKE', "%$search%");
        } else {
            $model->orderby('users.name', 'asc')->limit(10);
        }

        return $this->setResponse($model->get(), null, 200);
    }

    public function show($id){
        $model = User::with(['detail.documents', 'detail.village.district.regency.province', 'photoProfile'])->find($id);

        if(!$model){
            return $this->setResponse(null, 'Data not found', 404);
        }

        return $this->setResponse($model, null, 200);
    }

    public function updateVerifiying($id, Request $request){
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:0,1',
            'note' => 'nullable|required_if:status,0|string',
        ]);

        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), 'Silahkan isi form dengan benar', 422);
        }

        $model = UserDetail::where('user_id', $id)->first();

        if(!$model){
            return $this->setResponse(null, 'Data not found', 404);
        }

        DB::beginTransaction();
        $model->status = $request->status ? 'verified' : 'rejected';
        $model->reject_note = $request->note;
        $model->save();
        DB::commit();

        return $this->setResponse($model, 'User updated', 200);
    }
}
