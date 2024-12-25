<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $credentials = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'enterprise' => 'nullable',
            'email' => 'required|email:dns',
            // 'phone' => 'required|numeric|unique:users,phone,' . $user->id,
            // 'password' => 'required|confirmed|min:8',
        ]);

        dd($user);

        // $user->update($credentials);

        // $request->session()->put('success', 'Registration success!');

        // return redirect('/profile');
    }

}
