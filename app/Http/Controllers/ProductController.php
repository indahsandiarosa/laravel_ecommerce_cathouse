<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showDashboard()
{
    $products = Product::all();
    return view('admin.dashboard', compact('products'));
}

public function edit($id)
{
    $product = Product::find($id);
    return view('admin.edit', compact('product'));
}

public function update(Request $request, $id)
{
    // Validasi harga yang diterima
    $request->validate([
        'price' => 'required|numeric|min:0',
    ]);

    // Cari produk berdasarkan ID dan update harga
    $product = Product::findOrFail($id);
    $product->price = $request->price;
    $product->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('admin.kelola-harga')->with('success', 'Harga produk berhasil diperbarui!');
}

public function index()
    {
        // Ambil semua produk dari database
        $products = Product::all();
        
        // Kirim data produk ke view
        return view('admin.kelola-harga', compact('products'));
    }
    public function showCatalog()
    {
        // Ambil semua produk dari database
        $products = Product::all();

        // Definisikan title untuk halaman
        $title = 'Daftar Produk'; // atau bisa diganti sesuai kebutuhan

        // Pass data produk dan title ke view
        return view('katalog', compact('products', 'title'));
    }
    
}
