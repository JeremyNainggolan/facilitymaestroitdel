<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
    ];

    // Relasi one-to-many dengan Item
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
