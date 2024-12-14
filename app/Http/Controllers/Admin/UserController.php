<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Services\UserService;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }
    public function create(){
        return view('admin.users.add', [
            'title' => 'Add new user',
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'level' => 'required|in:0,1',  // 0: user, 1: admin
        ]);

        $result = $this->userService->insert($request);
        if ($result) {
            return redirect()->route('admin.users.users.list');
        }

        return redirect()->back();
    }

    public function index(){
        return view('admin.users.list', [
            'title' => 'User list',
            'users' => $this->userService->get()
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.edit', [
            'title' => 'Edit user',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'level' => 'required|in:0,1', // 0: user, 1: admin
        ]);

        $result = $this->userService->update($request, $user);
        if ($result) {
            return redirect()->route('admin.users.users.list');

        }

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $result = $this->userService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Delete user successful'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Delete user failed'
        ]);
    }
}
