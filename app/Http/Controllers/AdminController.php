<?php

namespace App\Http\Controllers;

use App\Model\Catalogue;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }//

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
}
