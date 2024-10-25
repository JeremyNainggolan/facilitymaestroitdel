<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    protected $table = 'storage';
    protected $fillable = [
        'name',
        'detail',
        'capacity',
        'filename',
    ];

    // Relasi one-to-many dengan Item
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
