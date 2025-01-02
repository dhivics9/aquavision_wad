<?php

namespace App\Http\Controllers;

use App\Models\filtration_analysis;
use App\Models\WaterMonitoring;
use Illuminate\Http\Request;
use IntlDateFormatter;

class FiltrationController extends Controller
{
    public function getCreateForm(WaterMonitoring $waterQuality) {

        $nav = 'Tambah data Filtration';

        $filtration_analysis = filtration_analysis::where('water_qualitys_id', $waterQuality->id)->first();

        return view('filtration', compact('nav', 'waterQuality', 'filtration_analysis'));
    }

    public function store(Request $request, WaterMonitoring $waterQuality)
    {

        $validatedData = $request->validate([
            'filter_type' => 'required',
            'filter_efficiency' => 'required|numeric',
        ]);

        $validatedData['water_qualitys_id'] = $waterQuality->id;

        filtration_analysis::create($validatedData);

        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data created successfully.');
    }

    public function update(Request $request, filtration_analysis $filtration_analysis, WaterMonitoring $waterQuality) 
    {

        $validatedData = $request->validate([
            'filter_type' => 'required',
            'filter_efficiency' => 'required|numeric',
        ]);
        $filtration_analysis->update($validatedData);

        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data created successfully.');
    }

    public function destroy(filtration_analysis $filtration_analysis, WaterMonitoring $waterQuality)
    {
        $filtration_analysis->delete();
        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data successfully deleted.');
    }

    public function pdf_generator(filtration_analysis $filtration_analysis, WaterMonitoring $waterQuality) 
    {

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $formatter->setPattern('d MMMM yyyy');
        $formattedDate = $formatter->format(new \DateTime());

        $analysis = 'Tidak ada data';

        if ($filtration_analysis->filter_efficiency < 0.1) {
            $analysis = 'Bagus';
        } else if ($filtration_analysis->filter_efficiency >= 0.1 && $filtration_analysis->filter_efficiency <= 0.3) {
            $analysis = 'Cukup';
        } else if ($filtration_analysis->filter_efficiency > 0.3 ) {
            $analysis = 'Kurang';
        }

        $data = [
            'title'=> 'Filtration Analysis',
            'dataOneTitle' => 'Filter Type',
            'dataOne' => $filtration_analysis->filter_type,
            'dataTwoTitle' => 'Filter Efficiency',
            'dataTwo' => $filtration_analysis->filter_efficiency,
            'date' => $formattedDate,
            'analysis' => $analysis,
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf', $data);

        return $pdf->download('Disinfection.pdf');

    }
}
