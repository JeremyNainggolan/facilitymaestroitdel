<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
           'item_img' => '',
        ]);

        $img_name = null;
        if ($request->hasFile('item_img')) {
            $img_name = time() . '.' . $request->item_img->getClientOriginalExtension();
            $request->item_img->move(public_path('item'), $img_name);
        }

        $data['item_name'] = $request->item_name;
        $data['location'] = $request->location;
        $data['description'] = $request->description;
        $data['condition'] = $request->condition;
        $data['item_status'] = $request->status == 0 ? 'active' : 'inactive';
        $data['filename'] = $img_name;

        $item = DB::table('items')->insert($data);

        if (!$item) {
            return redirect(url('/admin/item/add'))->with('error', 'Item Not Added');
        }

        return redirect(url('/admin/item'))->with('success', 'Item Successfully Added');

    }

}
