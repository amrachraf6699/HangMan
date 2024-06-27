<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function getCreatedAtAttribute($value)
    {
        return $this->asDateTime($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value)
    {
        return $this->asDateTime($value)->diffForHumans();
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }
}
