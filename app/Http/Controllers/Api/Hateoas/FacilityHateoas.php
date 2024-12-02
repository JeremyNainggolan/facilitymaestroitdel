<?php

namespace App\Http\Controllers\Api\Hateoas;

use App\Http\Controllers\Controller;
use App\Http\Resources\FacilityResource;
use App\Http\Resources\Hateoas\FacilityHateoasResource;
use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityHateoas extends Controller
{
    public function index()
    {
        $facility = Facility::all();

        if ($facility->count() == 0) {
            return new FacilityHateoasResource(201, 'FacilityHateoas Data Not Found', [], $this->getHATEOASLinks());
        }

        return new FacilityHateoasResource(210, 'FacilityHateoas Data', $facility, $this->getHATEOASLinks());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'detail' => 'required',
            'filename' => 'required|image',
        ]);

        if ($validator->fails()) {
            return new FacilityHateoasResource(201, $validator->errors(), [], $this->getHATEOASLinks());
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
            return new FacilityHateoasResource(210, 'FacilityHateoas Data Added Successfully', $facility, $this->getHATEOASLinks());
        } else {
            return new FacilityHateoasResource(201, 'Unsuccessfully Adding Data', [], $this->getHATEOASLinks());
        }
    }

    public function show($id)
    {
        $facility = Facility::find($id);

        if ($facility) {
            return new FacilityHateoasResource(210, 'FacilityHateoas Detail', $facility, $this->getHATEOASLinks($id));
        }

        return new FacilityHateoasResource(201, 'FacilityHateoas Data Not Found', [], $this->getHATEOASLinks());
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
                return new FacilityHateoasResource(210, 'FacilityHateoas Data Updated Successfully', $facility, $this->getHATEOASLinks($id));
            } else {
                return new FacilityHateoasResource(201, 'Unsuccessfully Updating Data', [], $this->getHATEOASLinks());
            }
        }

        return new FacilityHateoasResource(201, 'FacilityHateoas Data Not Found', [], $this->getHATEOASLinks());
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

            return new FacilityHateoasResource(210, 'FacilityHateoas Data Deleted Successfully', [], $this->getHATEOASLinks());
        } else {
            return new FacilityHateoasResource(201, 'FacilityHateoas Data Not Found', [], $this->getHATEOASLinks());
        }
    }

    // Helper function to generate HATEOAS links
    private function getHATEOASLinks($id = null)
    {
        $links = [
            'self' => url('api/facilities'),
            'create' => url('api/facilities/create'),
            'index' => url('api/facilities'),
            'update' => url('api/facilities/{id}/update'),
            'destroy' => url('api/facilities/{id}/destroy'),
        ];

        if ($id) {
            // Replace {id} with actual facility ID in links
            $links['self'] = url("api/facilities/{$id}");
            $links['update'] = url("api/facilities/{$id}/update");
            $links['destroy'] = url("api/facilities/{$id}/destroy");
        }

        return $links;
    }
}
