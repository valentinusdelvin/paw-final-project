@extends('layouts.app')

@section('title', 'Data Warga RT')

@section('content')
    <div style="text-align: center; margin-bottom: 40px;">
        <h1 class="page-title">Data Warga RT</h1>
        <p class="page-subtitle">Daftar Warga RT</p>
    </div>

    <div style="display: flex; justify-content: flex-end; margin-bottom: 15px;">
        <a href="/warga/tambah" class="btn btn-primary">
            + Tambah Warga
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>RT</th>
                </tr>
            </thead>
            <tbody>
                {{-- Cek apakah ada data warga --}}
                @forelse ($warga as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->NIK }}</td>
                        <td>{{ $item->Nama }}</td>
                        {{-- Format tanggal agar lebih rapi --}}
                        <td>{{ \Carbon\Carbon::parse($item->Tanggal_Lahir)->format('d-m-Y') }}</td>
                        <td>{{ $item->Alamat }}</td>
                        <td>{{ $item->RT }}</td>
                    </tr>
                @empty
                    {{-- Tampilan jika data kosong (sesuai gambar) --}}
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 50px; color: #888;">
                            Belum ada warga
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection