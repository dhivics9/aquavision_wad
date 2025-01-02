<?php

namespace App\Http\Controllers;

use App\Models\flocculation_analysis;
use App\Models\WaterMonitoring;
use Illuminate\Http\Request;
use IntlDateFormatter;

class FlocculationController extends Controller
{
    public function getCreateForm(WaterMonitoring $waterQuality) {

        $nav = 'Tambah data flocculation';

        $flocculation_analysis = flocculation_analysis::where('water_qualitys_id', $waterQuality->id)->first();

        return view('flocculation', compact('nav', 'waterQuality', 'flocculation_analysis'));
    }

    public function store(Request $request, WaterMonitoring $waterQuality)
    {

        $validatedData = $request->validate([
            'mixing_time' => 'required|numeric',
            'floc_size' => 'required|numeric',
        ]);

        $validatedData['water_qualitys_id'] = $waterQuality->id;

        flocculation_analysis::create($validatedData);

        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data created successfully.');
    }

    public function update(Request $request, flocculation_analysis $flocculation_analysis, WaterMonitoring $waterQuality) 
    {

        $validatedData = $request->validate([
            'mixing_time' => 'required|numeric',
            'floc_size' => 'required|numeric',
        ]);

        $flocculation_analysis->update($validatedData);

        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data created successfully.');
    }

    public function destroy(flocculation_analysis $flocculation_analysis, WaterMonitoring $waterQuality)
    {
        $flocculation_analysis->delete();
        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data successfully deleted.');
    }

    public function pdf_generator(flocculation_analysis $flocculation_analysis, WaterMonitoring $waterQuality) 
    {

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $formatter->setPattern('d MMMM yyyy');
        $formattedDate = $formatter->format(new \DateTime());

        $analysis = 'Tidak ada data';

        if ($flocculation_analysis->floc_size >= 100 && $flocculation_analysis->floc_size <= 500) {
            $analysis = 'Bagus';
        } else if ($flocculation_analysis->floc_size >= 50 && $flocculation_analysis->floc_size < 100) {
            $analysis = 'Cukup';
        } else if ($flocculation_analysis->floc_size < 50 ) {
            $analysis = 'Kurang';
        }

        $data = [
            'title'=> 'Flocculation Analysis',
            'dataOneTitle' => 'Mixing Time',
            'dataOne' => $flocculation_analysis->mixing_time,
            'dataTwoTitle' => 'Floc Size',
            'dataTwo' => $flocculation_analysis->floc_size,
            'date' => $formattedDate,
            'analysis' => $analysis,
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf', $data);

        return $pdf->download('Flocculation.pdf');

    }

}
