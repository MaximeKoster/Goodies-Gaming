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
}