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
        'filename',
        'rent_id',
        'report_date',
        'facility_id',
        'item_id',
        'user_id',
    ];

    // Relasi many-to-one dengan Rent
    public function rent()
    {
        return $this->belongsTo(Rent::class, 'rent_id');
    }
}
