<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class URentController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Rent | Facility Maestro';
        $data['items'] = Item::where('item_status', '=', 'available')->get()->toArray();
        $data['cart_items'] = [];
        return view('rent', compact('data'));
    }

    public function add(Request $request)
    {
        $list_item = json_decode($request->list_item);

        if ($list_item) {
            $affected = null;
            foreach ($list_item as $row) {
                $affected = DB::table('rent')->insert([
                    'item_id' => $row,
                    'description' => $request->input('reason'),
                    'user_id' => Auth::user()->id,
                    'request_date' => now(),
                    'rent_date' => $request->input('rent_date'),
                ]);

                $update = DB::table('item')->where('item_id', '=', $row)->update([
                    'item_status' => 'unavailable',
                ]);

                if ($affected && $update) {
                    continue;
                } else {
                    break;
                }
            }

            $destroyed = Cart::instance('cart')->destroy();

            if ($affected && !$destroyed) {
                return redirect(url('history'))->with('success', 'Request has been sent!');
            }
        }
        return redirect(url('rent'))->with('error', 'Rent not added!');
    }
}
