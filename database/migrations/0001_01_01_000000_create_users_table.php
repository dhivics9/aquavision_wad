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

        Schema::create('subcription', function (Blueprint $table) {
            $table->id();
            $table->string('subcription type')->unique();
            $table->time('subcription duration');
            $table->timestamp('subcription start date')->nullable();
            $table->timestamp('subcription end date')->nullable();
        });

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
            $table->foreignId('subcription_id')->constrained('subcription')->onDelete('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('subcription');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
