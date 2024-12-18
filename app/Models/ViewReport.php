<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewReport extends Model
{
    use HasFactory;

    protected $table = 'view_report_history';
    public $incrementing = false;
    public $timestamps = false;
}