@extends('layouts.app')

@section('title', 'Buat Pengumuman')

@section('content')
<h1 class="page-title">Pengumuman RT PEMWEB D</h1>
<p class="page-subtitle">Formulir Pembuatan Pengumuman</p>

<div class="card">
    @if($errors->any())
    <div class="alert alert-error">
        <strong>⚠️ Terdapat kesalahan:</strong>
        <ul style="margin: 10px 0 0 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('pengumuman.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="judul">Judul Pengumuman <span style="color: #dc3545;">*</span></label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Contoh: Gotong Royong Minggu Depan" required value="{{ old('judul') }}">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px;">
            <div class="form-group" style="margin-bottom: 0;">
                <label for="prioritas">Tingkat Prioritas <span style="color: #dc3545;">*</span></label>
                <select name="prioritas" id="prioritas" class="form-control" required>
                    <option value="rendah" {{ old('prioritas') == 'rendah' ? 'selected' : '' }}>🟢 Rendah (Biasa)</option>
                    <option value="sedang" {{ old('prioritas', 'sedang') == 'sedang' ? 'selected' : '' }}>🟡 Sedang</option>
                    <option value="tinggi" {{ old('prioritas') == 'tinggi' ? 'selected' : '' }}>🔴 Tinggi (Penting)</option>
                </select>
            </div>

            <div class="form-group" style="margin-bottom: 0;">
                <label for="tanggal_pengumuman">Tanggal Pengumuman <span style="color: #dc3545;">*</span></label>
                <input type="date" name="tanggal_pengumuman" id="tanggal_pengumuman" class="form-control" value="{{ old('tanggal_pengumuman', date('Y-m-d')) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="isi_pengumuman">Isi Pengumuman <span style="color: #dc3545;">*</span></label>
            <textarea name="isi_pengumuman" id="isi_pengumuman" class="form-control" rows="8" placeholder="Tulis detail pengumuman di sini...&#10;&#10;Contoh:&#10;Kepada seluruh warga RT 02, kami mengundang Bapak/Ibu untuk mengikuti kegiatan gotong royong pada:&#10;Hari/Tanggal: Minggu, 1 Desember 2024&#10;Waktu: 07.00 - 10.00 WIB&#10;Tempat: Balai RT 02&#10;&#10;Mohon kehadiran dan partisipasinya. Terima kasih." required>{{ old('isi_pengumuman') }}</textarea>
            <small style="color: #5ba6a0; font-size: 12px;">Berikan informasi yang jelas dan lengkap untuk seluruh warga</small>
        </div>

        <div class="action-buttons" style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary" style="min-width: 220px;">📢 Publikasikan Pengumuman</button>
            <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary" style="margin-left: 0;">← Batal</a>
        </div>
    </form>
</div>
@endsection