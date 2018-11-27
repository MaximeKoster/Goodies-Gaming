<?php

namespace App\Http\Controllers;

use App\Models\Catalogue;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    public function index()
    {
        return view('produit');
    }

    public function display($id)
    {
        $display = Catalogue::where('id', $id)->get();
        return view('produit', ['display' => $display]);
    }
}