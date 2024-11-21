<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ViewRent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class RentController extends Controller
{
    public function index()
    {
        $data['page_header'] = 'Rent';
        $data['page_title'] = 'Rents';
        $data['rents'] = ViewRent::where('rent_status', '=', 'pending')->orderBy('req_date', 'ASC')->get()->toArray();
        return view('admin.rent.index', compact('data'));
    }

    public function active()
    {
        $data['page_header'] = 'Rent';
        $data['page_title'] = 'Rents';
        $data['rents'] = ViewRent::where('rent_status', '=', 'accepted')->orderBy('req_date', 'ASC')->get()->toArray();
        return view('admin.rent.active', compact('data'));
    }

}
