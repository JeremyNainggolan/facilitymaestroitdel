<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $data['page_title'] = 'Book | Facility Maestro';
        $data['facilities'] = Facility::where('status', '=', 'available')->get()->toArray();

        if ($request->isMethod('post')) {

            $request->validate([
                'facility' => 'required',
                'date_request' => 'required|date',
                'description' => 'required',
            ]);

            $affected = DB::table('rent')->insert([
                'facility_id' => $request->input('facility'),
                'user_id' => Auth::user()->id,
                'request_date' => $request->input('date_request'),

            ]);

            $update = DB::table('facility')->where('facility_id', '=', $request->input('facility'))->update([
                'status' => 'unavailable',
            ]);

            if ($affected && $update) {
                return redirect('history/facility')->with('success', 'Request has been sent!');
            } else {
                return redirect('book')->with('error', 'Request has not been sent!');
            }
        }

        return view('book', compact('data'));
    }
}
