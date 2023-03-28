<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request){
        $model = User::select(['users.id', 'users.name', 'username', 'email', 'is_active', 'roles.name as role_name'])
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ;
        if($request->filled('type')){
            $model->where('roles.name', strtolower($request->type));
        }else{
            $model->where('roles.name', 'user');
        }

        return DataTables::of($model)
            ->addColumn('status', function ($data) {
                $checked = $data->is_active ? 'checked' : '';
                return '
                <div class="text-center w-100">
                    <div class="form-check form-switch justify-content-center" >
                        <input onchange="changeStatus(this,' . $data->id . ')" class="form-check-input" type="checkbox" '. $checked . '/>
                    </div>
                </div>';
            })
            ->addColumn('action', function ($data) {
                return '
                    <span onclick="detail('. $data->id .')" class="fas fa-info-circle text-primary me-1" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Detail"></span>
                    <span onclick="resetPassword('. $data->id .')" class="fas fa-redo-alt text-danger" style="font-size: 1.2rem; cursor: pointer" data-toggle="tooltip" title="Reset Password"></span>
                ';
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'status'])
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
        ]);

        if ($validator->fails()) {
            return $this->setResponse($validator->errors(), null, 422);
        }

        DB::beginTransaction();
        $model = new User;
        $model->name = $request->name;
        $model->username = strtolower($request->username);
        $model->email = $request->email;
        $model->password = bcrypt(config('env.default_password'));
        $model->role_id = strtolower($request->input('type', 'user')) == 'admin' ? config('env.role.admin') : config('env.role.user');
        $model->email_verified_at = now();
        $model->save();
        DB::commit();
        
        return $this->setResponse($model, 'User created', 201);
    }
}
