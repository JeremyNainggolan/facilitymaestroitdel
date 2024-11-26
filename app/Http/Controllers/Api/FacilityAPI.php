<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FacilityResource;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacilityAPI extends Controller
{
    public function index()
    {
        $facility = Facility::all();

        if ($facility->count() == 0) {
            return new FacilityResource(201, 'Facility Data Not Found', []);
        }

        return new FacilityResource(210, 'Facility Data', $facility);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'detail' => 'required',
            'filename' => 'required|image',
        ]);

        if ($validator->fails()) {
            return new FacilityResource(201, $validator->errors(), []);
        }

        $img_name = null;
        if ($request->hasFile('filename')) {
            $img_name = time() . '.' . $request->filename->getClientOriginalExtension();
            $request->filename->move(public_path('facility'), $img_name);
        }

        $facility = Facility::create([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'filename' => $img_name,
        ]);

        if ($facility) {
            return new FacilityResource(210, 'Facility Data Added Successfully', $facility);
        } else {
            return new FacilityResource(201, 'Unsuccessfully Adding Data', []);
        }
    }

    public function show($id)
    {
        $facility = Facility::find($id);

        if ($facility) {
            return new FacilityResource(210, 'Facility Detail', $facility);
        }

        return new FacilityResource(201, 'Facility Data Not Found', []);
    }

    public function update(Request $request, $id)
    {
        $facility = Facility::find($id);

        if ($facility) {
            if ($request->hasFile('filename')) {
                $img_path = public_path('facility/' . $facility->filename);

                if (file_exists($img_path)) {
                    unlink($img_path);
                }

                $filename = time() . '.' . $request->filename->getClientOriginalExtension();
                $request->filename->move(public_path('facility'), $filename);

                $facility->update([
                    'filename' => $filename,
                    'name' => $request->input('name'),
                    'detail' => $request->input('detail'),
                    'status' => $request->input('status'),
                    'condition' => $request->input('condition'),
                ]);

            } else {
                $facility->update([
                    'name' => $request->input('name'),
                    'detail' => $request->input('detail'),
                    'status' => $request->input('status'),
                    'condition' => $request->input('condition'),
                ]);

            }

            if ($facility) {
                return new FacilityResource(210, 'Facility Data Updated Successfully', $facility);
            } else {
                return new FacilityResource(201, 'Unsuccessfully Updating Data', []);
            }
        }

        return new FacilityResource(201, 'Facility Data Not Found', []);
    }

    public function destroy($id)
    {
        $facility = Facility::find($id);

        if ($facility) {
            $img_path = public_path('facility/' . $facility->filename);
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            $facility->delete();

            return new FacilityResource(210, 'Facility Data Deleted Successfully', []);
        } else {
            return new FacilityResource(201, 'Facility Data Not Found', []);
        }
    }
}
