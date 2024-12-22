<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (!session()->has('user')) {
            return redirect()->route('login');
        }

        $user = session('user');
        // $sensor = null;

        return view('home');
    }
}