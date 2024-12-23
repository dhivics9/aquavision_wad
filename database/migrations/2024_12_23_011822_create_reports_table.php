<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_name')->unique();
            $table->timestamp('report_date');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('water_qualitys_id')->constrained('water_qualitys')->onDelete('cascade');
            $table->foreignId('sensor_id')->constrained()->onDelete('cascade');
            $table->foreignId('coagulation_analysis_id')->constrained('coagulation_analysis')->onDelete('cascade');
            $table->foreignId('flocculation_analysis_id')->constrained('flocculation_analysis')->onDelete('cascade');
            $table->foreignId('sedimentation_analysis_id')->constrained('sedimentation_analysis')->onDelete('cascade');
            $table->foreignId('filtration_analysis_id')->constrained('filtration_analysis')->onDelete('cascade');
            $table->foreignId('disinfection_analysis_id')->constrained('disinfection_analysis')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
