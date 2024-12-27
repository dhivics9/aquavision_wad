<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Sensor;


class SensorController extends Controller
{
    public function index()
    {
        $sensors = Sensor::all(); 
        return view('sensor', compact('sensors')); 
    }

    public function getCreateForm()
    {
        return view('create_sensor');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sensor_name' => 'required|string|max:255',
            'sensor_type' => 'required|string|max:255',
            'sensor_location' => 'required|string|max:255',
            'sensor_status' => 'nullable|string|in:active,inactive',
        ]);

        Sensor::create($validatedData);

        return redirect()->route('sensor.index')->with('success', 'Sensor added successfully!');
    }



    public function show(Sensor $sensor)
    {
        return view('show', compact('sensor'));
    }

    public function getEditForm($id)
    {
        $sensor = Sensor::findOrFail($id);
        return response()->json([
            'message' => 'Display form for editing the sensor.',
            'data' => $sensor,
        ]);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sensor_name' => 'required|string|max:255',
            'sensor_type' => 'required|string|max:255',
            'sensor_location' => 'required|string|max:255',
            'sensor_status' => 'nullable|string|in:active,inactive',
            'last_active' => 'nullable|date',
        ]);

        $sensor = Sensor::findOrFail($id);
        $sensor->update($validatedData);

        return redirect()->route('sensor.index')->with('success', 'Sensor updated successfully!');
    }



    public function destroy($id)
    {
        $sensor = Sensor::findOrFail($id);
        $sensor->delete();
        return redirect()->route('sensor.index')->with('success', 'Sensor delete successfully!');
    }
}