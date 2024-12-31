<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    public function index()
    {
        $nav = 'Analisis';
        return view('analisis', compact('nav'));
    }
}
