<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "items";

    protected $fillable = [
        'item_name',
        'location',
        'description',
        'condition',
        'status',
        'item_img',
    ];
}