<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use App\Models\Category;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $products = DB::select('select * from catalogue');
        return view('admin', ['products' => $products]);
    }

    public function store(Request $key)
    {
        $product = new Catalogue();
        $product->title = $key->get('prodname');
        $product->price = $key->get('prodprice');
        $product->description = $key->get('desc');
        $product->quantity = $key->get('quantity');
        $product->url_image = $key->get('prodimage');
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
        catalogue::select('select * from catalogue')->where('id', '=', $key->get('id'))->delete();
        return redirect()->back();

    }

    public function update_id(Request $key)
    {

        $product = Catalogue::find($key->get('id'));

        $product->title = $key->get('update_title');
        $product->price = $key->get('update_price');
        $product->description = $key->get('update_desc');
        $product->quantity = $key->get('update_quantity');
        $product->url_image = $key->get('update_img');

        $product->save();
        return redirect()->back();
    }
}
