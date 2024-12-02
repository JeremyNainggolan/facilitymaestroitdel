<?php

namespace App\Http\Controllers\Api\Hateoas;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hateoas\ItemHateoasResource;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemHateoas extends Controller
{
    public function index()
    {
        $items = Item::all();

        if ($items->count() == 0) {
            return new ItemHateoasResource(201, 'Item Data Not Found', null, $this->getHATEOASLinks());
        }

        return new ItemHateoasResource(210, 'Item Data', $items, $this->getHATEOASLinks());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'item_status' => 'required',
            'condition' => 'required',
            'filename' => 'required|image',
        ]);

        if ($validator->fails()) {
            return new ItemHateoasResource(201, $validator->errors(), [], $this->getHATEOASLinks());
        }

        $img_name = null;
        if ($request->hasFile('filename')) {
            $img_name = time() . '.' . $request->filename->getClientOriginalExtension();
            $request->filename->move(public_path('item'), $img_name);
        }

        $item = Item::create([
            'item_name' => $request->input('item_name'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
            'item_status' => $request->input('item_status'),
            'condition' => $request->input('condition'),
            'filename' => $img_name,
        ]);

        if ($item) {
            return new ItemHateoasResource(210, 'Item Data Added Successfully', $item, $this->getHATEOASLinks());
        } else {
            return new ItemHateoasResource(201, 'Unsuccessfully Adding Data', [], $this->getHATEOASLinks());
        }
    }

    public function show($id)
    {
        $item = Item::find($id);

        if ($item) {
            return new ItemHateoasResource(210, 'Item Detail', $item, $this->getHATEOASLinks($id));
        }

        return new ItemHateoasResource(201, 'Item Data Not Found', [], $this->getHATEOASLinks());
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        if ($item) {
            if ($request->hasFile('filename')) {
                $img_path = public_path('item/' . $item->filename);

                if (file_exists($img_path)) {
                    unlink($img_path);
                }

                $filename = time() . '.' . $request->filename->getClientOriginalExtension();
                $request->filename->move(public_path('item'), $filename);

                $item->update([
                    'filename' => $filename,
                    'item_name' => $request->input('item_name'),
                    'location' => $request->input('location'),
                    'description' => $request->input('description'),
                    'item_status' => $request->input('item_status'),
                    'condition' => $request->input('condition'),
                ]);

            } else {
                $item->update([
                    'item_name' => $request->input('item_name'),
                    'location' => $request->input('location'),
                    'description' => $request->input('description'),
                    'item_status' => $request->input('item_status'),
                    'condition' => $request->input('condition'),
                ]);
            }

            if ($item) {
                return new ItemHateoasResource(210, 'Item Data Updated Successfully', $item, $this->getHATEOASLinks($id));
            } else {
                return new ItemHateoasResource(201, 'Unsuccessfully Updating Data', [], $this->getHATEOASLinks());
            }
        }

        return new ItemHateoasResource(201, 'Item Data Not Found', [], $this->getHATEOASLinks());
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if ($item) {
            $img_path = public_path('item/' . $item->filename);
            if (file_exists($img_path)) {
                unlink($img_path);
            }
            $item->delete();

            return new ItemHateoasResource(210, 'Item Data Deleted Successfully', [], $this->getHATEOASLinks());
        } else {
            return new ItemHateoasResource(201, 'Item Data Not Found', [], $this->getHATEOASLinks());
        }
    }

    // Helper function to generate HATEOAS links
    private function getHATEOASLinks($id = null)
    {
        $links = [
            'self' => url('api/items'),
            'create' => url('api/items/create'),
            'index' => url('api/items'),
            'update' => url('api/items/{id}/update'),
            'destroy' => url('api/items/{id}/destroy'),
        ];

        if ($id) {
            // Replace {id} with actual item ID in links
            $links['self'] = url("api/items/{$id}");
            $links['update'] = url("api/items/{$id}/update");
            $links['destroy'] = url("api/items/{$id}/destroy");
        }

        return $links;
    }
}
