<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $table = 'answers';
    //protected $primaryKey = 'questions_id';  
    
    protected $fillable = [
        'answer_a',
        'answer_b',
        'answer_c',
        'questions_id',
    ];

    public function questions(): BelongsTo
    {
        return $this->belongsTo(Questions::class, 'questions_id');
    }
}