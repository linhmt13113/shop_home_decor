<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Login System'
        ]);
    }

    use \Illuminate\Foundation\Validation\ValidatesRequests;
    public function store(Request $request)
    {
        // dd($request->input());

        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        if (
            Auth::attempt([
                'email' => $request->input('email')
                ,
                'password' => $request->input('password'),
            ], $request->input('remember'))
        ) {
            return redirect()->route('admin');
        }

        Session::flash('error', 'Email or Password Incorrect');
        return redirect()->back();

    }
}