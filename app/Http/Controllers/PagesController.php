<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    use \Illuminate\Foundation\Validation\ValidatesRequests;

    public function index()
    {
        return view('user.login', ['title' => 'User Login']);
    }

    public function store(Request $request)
    {
        // Validate input
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {

            $user = Auth::user();

            if ($user->level == 0) {
                return redirect('/');
            }

            Auth::logout();
            Session::flash('error', 'Only regular users can login.');
            return redirect()->back();
        }

        Session::flash('error', 'Invalid email or password.');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showRegisterForm()
    {
        return view('user.register', [
            'title' => 'Register'
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 0,
        ]);

        auth()->login($user);

        return redirect('/')->with('success', 'Registration successful!');
    }
}
