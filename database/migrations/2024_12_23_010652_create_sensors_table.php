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
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('sensor_name');
            $table->string('sensor_type');
            $table->string('sensor_location');
            $table->string('sensor_status')->default('active');
            $table->timestamps(); 
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensors');
    }
};
