<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Lessons extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'lessons';
    protected $fillable = [
        'course_id',
        'level',
        'title',
        'description',
        'lesson_video',
    ];

    public function seasons(): BelongsToMany
    {
        return $this->belongsToMany(Courses::class, 'lesson_id');
    }


}