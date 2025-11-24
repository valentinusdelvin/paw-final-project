<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Models\Warga;

class SuratController extends Controller
{
    // Menampilkan semua surat
    public function index()
    {
        $surat = Surat::all(); // Ambil semua data dari tabel surats
        return view('surat.index', compact('surat')); // Kirim ke index.blade.php
    }

    // Menyimpan surat baru ke database
    public function store(Request $request)
    {
        // Validasi input dari user
        $request->validate([
            'NIK' => 'required|size:16|exists:warga,NIK',
            'Nama_Lengkap' => 'required|string|max:100',
            'Jenis_Surat' => 'required',
            'Keterangan' => 'nullable|string',
        ], [
            'NIK.required' => 'NIK wajib diisi.',
            'NIK.size' => 'NIK harus terdiri dari 16 digit.',
            'NIK.exists' => 'NIK tidak ditemukan dalam data warga.',
            'Jenis_Surat.required' => 'Silakan pilih jenis surat yang ingin diajukan.',
        ]);
        
        // Ambil data warga berdasarkan NIK
        $warga = Warga::where('NIK', $request->NIK)->first();

        // Cek apakah Nama_Lengkap sesuai dengan NIK
        if ($warga->Nama !== $request->Nama_Lengkap) {
            return back()->with('error', 'Nama tidak sesuai dengan NIK yang terdaftar.')->withInput();
        }

        // Simpan data surat ke database
        Surat::create([
            'NIK' => $request->NIK,
            'Nama_Lengkap' => $request->Nama_Lengkap,
            'Jenis_Surat' => $request->Jenis_Surat,
            'Keterangan' => $request->Keterangan,
            'Tanggal_Pengajuan' => now(),
        ]);

        // Redirect ke halaman index surat dengan pesan sukses
        return redirect()->route('surat.index')->with('success', 'Pengajuan surat berhasil direkam!');
    }
}
