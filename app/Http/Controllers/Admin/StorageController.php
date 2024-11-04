<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Storage;

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
}
