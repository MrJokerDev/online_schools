<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_lesson_create_times extends Model
{
    use HasFactory;

    protected $table = 'user_lesson_create_times';

    protected $fillable = [
        'user_id',
        'first_lesson_day',
        'second_lesson_day',
        'third_lesson_day',
    ];
}