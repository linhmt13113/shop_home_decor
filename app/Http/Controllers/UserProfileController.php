<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('user.profile', [
            'user' => Auth::user(),
            'title' => 'Your Profile'
        ]);
    }

    public function update(Request $request)
    {
        // Validate
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|confirmed|min:6',
        ]);

        try {
            $user = Auth::user();
            // update name and mail
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            // if change password -> update new password
            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();

            Session::flash('success', 'Profile updated successfully.');
            return redirect()->route('profile');
        } catch (\Exception $e) {
            Session::flash('error', 'Failed to update profile.');
            return redirect()->back();
        }
    }
}
