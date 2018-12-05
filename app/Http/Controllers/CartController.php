<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;


class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }//

    public function create_cart(Request $key)
    {
        $cart = new Cart();

        $cart->user_id = $key->get('user_id');
        $cart->article_title = $key->get('product_id');
        $cart->article_price = $key->get('price');
        $cart->item_quantity = 1;
        $cart->save();

        if ($key->get('pagenameid') == 1) {
            return redirect()->route('cart');
        } else {
            return redirect()->back();
        }
    }

    public function display_cart()
    {
        $display_cart = DB::table('cart')->where('user_id', Auth::user()->id)->get();
        return view('cart',['display_cart' => $display_cart]);
    }

    public function update_quantity(Request $key)
    {
        $product = Cart::find($key->get('id'));

        if ($key->get('qty') != NULL) {
            $product->item_quantity = $key->get('qty');
        }

        $product->save();
        return redirect()->back();
    }

    public function delete_cart(Request $key)
    {
        cart::select('select * from cart')->where('id', '=', $key->get('id'))->delete();
        return redirect()->back();

    }
}

