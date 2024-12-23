<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Sensor;


class SensorController extends Controller
{
    public function index()
    {
        // $sensors = Sensor::all();
        $sensor = "No Sensor Detected";
        $nav = "Data Sensor";
        return view('sensor', compact('sensor', 'nav'));
    }
}