<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    // Tampilkan semua pengumuman
    public function index()
    {
        $pengumumans = Pengumuman::latest('tanggal_pengumuman')
            ->get();
        return view('pengumuman.index', compact('pengumumans'));
    }

    // Form tambah pengumuman
    public function create()
    {
        return view('pengumuman.create');
    }

    // Simpan pengumuman baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
            'prioritas' => 'required|in:rendah,sedang,tinggi',
            'tanggal_pengumuman' => 'required|date'
        ]);

        Pengumuman::create($request->all());

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dibuat!');
    }

    // Detail pengumuman
    public function show(Pengumuman $pengumuman)
    {
        return view('pengumuman.show', compact('pengumuman'));
    }

    // Form edit pengumuman
    public function edit(Pengumuman $pengumuman)
    {
        return view('pengumuman.edit', compact('pengumuman'));
    }

    // Update pengumuman
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
            'prioritas' => 'required|in:rendah,sedang,tinggi',
            'tanggal_pengumuman' => 'required|date',
            // 'is_active' => 'boolean'
        ]);

        $pengumuman->update($request->all());

        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil diupdate!');
    }

    // Hapus pengumuman
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return redirect()->route('pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus!');
    }
}