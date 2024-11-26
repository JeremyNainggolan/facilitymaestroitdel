<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemAPI extends Controller
{
    public function index()
    {
        $item = Item::all();

        if ($item->count() == 0) {
            return new ItemResource(201, 'Item Data Not Found', null);
        }

        return new ItemResource(210, 'Item Data', $item);
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
            return new ItemResource(201, $validator->errors(), []);
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
            return new ItemResource(210, 'Item Data Added Successfully', $item);
        } else {
            return new ItemResource(201, 'Unsuccessfully Adding Data', []);
        }
    }

    public function show($id)
    {
        $item = Item::find($id);

        if ($item) {
            return new ItemResource(210, 'Item Detail', $item);
        }

        return new ItemResource(201, 'Item Data Not Found', []);
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
                return new ItemResource(210, 'Item Data Updated Successfully', $item);
            } else {
                return new ItemResource(201, 'Unsuccessfully Updating Data', []);
            }
        }

        return new ItemResource(201, 'Facility Data Not Found', []);
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

            return new ItemResource(210, 'Item Data Deleted Successfully', []);
        } else {
            return new ItemResource(201, 'Item Data Not Found', []);
        }
    }
}
