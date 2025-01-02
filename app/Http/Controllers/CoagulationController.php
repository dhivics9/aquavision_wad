<?php

namespace App\Http\Controllers;

use App\Models\coagulation_analysis;
use App\Models\WaterMonitoring;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use IntlDateFormatter;

class CoagulationController extends Controller
{
    public function getCreateForm(WaterMonitoring $waterQuality) {

        $nav = 'Tambah data coagulation';

        $coagulation_analysis = coagulation_analysis::where('water_qualitys_id', $waterQuality->id)->first();

        return view('coagulation', compact('nav', 'waterQuality', 'coagulation_analysis'));
    }

    public function store(Request $request, WaterMonitoring $waterQuality)
    {

        $validatedData = $request->validate([
            'chemical_dosage' => 'required|numeric',
        ]);

        $validatedData['water_qualitys_id'] = $waterQuality->id;

        coagulation_analysis::create($validatedData);

        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data created successfully.');
    }

    public function update(Request $request, coagulation_analysis $coagulation_analysis, WaterMonitoring $waterQuality) 
    {

        $validatedData = $request->validate([
            'chemical_dosage' => 'required|numeric',
        ]);

        $coagulation_analysis->update($validatedData);

        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data created successfully.');
    }

    public function destroy(coagulation_analysis $coagulation_analysis, WaterMonitoring $waterQuality)
    {
        $coagulation_analysis->delete();
        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data successfully deleted.');
    }

    public function pdf_generator(Request $request, coagulation_analysis $coagulation_analysis, WaterMonitoring $waterQuality) 
    {

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $formatter->setPattern('d MMMM yyyy');
        $formattedDate = $formatter->format(new \DateTime());

        $analysis = 'Tidak ada data';

        if ($coagulation_analysis->chemical_dosage >= 10 && $coagulation_analysis->chemical_dosage <= 25) {
            $analysis = 'Bagus';
        } else if ($coagulation_analysis->chemical_dosage > 25 && $coagulation_analysis->chemical_dosage <= 35) {
            $analysis = 'Cukup';
        } else if ($coagulation_analysis->chemical_dosage < 10 ) {
            $analysis = 'Kurang';
        }

        $data = [
            'title'=> 'Coagulation Analysis',
            'dataOneTitle' => 'Chemical Dosage',
            'dataOne' => $coagulation_analysis->chemical_dosage,
            'date' => $formattedDate,
            'analysis' => $analysis,
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf', $data);

        return $pdf->download('Coagulation.pdf');

    }

}
