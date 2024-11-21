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
        Schema::create('rent', function (Blueprint $table) {
            $table->id('rent_id')->primary();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('item_id', false)->nullable();
            $table->foreign('item_id')->references('item_id')->on('item');
            $table->unsignedBigInteger('facility_id', false)->nullable()->nullable();
            $table->foreign('facility_id')->references('facility_id')->on('facility');
            $table->unsignedBigInteger('user_id', false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status', ['pending', 'accepted', 'rejected', 'returned', 'reported'])->default('pending');
            $table->date('request_date');
            $table->date('approve_date')->nullable();
            $table->date('reject_date')->nullable();
            $table->date('return_date')->nullable();
            $table->date('report_date')->nullable();
            $table->date('rent_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent');
    }
};
