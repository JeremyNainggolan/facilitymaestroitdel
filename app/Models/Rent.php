<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $table = 'rent';

    protected $fillable = [
        'item_id',
        'description',
        'facility_id',
        'user_id',
        'status',
        'request_date',
        'approve_date',
        'reject_date',
        'return_date',
        'report_date',
        'rent_date',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class, 'rent_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    // Relasi many-to-one dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi many-to-one dengan Facility
    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }
}
