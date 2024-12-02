<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Cart | ' . Auth::user()->name;
        $data['items'] = Cart::instance('cart')->content();
//        echo '<pre>';
//        print_r($data['items']);
//        echo '<pre>';
//        exit();
        return view('cart', compact('data'));
    }

    public function add(Request $request)
    {
        $affected = Cart::instance('cart')->add($request->id, $request->item_name, 1, 10, ['filename' => $request->item_img])->associate('App\Models\Item');

        if ($affected) {
            return redirect()->back()->with('success', 'Item added to cart successfully!');

        }

        return redirect()->back()->with('error', 'Item could not be added to your cart!');
    }

    public function remove(Request $request)
    {
        $affected = Cart::instance('cart')->remove($request->rowId);

        if (!$affected) {
            return redirect()->back()->with('success', 'Item removed from cart successfully!');
        }

        return redirect()->back()->with('error', 'Item could not be removed!');
    }

    public function destroy(Request $request)
    {
        $affected = Cart::instance('cart')->destroy();

        if (!$affected) {
            return redirect()->back()->with('success', 'Item removed from cart successfully!');
        }

        return redirect()->back()->with('error', 'Item could not be removed!');
    }
}
