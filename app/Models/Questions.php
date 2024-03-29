<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Questions extends Model
{
    use HasFactory;

    protected $table = 'questions';
    //protected $primaryKey = 'questions_id';
    
    protected $fillable = [
        'id',
        'questions',
        'correct_answers',
        'description',
        'type'
    ];

    public function answer(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

}