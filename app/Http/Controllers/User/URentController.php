<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class URentController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Rent | Facility Maestro';
        $data['items'] = Item::all()->toArray();
        $data['cart_items'] = [];
        return view('rent', compact('data'));
    }
}
