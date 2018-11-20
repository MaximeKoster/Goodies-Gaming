<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $products = DB::select('select * from catalogue');
        return view('admin',['products'=>$products]);
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

    public function delete_id()
    {
        DB::table('catalogue')->where('id','=','$product->id')->delete();
        //Catalogue::table('catalogue')->where('id','=','$product->id')->delete();
        //Catalogue::find($product->id)->delete();
        echo("ok");
    }
}
