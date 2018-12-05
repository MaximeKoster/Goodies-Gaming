<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogueController extends Controller
{
    public function index()
    {
        return view('catalogue');
    }//

    public function display()
    {
        $display = Catalogue::all();
        return view('catalogue', ['display' => $display]);
    }

    public function display_cart()
    {
        $display_cart = Catalogue::all();
        return view('cart', ['display_cart' => $display_cart]);
    }

    public function display_catalogue(Request $id)
    {
        $title = Catalogue::where('id', $id->get('requestid'))->value('title');
        return view('cart', ['title' => $title]);
    }
}