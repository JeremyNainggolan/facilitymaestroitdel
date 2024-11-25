<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

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
}
