<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';
    protected $primaryKey = 'item_id';
    protected $fillable = [
        'item_name',
        'location',
        'description',
        'item_status',
        'condition',
        'filename',
    ];

    // Relasi many-to-one dengan Storage
    public function storage()
    {
        return $this->belongsTo(Storage::class, 'storage_id', 'id');
    }

    // Relasi one-to-many dengan Rent
    public function rents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rent::class, 'item_id');
    }
}
