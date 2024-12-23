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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('First Name')->unique();
            $table->string('Last Name')->unique();
            $table->string('role')->default('user');
            $table->string('enterprise')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->timestamps();

        });

        Schema::create('subcription', function (Blueprint $table) {
            $table->id();
            $table->string('subcription type')->unique();
            $table->time('subcription duration');
            $table->timestamp('subcription start date');
            $table->timestamp('subcription end date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('subcription');
    }
};
