<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Items';
        $data['page_header'] = 'Add';
        $data['items'] = Item::all()->toArray();
        return view('admin.item.index', compact('data'));
    }

    public function add()
    {
        $data['page_header'] = 'Item';
        $data['page_title'] = 'Add Item';
        $data['storages'] = DB::table('storage')->whereColumn('usage', '<>', 'capacity')->get()->toArray();
        return view('admin.item.add', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|alpha_spaces',
            'storage_id' => 'required',
            'description' => 'required|alpha_spaces',
            'condition' => 'required',
            'status' => 'required',
        ]);

        $storage = DB::table('storage')->where('id', '=', $request->storage_id)->first();
        $img_name = null;
        if ($request->hasFile('item_img')) {
            $img_name = time() . '.' . $request->item_img->getClientOriginalExtension();
            $request->item_img->move(public_path('item'), $img_name);
        }

        $data['item_name'] = $request->item_name;
        $data['location'] = $storage->name;
        $data['storage_id'] = $storage->id;
        $data['description'] = $request->description;
        $data['condition'] = $request->condition;
        $data['item_status'] = $request->status;
        $data['filename'] = $img_name;

        $item = DB::table('item')->insert($data);
        $update = DB::table('storage')->where('id', '=', $storage->id)->update([
            'usage' => $storage->usage + 1,
        ]);

        if ($item && $update) {
            return redirect(url('/admin/item'))->with('success', 'Item Successfully Added');
        }

        return redirect(url('/admin/item/add'))->with('error', 'Item Not Added');
    }

    public function edit($id)
    {
        $data['page_header'] = 'Item';
        $data['page_title'] = 'Edit Item';
        $data['item'] = DB::table('item')->where('item_id', $id)->first();
        $data['storages'] = DB::table('storage')->whereColumn('usage', '<>', 'capacity')->get()->toArray();
        return view('admin.item.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'item_name' => 'alpha_spaces',
            'description' => 'alpha_spaces',
        ]);

        $item = DB::table('item')->where('item_id', $id)->first();
        $storage = DB::table('storage')->where('id', '=', $request->storage_id)->first();

        $img_name = null;
        if ($item) {
            if ($request->hasFile('item_img')) {
                if ($item->filename) {
                    $imagePath = public_path('item/') . $item->filename;

                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
                $img_name = time() . '.' . $request->item_img->getClientOriginalExtension();
                $request->item_img->move(public_path('item'), $img_name);

                DB::table('item')->where('item_id', '=', $item->item_id)->update(['filename' => $img_name]);
            }

            if ($item->location != $storage->name) {
                $temp_storage = DB::table('storage')->where('id', '=', $item->storage_id)->first();

                if ($temp_storage) {
                    DB::table('storage')->where('id', '=', $item->storage_id)->update(['usage' => $temp_storage->usage - 1]);
                }

                DB::table('item')->where('item_id', '=', $item->item_id)->update([
                    'location' => $storage->name,
                    'storage_id' => $storage->id,
                ]);

                DB::table('storage')->where('id', '=', $storage->id)->update(['usage' => $storage->usage + 1]);
            }

            DB::table('item')->where('item_id', '=', $item->item_id)->update([
                'item_name' => $request->input('item_name'),
                'description' => $request->input('description'),
                'item_status' => $request->input('status'),
                'condition' => $request->input('condition'),
            ]);

            return redirect(url('/admin/item'))->with('success', 'Item Successfully Updated');
        }

        return redirect(url('/admin/item/edit/' . $id))->with('error', 'Item Not Updated');
    }

    public function delete(Request $request)
    {
        $item = Item::where('item_id', $request->input('item_id'))->first();

        if ($item) {
            if ($item->filename) {
                $imagePath = public_path('item/') . $item->filename;

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $storage = DB::table('storage')->where('id', '=', $item->storage_id)->first();

            $update = DB::table('storage')->where('id', '=', $item->storage_id)->update([
                'usage' => $storage->usage - 1,
            ]);

            if ($update) {
                $item->delete();
            }

            return redirect()->back()->with('success', 'Item deleted successfully');
        }

        return redirect()->back()->with('error', 'Item failed to delete');
    }
}
