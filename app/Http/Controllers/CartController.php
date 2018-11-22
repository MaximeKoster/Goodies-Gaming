<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function create_cart(Request $key)
    {
        $cart = new Cart();
        $cart->article_id = $key->get('product_id');
        $cart->user_id = $key->get('user_id');
        $cart->item_quantity = 1;
        $cart->save();
        return redirect()->back();
    }

    public function display_cart()
    {
        $display_cart = DB::select('select * from cart')->where('user_id', '=', Auth::user()->id);
        return view('cart', ['display_cart' => $display_cart]);
    }
}
