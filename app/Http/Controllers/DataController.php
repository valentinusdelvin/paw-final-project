<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Iuran;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // --- Pendataan Warga ---
     public function indexWarga()
    {
        $warga = Warga::all();

        return view('warga.index', compact('warga'));
    }

    public function createWarga()
    {
        // Menampilkan form tambah warga
        return view('warga.create');
    }

    public function storeWarga(Request $request)
    {
        // Validasi data input
        $request->validate([
            'NIK' => 'required|string|size:16|unique:warga,NIK',
            'Nama' => 'required|string|max:100',
            'Tanggal_Lahir' => 'nullable|date',
            'Alamat' => 'required|string',
            'RT' => 'required|string|max:5',
        ]);

        // Menyimpan data ke database
        Warga::create($request->all());

        return redirect('/warga/tambah')->with('success', 'Data Warga berhasil ditambahkan!');
    }
}
