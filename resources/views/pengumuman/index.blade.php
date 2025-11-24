@extends('layouts.app')

@section('title', 'Pengumuman Warga')

@section('content')
<h1 class="page-title">Pengumuman Warga RT</h1>
<p class="page-subtitle">Informasi Terbaru untuk Seluruh Warga</p>

@if(session('success'))
<div class="alert alert-success">
    ✅ {{ session('success') }}
</div>
@endif

<div style="text-align: center; margin-bottom: 40px;">
    <a href="{{ route('pengumuman.create') }}" class="btn btn-primary" style="font-size: 16px; padding: 16px 40px;">+ Buat Pengumuman Baru</a>
</div>

@forelse($pengumumans as $pengumuman)
<div class="pengumuman-card">
    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 12px;">
        <h3>{{ $pengumuman->judul }}</h3>
        @if($pengumuman->prioritas == 'tinggi')
            <span class="badge badge-tinggi">⚠️ PENTING</span>
        @elseif($pengumuman->prioritas == 'sedang')
            <span class="badge badge-sedang">SEDANG</span>
        @else
            <span class="badge badge-rendah">BIASA</span>
        @endif
    </div>
    
    <div class="pengumuman-meta">
        📅 {{ $pengumuman->tanggal_pengumuman->format('d F Y') }} • 
        🕒 {{ $pengumuman->created_at->format('H:i') }} WIB
    </div>
    
    <p style="color: #666; line-height: 1.8; margin-bottom: 20px; font-size: 15px;">
        {{ Str::limit($pengumuman->isi_pengumuman, 180) }}
    </p>
    
    <div class="action-buttons">
        <a href="{{ route('pengumuman.show', $pengumuman) }}" class="btn btn-primary">Baca Selengkapnya →</a>
        <a href="{{ route('pengumuman.edit', $pengumuman) }}" class="btn btn-secondary" style="margin-left: 0;">Edit</a>
    </div>
</div>
@empty
<div class="card" style="text-align: center; padding: 80px;">
    <div style="font-size: 64px; margin-bottom: 20px;">📢</div>
    <p style="color: #999; font-size: 18px;">Belum ada pengumuman</p>
</div>
@endforelse
@endsection