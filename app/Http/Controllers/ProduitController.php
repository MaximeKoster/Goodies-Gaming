<?php

namespace App\Http\Controllers;

use App\Model\Catalogue;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    public function index()
    {
        return view('produit');
    }

    public function display(\App\Models\Catalogue $id)
    {
        $display = \App\Models\Catalogue::find($id)[0];
        return view('catalogue', ['display' => $display]);
    }
}