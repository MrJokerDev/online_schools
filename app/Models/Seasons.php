<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seasons extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'season',
        'user_id'
    ];

    public function user_season(): HasMany
    {
        return $this->hasMany(User::class);
    }
}