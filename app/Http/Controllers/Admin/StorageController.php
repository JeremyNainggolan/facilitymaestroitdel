<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StorageController extends Controller
{
    public function index()
    {
        $data['page_header'] = 'Storage';
        $data['page_title'] = 'Storages';
        $data['storages'] = Storage::all()->toArray();
        return view('admin.storage.index', compact('data'));
    }

    public function add()
    {
        $data['page_header'] = 'Storage';
        $data['page_title'] = 'Add Storage';
        return view('admin.storage.add', compact('data'));
    }

    public function store(Request $request)
    {
        $img_name = null;
        if ($request->hasFile('storage_img')) {
            $img_name = time() . '.' . $request->storage_img->getClientOriginalExtension();
            $request->storage_img->move(public_path('storage'), $img_name);
        }

        $data['name'] = $request->name;
        $data['detail'] = $request->description;
        $data['capacity'] = $request->capacity;
        $data['filename'] = $img_name;

        $storage = DB::table('storage')->insert($data);

        if (!$storage) {
            return redirect(url('/admin/storage/add'))->with('error', 'Storage Not Added');
        }

        return redirect(url('/admin/storage'))->with('success', 'Storage Successfully Added');

    }

    public function delete(Request $request)
    {
        $storage = Storage::where('id', $request->input('id'))->first();

        if ($storage) {
            $imagePath = public_path('storage/') . $storage->filename;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $storage->delete();

            return redirect()->back()->with('success', 'Storage deleted successfully');
        }

        return redirect()->back()->with('error', 'Storage failed to delete');
    }
}
