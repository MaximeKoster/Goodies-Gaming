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

    public function display($id)
    {
        $display = DB::select("SELECT * FROM catalogue WHERE id = $id");
        return view('produit', ['display' => $display]);
    }
}