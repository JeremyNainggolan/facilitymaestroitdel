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
        $data['items'] = DB::table('items')->get();
        return view('admin.item.index', compact('data'));
    }

    public function add()
    {
        $data['page_title'] = 'Add Item';
        return view('admin.item.add', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'location' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'status' => 'required',
        ]);

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

        $item = DB::table('items')->insert($data);

        if (!$item) {
            return redirect(url('/admin/item/add'))->with('error', 'Item Not Added');
        }

        return redirect(url('/admin/item'))->with('success', 'Item Successfully Added');

    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit Item';
        $data['item'] = DB::table('items')->where('item_id', $id)->first();
        return view('admin.item.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $item = DB::table('items')->where('item_id', $id)->first();

        $img_name = null;
        if ($request->hasFile('item_img')) {
            $img_name = time() . '.' . $request->item_img->getClientOriginalExtension();
            $request->item_img->move(public_path('item'), $img_name);

            $affected = DB::table('items')
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
            $affected = DB::table('items')
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

    }

}
