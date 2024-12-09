<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RentStatusResources;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentStatus extends Controller
{
    public function show($status) {
        $pending = Rent::where('status', $status)->count();

        return new RentStatusResources('210', 'Success', $pending);
    }
}
