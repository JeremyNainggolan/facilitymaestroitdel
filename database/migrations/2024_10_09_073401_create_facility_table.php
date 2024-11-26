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
        Schema::create('facility', function (Blueprint $table) {
            $table->id('facility_id')->primary();
            $table->string('name')->nullable();
            $table->string('detail')->nullable();
            $table->string('filename')->nullable();
            $table->enum('status', ['available', 'unavailable'])->default('available')->nullable();
            $table->enum('condition', ['good', 'bad'])->default('good')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility');
    }
};
