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
        $data['page_header'] = 'Item';
        $data['page_title'] = 'Items';
        $data['items'] = Item::all()->toArray();
        return view('admin.item.index', compact('data'));
    }

    public function add()
    {
        $data['page_header'] = 'Item';
        $data['page_title'] = 'Add Item';
        return view('admin.item.add', compact('data'));
    }

    public function store(Request $request)
    {
        $img_name = null;
        if ($request->hasFile('item_img')) {
            $img_name = time() . '.' . $request->item_img->getClientOriginalExtension();
            $request->item_img->move(public_path('item'), $img_name);
        }

        $data['item_name'] = $request->item_name;
        $data['location'] = $request->location;
        $data['description'] = $request->description;
        $data['condition'] = $request->condition == 0 ? 'broken' : ($request->condition == 1 ? 'good' : 'lost');
        $data['item_status'] = $request->status == 0 ? 'available' : 'unavailable';
        $data['filename'] = $img_name;

        $item = DB::table('item')->insert($data);

        if (!$item) {
            return redirect(url('/admin/item/add'))->with('error', 'Item Not Added');
        }

        return redirect(url('/admin/item'))->with('success', 'Item Successfully Added');

    }

    public function edit($id)
    {
        $data['page_header'] = 'Item';
        $data['page_title'] = 'Edit Item';
        $data['item'] = DB::table('item')->where('item_id', $id)->first();
        return view('admin.item.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $item = DB::table('item')->where('item_id', $id)->first();

        $img_name = null;
        if ($request->hasFile('item_img')) {
            $img_name = time() . '.' . $request->item_img->getClientOriginalExtension();
            $request->item_img->move(public_path('item'), $img_name);

            $affected = DB::table('item')
                ->where('item_id', $id)
                ->update([
                    'item_name' => $request->input('item_name'),
                    'location' => $request->input('location'),
                    'description' => $request->input('description'),
                    'item_status' => $request->input('status'),
                    'condition' => $request->input('condition'),
                    'filename' => $img_name,
                ]);
        } else {
            $affected = DB::table('item')
                ->where('item_id', $id)
                ->update([
                    'item_name' => $request->input('item_name'),
                    'location' => $request->input('location'),
                    'description' => $request->input('description'),
                    'item_status' => $request->input('status'),
                    'condition' => $request->input('condition')
                ]);
        }

        if (!$affected) {
            return redirect(url('/admin/item/edit/' . $id))->with('error', 'Item Not Updated');
        }

        return redirect(url('/admin/item'))->with('success', 'Item Successfully Updated');
    }

    public function delete(Request $request)
    {
        $item = Item::where('item_id', $request->input('item_id'))->first();

        if ($item) {
            $imagePath = public_path('item/') . $item->filename;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $item->delete();

            return redirect()->back()->with('success', 'Item deleted successfully');
        }

        return redirect()->back()->with('error', 'Item failed to delete');
    }
}
