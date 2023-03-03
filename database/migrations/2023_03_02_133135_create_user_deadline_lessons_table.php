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
        Schema::create('user_deadline_lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('lesson_id');
            $table->dateTime('start_date_and_time');
            $table->dateTime('end_date_and_time');
            $table->dateTime('start_new_lesson_date_and_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_deadline_lessons');
    }
};