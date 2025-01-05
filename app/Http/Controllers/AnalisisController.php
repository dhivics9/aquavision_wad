<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\WaterMonitoring;
use App\Models\Sensor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use IntlDateFormatter;

class AnalisisController extends Controller
{

    public function index()
    {
        $nav = 'Data Air';
        
        $sensors = Sensor::where('users_id', Auth::id())->get(); 

        $users = Auth::user();

        $waterQualities = WaterMonitoring::where('users_id', Auth::id())->latest()->paginate(10);

        return view('analisis.index', compact('nav', 'sensors', 'users', 'waterQualities'));
    }

    public function getCreateForm(WaterMonitoring $waterQuality)
    {
        $nav = 'Tambah data air';
        $users = Auth::user();
        $sensors = Sensor::where('users_id', Auth::id())->get(); 
        return view('analisis.create', compact('nav', 'sensors', 'users'));
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
            'sensors_id' => 'required|exists:sensors,id',
        ]);

        

        $validatedData['users_id'] = Auth::id();

        WaterMonitoring::create($validatedData);

        return redirect()->route('analisis.index')->with('successWater', 'Data created successfully.');
    }

    public function show(WaterMonitoring $waterQuality)
    {
        $sensors = Sensor::where('users_id', Auth::id())->get(); 
        $users = Auth::user();

        $sensor = $sensors->firstWhere('id', $waterQuality->sensors_id);
        if ($sensor) {
            $nav = 'Detail Data Air ' . $sensor->sensor_name . ', Tanggal : ' . $waterQuality->updated_at;
        }

        return view('analisis.show', compact('waterQuality', 'nav', 'sensors', 'users'));
    }

    public function update(Request $request, WaterMonitoring $waterQuality)
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
        ]);

        
        $waterQuality->update($validatedData);

        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data updated successfully.');
    }

    public function destroy(WaterMonitoring $waterQuality)
    {
        $waterQuality->delete();
        return redirect()->route('analisis.index')->with('successWater', 'Data deleted successfully.');
    }

    public function pdf_generator(WaterMonitoring $waterQuality) 
    {

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $formatter->setPattern('d MMMM yyyy');
        $formattedDate = $formatter->format(new \DateTime());

        $data = [
            'title'=> 'Water Monitoring',
            'dataOneTitle' => 'ph_level',
            'dataTwoTitle' => 'turbidity',
            'dataThreeTitle' => 'temperature',
            'dataFourTitle' => 'color',
            'dataFiveTitle' => 'tds',
            'dataSixTitle' => 'hardness',
            'dataSevenTitle' => 'nitrate',
            'dataEightTitle' => 'nitrite',
            'dataNineTitle' => 'ammonia',
            'dataTenTitle' => 'chloride',
            'dataElevenTitle' => 'sulfate',
            'dataTwelveTitle' => 'fluoride',
            'dataThirteenTitle' => 'iron',
            'dataFourteenTitle' => 'manganese',
            'dataFifteenTitle' => 'coliform_total',
            'dataSixteenTitle' => 'e_coli',
            'datas' => [$waterQuality],
            'date' => $formattedDate,
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfwater', $data);

        return $pdf->download('Water.pdf');

    }

}