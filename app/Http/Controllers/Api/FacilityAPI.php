<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FacilityResource;
use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityAPI extends Controller
{
    public function index()
    {
        $facility = Facility::all();

        if ($facility->count() == 0) {
            return new FacilityResource(201, 'Facility Data Not Found', null);
        }

        return new FacilityResource(210, 'Facility Data', $facility);
    }
}
