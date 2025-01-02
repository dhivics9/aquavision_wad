<?php

namespace App\Http\Controllers;

use App\Models\disinfection_analysis;
use App\Models\WaterMonitoring;
use Illuminate\Http\Request;
use IntlDateFormatter;

class DisinfectionController extends Controller
{
    public function getCreateForm(WaterMonitoring $waterQuality) {

        $nav = 'Tambah data disinfection';

        $disinfection_analysis = disinfection_analysis::where('water_qualitys_id', $waterQuality->id)->first();

        return view('disinfection', compact('nav', 'waterQuality', 'disinfection_analysis'));
    }

    public function store(Request $request, WaterMonitoring $waterQuality)
    {

        $validatedData = $request->validate([
            'disinfectant_type' => 'required',
            'contact_time' => 'required|numeric',
            'residual_chlorine_level' => 'required|numeric',
        ]);

        $validatedData['water_qualitys_id'] = $waterQuality->id;

        disinfection_analysis::create($validatedData);

        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data created successfully.');
    }

    public function update(Request $request, disinfection_analysis $disinfection_analysis, WaterMonitoring $waterQuality) 
    {

        $validatedData = $request->validate([
            'disinfectant_type' => 'required',
            'contact_time' => 'required|numeric',
            'residual_chlorine_level' => 'required|numeric',
        ]);

        $disinfection_analysis->update($validatedData);

        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data created successfully.');
    }

    public function destroy(disinfection_analysis $disinfection_analysis, WaterMonitoring $waterQuality)
    {
        $disinfection_analysis->delete();
        return redirect()->route('analisis.show', compact('waterQuality'))->with('successWater', 'Data successfully deleted.');
    }

    public function pdf_generator(disinfection_analysis $disinfection_analysis, WaterMonitoring $waterQuality) 
    {

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        $formatter->setPattern('d MMMM yyyy');
        $formattedDate = $formatter->format(new \DateTime());

        $analysis = 'Tidak ada data';

        if ($disinfection_analysis->residual_chlorine_level >= 0.2 && $disinfection_analysis->residual_chlorine_level <= 0.5) {
            $analysis = 'Bagus';
        } else if ($disinfection_analysis->residual_chlorine_level >= 0.1 && $disinfection_analysis->residual_chlorine_level < 0.2) {
            $analysis = 'Cukup';
        } else if ($disinfection_analysis->residual_chlorine_level < 0.1 ) {
            $analysis = 'Kurang';
        }

        $data = [
            'title'=> 'Disinfection Analysis',
            'dataOneTitle' => 'Disinfectant Type',
            'dataOne' => $disinfection_analysis->disinfectant_type,
            'dataTwoTitle' => 'Contact Time',
            'dataTwo' => $disinfection_analysis->contact_time,
            'dataThreeTitle' => 'Residual Chlorine Level',
            'dataThree' => $disinfection_analysis->residual_chlorine_level,
            'date' => $formattedDate,
            'analysis' => $analysis,
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdf', $data);

        return $pdf->download('Disinfection.pdf');

    }

}
