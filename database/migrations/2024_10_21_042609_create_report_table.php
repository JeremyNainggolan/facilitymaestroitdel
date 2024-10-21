<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report', function (Blueprint $table) {
            $table->id('report_id');
            $table->string('reason');
            $table->string('location');
            $table->string('filename');
            $table->unsignedBigInteger('rent_id', false)->nullable();
            $table->foreign('rent_id')->references('rent_id')->on('rent');
            $table->unsignedBigInteger('facility_id', false);
            $table->foreign('facility_id')->references('facility_id')->on('facility');
            $table->unsignedBigInteger('item_id', false);
            $table->foreign('item_id')->references('item_id')->on('item');
            $table->unsignedBigInteger('user_id', false);
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
