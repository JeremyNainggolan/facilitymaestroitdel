<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Home | Facility Maestro';
        return view('home', compact('data'));
    }
}
