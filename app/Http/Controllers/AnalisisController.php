<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\WaterMonitoring;
use App\Models\Sensor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AnalisisController extends Controller
{

    public function index()
    {
        $nav = 'Analisis';
        
        $sensors = Sensor::all();

        // dd($sensors->toArray()->id);

        // foreach ($sensors as $sensor) {
        //     dd($sensor->sensor_type); // Dump the sensor object
        //     echo $sensor->sensor_name; // Access the sensor_name attribute
        //     echo $sensor->sensor_type; // Access the sensor_type attribute
        //     // Add more attributes as needed
        // }

        $users = Auth::user();

        $waterQualities = WaterMonitoring::latest()->paginate(10);

        return view('analisis.create', compact('nav', 'sensors', 'users'));
    }
    
    // public function index()
    // {
    //     $waterQualities = WaterMonitoring::latest()->paginate(10);
    //     return view('analisis', compact('waterqualitys'));
        
    //     if ($waterQualities->isEmpty()) {
    //         return view('analisis.empty');
    //     }
    // }

    public function getCreateForm(WaterMonitoring $waterQuality)
    {
        $user = User::all();
        $sensor = Sensor::all();
        return view('analisis.create', compact('waterQuality','user','sensor'));
    }

    public function store(Request $request)
    {



        $validatedData = $request->validate([
            'ph_level' => 'required|numeric',
            'turbidity' => 'required|numeric',
            'temperature' => 'required|numeric',
            'color' => 'required|numeric',
            'tds' => 'required|numeric',
            'hardness' => 'required|numeric',
            'nitrate' => 'required|numeric',
            'nitrite' => 'required|numeric',
            'ammonia' => 'required|numeric',
            'chloride' => 'required|numeric',
            'sulfate' => 'required|numeric',
            'fluoride' => 'required|numeric',
            'iron' => 'required|numeric',
            'manganese' => 'required|numeric',
            'coliform_total' => 'required|integer',
            'e_coli' => 'required|integer',
            'collected_at' => 'required|date',
            'sensor_id' => 'required|exists:sensors,id',
        ]);

        $validatedData['users_id'] = Auth::id();

        WaterMonitoring::create($validatedData);

        return redirect()->route('analisis.create')->with('success', 'Data created successfully.');
    }

    public function edit(WaterMonitoring $waterQuality)
    {
        return view('analisis.edit', compact('waterQuality'));
    }

    public function getEditForm(WaterMonitoring $waterQuality)
    {
        $user = User::all();
        $sensor = Sensor::all();
        return view('analisis.edit', compact('waterQuality','user','sensor'));
    }

    public function update(Request $request, string $id)
    {
        $val = $request->validate([
            'ph_level' => 'required|numeric',
            'turbidity' => 'required|numeric',
            'temperature' => 'required|numeric',
            'color' => 'required|numeric',
            'tds' => 'required|numeric',
            'hardness' => 'required|numeric',
            'nitrate' => 'required|numeric',
            'nitrite' => 'required|numeric',
            'ammonia' => 'required|numeric',
            'chloride' => 'required|numeric',
            'sulfate' => 'required|numeric',
            'fluoride' => 'required|numeric',
            'iron' => 'required|numeric',
            'manganese' => 'required|numeric',
            'coliform_total' => 'required|integer',
            'e_coli' => 'required|integer',
            'collected_at' => 'required|date',
            'sensor_id' => 'required|exists:sensors,id',
            'user_id' => 'required|exists:users,id',
        ]);
        $waterQuality = WaterMonitoring::findOrFail($id);
        $waterQuality->update($val);

        return redirect()->route('analisis.index')->with('success', 'Data updated successfully.');
    }

    public function destroy(string $id)
    {
        $waterQuality=WaterMonitoring::findOrFail($id);
        $waterQuality->delete();
        return redirect()->route('analisis.index')->with('success', 'Data deleted successfully.');
    }
    public function show(string $id)
    {
        $waterQuality = WaterMonitoring::findOrFail($id);
        return view('analisis.show', compact('waterQuality'));
    }
}
  
