<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User_answers extends Model
{
    use HasFactory;
    
    protected  $primaryKey = 'user_id';
    public $incrementing = false;
    
    protected $fillable = [
        'id',
        'user_id',
        'questions_id',
        'user_answer',
        'ball',
    ];

    protected $table = 'user_answers';

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}