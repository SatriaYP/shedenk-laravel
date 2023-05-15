<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukdController extends Controller
{
    public function getProduk()
    {
        return view('produk');
    }
}