<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function create_cart(Request $key)
    {
        $cart = new Cart();
        $cart->item_quantity = $key->get('itemquanity');
        $cart->price = $key->get('prodprice');
        $cart->description = $key->get('desc');
        $cart->quantity = $key->get('quantity');
        $cart->url_image = $key->get('prodimage');
        $cart->save();
        return redirect()->back();
    }
}
