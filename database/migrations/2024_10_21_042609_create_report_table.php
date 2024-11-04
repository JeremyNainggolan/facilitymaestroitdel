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
            $table->enum('condition', ['good', 'bad'])->default('good');
            $table->date('report_date');
            $table->unsignedBigInteger('rent_id', false);
            $table->unsignedBigInteger('facility_id', false)->nullable();
            $table->unsignedBigInteger('item_id', false)->nullable();
            $table->unsignedBigInteger('user_id', false);
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
