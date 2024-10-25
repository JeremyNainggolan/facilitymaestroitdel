<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rent;

class RentController extends Controller
{
    public function index()
    {
        $data['page_header'] = 'Rent';
        $data['page_title'] = 'Rents';
        $data['rent'] = Rent::all();
        return view('admin.rent.index', compact('data'));
    }


}
