<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Area';
        return view('admin.area.index', compact('data'));
    }
}
