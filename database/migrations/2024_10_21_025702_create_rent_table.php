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
        Schema::create('rent', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->integer('item_id', false);
            $table->integer('user_id', false);
            $table->string('rent_user');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->date('request_date');
            $table->date('approve_date')->nullable();
            $table->date('reject_date')->nullable();
            $table->date('return_date')->nullable();
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
