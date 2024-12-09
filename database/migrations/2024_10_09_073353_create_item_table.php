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
        Schema::create('item', function (Blueprint $table) {
            $table->id('item_id')->primary();
            $table->string('item_name');
            $table->string('location')->nullable();
            $table->string('description')->nullable();
            $table->enum('item_status', ['available', 'unavailable'])->default('available');
            $table->enum('condition', ['good', 'broken', 'lost'])->default('good');
            $table->string('filename')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item');
    }
};
