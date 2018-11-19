<?php

namespace App\Http\Controllers;

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
        $display = DB::select('select * from catalogue');
        return view('catalogue', ['display' => $display]);
    }
}