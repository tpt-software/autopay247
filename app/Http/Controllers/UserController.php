<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{

    private $model;
    private $listRoute;

    public function __construct()
    {
        $this->model = new User();
        $this->listRoute = redirect()->route('admin.user.index');
    }

    public function index(Request $request)
    {
        $search = $request->get('key_word');
        $perPage = 25;
        $users = User::where(function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        })->latest()->paginate($perPage);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['role'] = (int)($input['role']);
        $user = User::create($input);

        return redirect()->route('admin.user.index')->with('success', 'Thêm thành công');
    }

    public function edit($id){
        $user= User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request,$id){
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.user.index')->with('success', 'Cập nhật thành công');
    }

    public function destroy(Request $request,$id){
        $user = User::find($id)->delete();

        if($request->wantsJson()){
            return response()->json(array('success' => true, 'success' =>'Xóa thành công'));
        }
        return redirect()->back()->with('success', 'Xóa thành công');
    }

}