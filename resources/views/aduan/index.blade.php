@extends('layouts.app')

@section('title', 'Daftar Aduan Warga')

@section('content')
<h1 class="page-title">Aduan Warga RT</h1>
<p class="page-subtitle">Kelola dan Pantau Aduan dari Warga</p>

@if(session('success'))
<div class="alert alert-success">
    ✅ {{ session('success') }}
</div>
@endif

<div class="card">
    <div class="section-header">
        <h2>Daftar Semua Aduan</h2>
        <a href="{{ route('aduan.create') }}" class="btn btn-primary">+ Buat Aduan Baru</a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Warga</th>
                    <th>Judul Aduan</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aduans as $aduan)
                <tr>
                    <td><strong>{{ $loop->iteration }}</strong></td>
                    <td>{{ $aduan->warga?->Nama ?? 'Data warga tidak ditemukan' }}</td>
                    <td>{{ $aduan->judul }}</td>
                    <td>{{ ucfirst($aduan->kategori) }}</td>
                    <td>
                        @if($aduan->status == 'pending')
                            <span class="badge badge-pending">⏳ Pending</span>
                        @elseif($aduan->status == 'diproses')
                            <span class="badge badge-diproses">🔄 Diproses</span>
                        @else
                            <span class="badge badge-selesai">✅ Selesai</span>
                        @endif
                    </td>
                    <td>{{ $aduan->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('aduan.show', $aduan) }}" class="btn btn-primary">Detail</a>
                            <a href="{{ route('aduan.edit', $aduan) }}" class="btn btn-secondary" style="margin-left: 0;">Edit</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 50px; color: #999;">
                        <div style="font-size: 48px; margin-bottom: 15px;">📭</div>
                        <p style="font-size: 16px;">Belum ada aduan yang masuk</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection