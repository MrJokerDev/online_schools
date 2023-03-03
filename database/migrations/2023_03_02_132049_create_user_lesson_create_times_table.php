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
        Schema::create('user_lesson_create_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('first_lesson_day');
            $table->string('second_lesson_day');
            $table->string('third_lesson_day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_lesson_create_times');
    }
};