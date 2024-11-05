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

    public function edit($id)
    {
        $data['page_header'] = 'Storage';
        $data['page_title'] = 'Edit Storage';
        $data['storage'] = DB::table('storage')->where('id', $id)->first();
        return view('admin.storage.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $storage = DB::table('storage')->where('id', $id)->first();

        $img_name = null;
        if ($request->hasFile('storage_img')) {
            if ($storage) {
                $imagePath = public_path('storage/') . $storage->filename;

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $img_name = time() . '.' . $request->storage_img->getClientOriginalExtension();
            $request->storage_img->move(public_path('storage'), $img_name);

            $affected = DB::table('storage')
                ->where('id', $id)
                ->update([
                    'name' => $request->input('name'),
                    'detail' => $request->input('description'),
                    'capacity' => $request->input('capacity'),
                    'filename' => $img_name,
                ]);
        } else {
            $affected = DB::table('storage')
                ->where('id', $id)
                ->update([
                    'name' => $request->input('name'),
                    'detail' => $request->input('description'),
                    'capacity' => $request->input('capacity'),
                ]);
        }

        if (!$affected) {
            return redirect(url('/admin/storage/edit/' . $id))->with('error', 'Storage Not Updated');
        }

        return redirect(url('/admin/storage'))->with('success', 'Storage Successfully Updated');
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

            return redirect()->back()->with('success', 'Storage Successfully Deleted');
        }

        return redirect()->back()->with('error', 'Storage failed to delete');
    }
}
