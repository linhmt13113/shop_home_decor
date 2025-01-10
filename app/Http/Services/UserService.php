<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserService
{
    public function insertNewUser($request)
    {
        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'level' => $request->input('level', 0),
            ]);

            Session::flash('success', 'Add new user successful');
        } catch (\Exception $err) {
            Session::flash('error', 'Add new user failed');
            Log::error($err->getMessage());
            return false;
        }

        return true;
    }

    public function getNewUser()
    {
        return User::orderByDesc('id')->paginate(10);
    }

    public function updateNewUser($request, $user)
    {
        try {
            $user->fill([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'level' => $request->input('level'),
            ]);

            if ($request->input('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            Session::flash('success', 'Update user successful');
        } catch (\Exception $err) {
            Session::flash('error', 'Update user failed');
            Log::error($err->getMessage());
            return false;
        }

        return true;
    }

    public function destroyNewUser($request)
    {
        try {
            $user = User::findOrFail($request->input('id'));
            $user->delete();

            return true;
        } catch (\Exception $err) {
            Log::error($err->getMessage());
            return false;
        }
    }

    public function showAdmins()
    {
        return User::where('level', 1)->orderByDesc('id')->get();
    }
}

