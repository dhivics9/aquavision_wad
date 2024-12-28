<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sensors = Sensor::all(); 
        return view('home', compact('sensors'));
    }
}