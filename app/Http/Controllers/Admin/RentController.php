<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rent;
use App\Models\Report;
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

            $rent = Rent::where('rent_id', '=', $request->input('rent_id'))->first()->toArray();

            $affected = DB::table('rent')->where('rent_id', '=', $request->input('rent_id'))->update([
                'status' => 'returned',
                'return_date' => now(),
            ]);

            if (!empty($rent['facility_id'])) {
                $update = DB::table('facility')->where('facility_id', '=', $rent['facility_id'])->update([
                    'status' => 'available',
                ]);
            } else if (!empty($rent['item_id'])) {
                $update = DB::table('item')->where('item_id', '=', $rent['item_id'])->update([
                    'item_status' => 'available',
                ]);
            }

            echo 'update = ' . $update;
            echo '$affected = ' . $affected;
            exit();

            if ($affected && $update) {
                return redirect('admin/rent/active')->with('success', 'Return Success');
            } else {
                return redirect('admin/rent/active')->with('error', 'Return Failed');
            }


        }
        return view('admin.rent.active', compact('data'));
    }

    public function report(Request $request)
    {
        $rent = Rent::where('rent_id', '=', $request->input('rent_id'))->first()->toArray();

        $affected = DB::table('rent')->where('rent_id', '=', $request->input('rent_id'))->update([
            'status' => 'returned',
            'return_date' => now(),
        ]);

        $img_name = null;

        if ($request->hasFile('report_img')) {
            $img_name = time() . '.' . $request->report_img->getClientOriginalExtension();
            $request->report_img->move(public_path('report'), $img_name);
        }

        $report = Report::create([
            'reason' => $request->input('reason'),
            'filename' => $img_name,
            'report_date' => now(),
            'rent_id' => $request->input('rent_id'),
            'facility_id' => $rent['facility_id'],
            'item_id' => $rent['item_id'],
            'user_id' => $rent['user_id'],
        ]);

        if (!empty($rent['facility_id'])) {
            $update = DB::table('facility')->where('facility_id', '=', $rent['facility_id'])->update([
                'condition' => 'bad',
            ]);
        } else if (!empty($rent['item_id'])) {
            $update = DB::table('item')->where('item_id', '=', $rent['item_id'])->update([
                'condition' => 'broken',
            ]);
        }

        if ($report && $affected && $update) {
            return redirect('admin/rent/active')->with('success', 'Report Success');
        }

        return redirect('admin/rent/active')->with('error', 'Report Failed');
    }

}
