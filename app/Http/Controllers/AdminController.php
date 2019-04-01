<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\MimeType;


class AdminController extends Controller
{


    public function index()
    {
        $products = Catalogue::all();
        return view('admin', ['products' => $products]);
    }

    public function store(Request $key)
    {
        $product = new Catalogue();
        $product->title = $key->get('prodname');
        $product->price = $key->get('prodprice');
        $product->description = $key->get('desc');
        $product->quantity = $key->get('quantity');
        $product->url_image = $key->get('image');
        $product->save();
        return redirect()->back();
    }

    public function store_category(Request $key)
    {
        $category = new Category();
        $category->name = $key->get('category_name');
        $category->view_permission = $key->get('category_permission');
        $category->save();
        return redirect()->back();
    }

    public function delete_id(Request $key)
    {
        Catalogue::where('id', '=', $key->get('id'))->delete();
        return redirect()->back();

    }


    public function update_id(Request $key)
    {
        $product = Catalogue::find($key->get('id'));


        if ($key->get('update_title') != NULL) {
            $product->title = $key->get('update_title');
        }
        if ($key->get('update_price') != NULL) {
            $product->price = $key->get('update_price');
        }
        if ($key->get('update_desc') != NULL) {
            $product->description = $key->get('update_desc');
        }
        if ($key->get('update_quantity') != NULL) {
            $product->quantity = $key->get('update_quantity');
        }
        if ($key->get('update_img') != NULL) {
            $product->url_image = $key->get('update_img');
        }

        $product->save();
        return redirect()->back();
    }

    public function commands()
    {
        $var = count(Cart::all());
        return $var;
    }

    public function big_command()
    {
        $var = count(Cart::all());
        $biguser = 0;

        for ($i = 0; $i < $var; $i++) {
            $cartprice = Cart::pluck('article_price')[$i];
            $cartqty = Cart::pluck('item_quantity')[$i];
            $total = ($cartprice * $cartqty);
            $user = Cart::pluck('user_id')[$i];

            $big = 0;

            if ( $i == 0 ){
                $big = $total;
                $biguser = $user;
            } else if ( $total > $big ){
                $big = $total;
                $biguser = $user;

            }

        }

        $biguser = User::where('id', '=', $biguser)->value('name');
        $tostring = ($big . "$ by " .$biguser);

        return $tostring;

    }

    public function show_users()
    {
        $var = count(User::all());
        return $var;
    }

}
