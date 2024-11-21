<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'History - Item';
        return view('history', compact('data'));
    }

    public function facility()
    {
        $data['page_title'] = 'History - Facility';
        return view('facility', compact('data'));
    }
}
