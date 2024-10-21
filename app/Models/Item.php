<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'location',
        'description',
        'item_status',
        'condition',
        'filename',
    ];

    // Relasi many-to-one dengan Area
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    // Relasi one-to-many dengan Rent
    public function rents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rent::class, 'item_id');
    }
}
