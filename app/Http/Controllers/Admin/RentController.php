<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ViewRent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    public function index(Request $request)
    {
        $data['page_header'] = 'Rent';
        $data['page_title'] = 'Rents';
        $data['rents'] = ViewRent::where('rent_status', '=', 'pending')->orderBy('req_date', 'ASC')->get()->toArray();

        if ($request->isMethod('post')) {

            $affected = null;
            $update = null;

            $request->validate([
                'rent_id' => 'required',
            ]);

            if ($request->input('status') == 'accepted') {
                $affected = DB::table('rent')->where('rent_id', '=', $request->input('rent_id'))->update([
                    'status' => $request->input('status'),
                    'approve_date' => now(),
                ]);

                if ($affected) {
                    return redirect('admin/rent')->with('success', 'Request Approved');
                } else {
                    return redirect('admin/rent')->with('error', 'Approve Failed');
                }

            } else if ($request->input('status') == 'rejected') {
                $affected = DB::table('rent')->where('rent_id', '=', $request->input('rent_id'))->update([
                    'status' => $request->input('status'),
                    'reject_date' => now(),
                ]);

                if ($request->input('facility_id')) {
                    $update = DB::table('facility')->where('facility_id', '=', $request->input('facility_id'))->update([
                        'status' => 'available',
                    ]);
                } else if ($request->input('item_id')) {
                    $update = DB::table('item')->where('item_id', '=', $request->input('item_id'))->update([
                        'item_status' => 'available',
                    ]);
                }

                if ($affected && $update) {
                    return redirect('admin/rent')->with('success', 'Reject Success');
                } else {
                    return redirect('admin/rent')->with('error', 'Reject Failed');
                }
            }
        }

        return view('admin.rent.index', compact('data'));
    }

    public function active(Request $request)
    {
        $data['page_header'] = 'Rent';
        $data['page_title'] = 'Rents';
        $data['rents'] = ViewRent::where('rent_status', '=', 'accepted')->orderBy('req_date', 'ASC')->get()->toArray();

        if ($request->isMethod('post')) {
            $request->validate([
                'rent_id' => 'required',
            ]);

            if ($request->input('status') == 'returned') {

                $affected = DB::table('rent')->where('rent_id', '=', $request->input('rent_id'))->update([
                    'status' => $request->input('status'),
                    'return_date' => now(),
                ]);

                if ($request->input('facility_id')) {
                    $update = DB::table('facility')->where('facility_id', '=', $request->input('facility_id'))->update([
                        'status' => 'available',
                    ]);
                } else if ($request->input('item_id')) {
                    $update = DB::table('item')->where('item_id', '=', $request->input('item_id'))->update([
                        'item_status' => 'available',
                    ]);
                }

                if ($affected && $update) {
                    return redirect('admin/rent/active')->with('success', 'Return Success');
                } else {
                    return redirect('admin/rent/active')->with('error', 'Return Failed');
                }

            } else if ($request->input('status') == 'reported') {

                $affected = DB::table('rent')->where('rent_id', '=', $request->input('rent_id'))->update([
                    'status' => $request->input('status'),
                    'report_date' => now(),
                ]);

                if ($request->input('facility_id')) {
                    $update = DB::table('facility')->where('facility_id', '=', $request->input('facility_id'))->update([
                        'status' => 'unavailable',
                    ]);
                } else if ($request->input('item_id')) {
                    $update = DB::table('item')->where('item_id', '=', $request->input('item_id'))->update([
                        'item_status' => 'unavailable',
                    ]);
                }

                if ($affected && $update) {
                    return redirect('admin/rent/active')->with('success', 'Report Success');
                } else {
                    return redirect('admin/rent/active')->with('error', 'Report Failed');
                }
            }
        }
        return view('admin.rent.active', compact('data'));
    }

}
