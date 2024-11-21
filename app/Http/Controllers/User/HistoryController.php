<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ViewRentHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'History - Item';
        $data['history'] = ViewRentHistory::where([['user_id', '=', Auth::user()->id], ['item_id', '<>', null]])->orderBy('req_date', 'ASC')->get()->toArray();
        return view('history', compact('data'));
    }

    public function facility()
    {
        $data['page_title'] = 'History - Facility';
        $data['history'] = ViewRentHistory::where([['user_id', '=', Auth::user()->id], ['facility_id', '<>', null]])->orderBy('req_date', 'ASC')->get()->toArray();

//        echo '<pre>';
//        print_r($data);
//        echo '<pre>';
//        exit();
        return view('facility', compact('data'));
    }
}
