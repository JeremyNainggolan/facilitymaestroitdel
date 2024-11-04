<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index() {
        $data['page_title'] = 'Facilities';
        $data['page_header'] = 'Facility';
        $data['facilities'] = Facility::all()->toArray();

        return view('admin.facility.index', compact('data'));
    }

    public function add()
    {
        $data['page_header'] = 'Facility';
        $data['page_title'] = 'Add Facility';

        return view('admin.facility.add', compact('data'));
    }
}
