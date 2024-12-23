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
        Schema::create('water_qualitys', function (Blueprint $table) {
            $table->id();
            $table->decimal('ph_level', 4, 2);
            $table->decimal('turbidity', 6, 2);
            $table->decimal('temperature', 5, 2);
            $table->decimal('color', 6, 2);
            $table->decimal('tds', 6, 2);
            $table->decimal('hardness', 6, 2);
            $table->decimal('nitrate', 6, 2);
            $table->decimal('nitrite', 6, 2);
            $table->decimal('ammonia', 6, 2);
            $table->decimal('chloride', 6, 2);
            $table->decimal('sulfate', 6, 2);
            $table->decimal('fluoride', 6, 2);
            $table->decimal('iron', 6, 2);
            $table->decimal('manganese', 6, 2);
            $table->integer('coliform_total');
            $table->integer('e_coli');
            $table->timestamp('collected_at');
            $table->timestamp('created_at')->useCurrent();
            $table->foreignId('sensor_id')->constrained('sensors');
            $table->foreignId('user_id')->constrained('users');
        });

        Schema::create('coagulation_analysis', function (Blueprint $table) {
            $table->id('coagulation_id');
            $table->foreignId('data_id')->constrained('water_qualitys');
            $table->decimal('chemical_dosage', 10, 2);
            $table->timestamps();
    });

        Schema::create('flocculation_analysis', function (Blueprint $table) {
            $table->id('flocculation_id');
            $table->foreignId('data_id')->constrained('water_qualitys');
            $table->decimal('mixing_time', 10, 2);
            $table->decimal('floc_size', 10, 2);
            $table->timestamps();
    });

        Schema::create('sedimentation_analysis', function (Blueprint $table) {
            $table->id('sedimentation_id');
            $table->foreignId('data_id')->constrained('water_qualitys');
            $table->decimal('sedimentation_rate', 10, 2);
            $table->timestamps();
    });

        Schema::create('filtration_analysis', function (Blueprint $table) {
            $table->id('filtration_id');
            $table->foreignId('data_id')->constrained('water_qualitys');
            $table->string('filter_type', 100);
            $table->decimal('filter_efficiency', 10, 2);
            $table->timestamps();
    });

        Schema::create('disinfection_analysis', function (Blueprint $table) {
            $table->id('disinfection_id');
            $table->foreignId('data_id')->constrained('water_qualitys');
            $table->string('disinfectant_type', 100);
            $table->decimal('contact_time', 10, 2);
            $table->decimal('residual_chlorine_level', 10, 2);
            $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('water_qualitys');
        Schema::dropIfExists('coagulation_analysis');
        Schema::dropIfExists('flocculation_analysis');
        Schema::dropIfExists('sedimentation_analysis');
        Schema::dropIfExists('filtration_analysis');
        Schema::dropIfExists('disinfection_analysis');
    }
};
