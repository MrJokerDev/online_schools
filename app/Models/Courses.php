<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = [
        'course_id',
        'user_id',
        'title',
        'description',
        'lesson_video'
    ];

    protected function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'courses_id');
    }
}