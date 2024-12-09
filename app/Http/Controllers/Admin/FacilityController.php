<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacilityController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Facilities';
        $data['page_header'] = 'Facility';
        $data['facilities'] = Facility::all()->toArray();

        return view('admin.facility.index', compact('data'));
    }

    public function add()
    {
        $data['page_header'] = 'Facility';
        $data['page_title'] = 'Add Facility';

        return view('admin.facility.add', compact('data'));
    }

    public function store(Request $request)
    {
//        echo '<pre>';
//        print_r($_POST);
//        echo '<pre>';
//        exit();
        $img_name = null;
        if ($request->hasFile('facility_img')) {
            $img_name = time() . '.' . $request->facility_img->getClientOriginalExtension();
            $request->facility_img->move(public_path('facility'), $img_name);
        }

        $data['name'] = $request->facility_name;
        $data['detail'] = $request->detail;
        $data['condition'] = $request->condition;
        $data['status'] = $request->status;
        $data['filename'] = $img_name;

        $facility = DB::table('facility')->insert($data);

        if (!$facility) {
            return redirect(url('/admin/facility/add'))->with('error', 'Facility Not Added');
        }

        return redirect(url('/admin/facility'))->with('success', 'Facility Successfully Added');

    }

    public function edit($id)
    {
        $data['page_header'] = 'Storage';
        $data['page_title'] = 'Edit Storage';
        $data['facility'] = DB::table('facility')->where('facility_id', $id)->first();
        return view('admin.facility.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $facility = DB::table('facility')->where('facility_id', $id)->first();

        if ($facility) {
            if ($request->hasFile('facility_img')) {
                if (!$facility->name) {
                    $imagePath = public_path('facility/') . $facility->filename;

                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
                $img_name = time() . '.' . $request->facility_img->getClientOriginalExtension();
                $request->facility_img->move(public_path('facility'), $img_name);

                $affected = DB::table('facility')
                    ->where('facility_id', $id)
                    ->update([
                        'name' => $request->input('facility_name'),
                        'detail' => $request->input('detail'),
                        'condition' => $request->input('condition'),
                        'status' => $request->input('status'),
                        'filename' => $img_name,
                    ]);
            } else {
                $affected = DB::table('facility')
                    ->where('facility_id', $id)
                    ->update([
                        'name' => $request->input('facility_name'),
                        'detail' => $request->input('detail'),
                        'condition' => $request->input('condition'),
                        'status' => $request->input('status'),
                    ]);
            }

            if ($affected) {
                return redirect(url('/admin/facility'))->with('success', 'Facility Successfully Updated');
            }
        }

        return redirect(url('/admin/facility/edit/' . $id))->with('error', 'Facility Not Updated');
    }


    public function delete(Request $request)
    {
        $facility = Facility::where('facility_id', $request->input('facility_id'))->first();

        if ($facility) {
            $imagePath = public_path('facility/') . $facility->filename;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $facility->delete();

            return redirect()->back()->with('success', 'Facility Successfully Deleted');
        }

        return redirect()->back()->with('error', 'Facility failed to delete');
    }
}
