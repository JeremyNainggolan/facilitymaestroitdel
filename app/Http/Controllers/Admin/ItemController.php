<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
           'item_img' => 'required',
        ]);

        $item['item_name'] = $request->item_name;
        $item['location'] = $request->location;
        $item['description'] = $request->description;
        $item['condition'] = $request->condition;
        $item['status'] = $request->status;
        $item['item_img'] = $request->item_img;

        $item = DB::table('items')->insert($item);

        if (!$item) {
            return redirect(url('/admin/item'))->with('error', 'Item Not Added');
        }

        return redirect(url('/admin/item'))->with('success', 'Item Added');
    }

}
