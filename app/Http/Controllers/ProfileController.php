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
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'enterprise' => 'nullable',
            'email' => 'required|email:dnsunique:users,email,' . $user->id,
            'phone' => 'required|numeric|unique:users,phone,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
        ]);

        $user->update([
            'First_Name' => $request->firstName,
            'Last_Name' => $request->lastName,
            'enterprise' => null,
            'email' => $request->email,
            'phone' => $request->phone,            
        ]);

        if (!empty($request->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $request->session()->put('updateProfile', 'Successfully updated your profile!');

        return view('profile', compact('user'));
    }

}
