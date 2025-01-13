<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function showCatalog()
{
    $products = Product::all();
    return view('katalog', compact('products'));
}

}
