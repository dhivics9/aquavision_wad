<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $users = [
        ['email' => 'testajah@gmail.com', 'password' => 'akuganteng'],
    ];

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        foreach ($this->users as $user) {
            if ($user['email'] === $credentials['email'] && $user['password'] === $credentials['password']) {
                session(['user' => $user]);
                return redirect()->route('home');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}