<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'phonenumber',
        'filename',
        'name',
        'password',
        'type',
    ];

    // Relasi one-to-many dengan Rent
    public function rents(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Rent::class, 'user_id');
    }

    // Relasi one-to-many dengan Report
    public function reports()
    {
        return $this->hasMany(Report::class, 'report_user');
    }
}
