<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Levels extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'levels';
    protected $fillable = [
        'id',
        'level'
    ];

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lessons::class, 'level_lessons');
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Courses::class, 'courses_level');
    }
}