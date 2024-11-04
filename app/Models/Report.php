<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'report';
    protected $fillable = [
        'reason',
        'location',
        'filename',
        'rent_id',
        'report_user',
        'report_date',
    ];

    // Relasi many-to-one dengan Rent
    public function rent()
    {
        return $this->belongsTo(Rent::class, 'rent_id');
    }
}
