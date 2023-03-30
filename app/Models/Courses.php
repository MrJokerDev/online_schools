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
        'id',
        'courses',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'courses_id');
    }

    public function level(): BelongsToMany 
    {
        return $this->belongsToMany(Levels::class, 'course_levels', 'courses_id', 'level_id');
    }

}