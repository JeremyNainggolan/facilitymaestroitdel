<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function items(): HasMany
    {
        return $this->hasMany(Item::class, 'storage_id', 'id');
    }
}
