<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'filename',
        'status',
        'condition',
    ];

    // Relasi one-to-many dengan Rent
    public function rents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rent::class, 'facility_id');
    }

}
