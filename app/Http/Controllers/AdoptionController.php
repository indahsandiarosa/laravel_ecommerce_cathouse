<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoption;
use Illuminate\Support\Facades\Auth;


class AdoptionController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'address' => 'required|string|max:255',
            'cod_date' => 'required|date',
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        // Simpan data ke database
        Adoption::create([
            'user_id' => auth()->id(),
            'product_name' => $request->product_name, // Pastikan ada input untuk nama produk
            'price' => $request->price,
            'address' => $request->address,
            'cod_date' => $request->cod_date,
        ]);
        

        return redirect('/katalog')->with('success', 'Adopsi berhasil diproses!');
    }

    public function showReport()
    {
        // Ambil semua data adopsi dari database
        $adoptions = Adoption::all();

        // Kirim data adopsi ke view
        return view('admin.laporan', compact('adoptions'));
    }
}
