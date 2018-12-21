<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Mail\ShopOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;


class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function create_cart(Request $key)
    {
        for ($i = 0; $i < count($key->get('product_id')); $i++) {
                $cart = new Cart();

                $cart->email = $key->get('email');
                $cart->article_title = ($key->get('product_id')[$i]);
                $cart->article_price = ($key->get('product_price')[$i]);
                $cart->item_quantity = ($key->get('qty')[$i]);
                $cart->save();
        }
    }

   /* public function display_cart()
    {
        $display_cart = Cart::where('user_id', Auth::user()->id)->get();
        return view('cart', ['display_cart' => $display_cart]);
    }*/

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

    public function send_mail(Request $key)
    {
        for ($i = 0; $i < count($key->get('product_id')); $i++) {
            $mail = $key->get('email');
            $article_title[$i] = ($key->get('product_id')[$i]);
            $article_price[$i] = ($key->get('product_price')[$i]);
            $item_quantity[$i] = ($key->get('qty')[$i]);
        }
        Mail::to('8a088cb72a-0e528a@inbox.mailtrap.io')->send(new ShopOrder($key));
        return 'isgood';
    }
}

