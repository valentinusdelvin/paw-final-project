<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\DataController;
use App\Models\Warga;
use App\Models\Iuran;

class IuranController extends Controller
{
    public function indexIuran()
    {
        $iuranList = Iuran::with('warga')->orderBy('created_at', 'desc')->get();

        return view('iuran.index', compact('iuranList'));
    }

    public function createIuran()
    {
        $wargaList = Warga::pluck('Nama', 'NIK');
        return view('iuran.create', compact('wargaList'));
    }

    public function storeIuran(Request $request)
    {
        $request->validate([
            'NIK' => 'required|string|size:16|exists:warga,NIK',
            'Periode' => 'required|date',
            'Nominal' => 'required|integer|min:1000',
            'Bukti_Iuran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('Bukti_Iuran')) {
            $filePath = $request->file('Bukti_Iuran')->store('public/bukti_iuran');
            $filePath = str_replace('public/', '', $filePath);
        }

        $data = $request->except(['_token', 'Bukti_Iuran']);
        $data['Bukti_Iuran'] = $filePath;
        $data['Status_Bayar'] = 'Lunas';
        $data['Tanggal_Bayar'] = now();

        Iuran::create($data);

        return redirect('/iuran')->with('success', 'Data Iuran berhasil ditambahkan!');
    }
}
