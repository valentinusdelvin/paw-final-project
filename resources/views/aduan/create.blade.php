@extends('layouts.app')

@section('title', 'Buat Aduan Baru')

@section('content')
<h1 class="page-title">Aduan RT PEMWEB D</h1>
<p class="page-subtitle">Kelola dan Pantau Aduan dari Warga</p>

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

    <form action="{{ route('aduan.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="warga_nik">Nama Lengkap sesuai Pendataan Warga <span style="color: #dc3545;">*</span></label>
            <select name="warga_nik" id="warga_nik" class="form-control" required style="cursor: pointer;">
                <option value="">-- Pilih Nama Warga --</option>
                @foreach($wargas as $warga)
                <option value="{{ $warga->NIK }}" {{ old('warga_nik') == $warga->NIK ? 'selected' : '' }}>
                    {{ $warga->Nama }} (NIK: {{ $warga->NIK }})
                </option>
                @endforeach
            </select>
            <small style="color: #5ba6a0; font-size: 12px; display: block; margin-top: 8px;">Pilih nama sesuai dengan data yang terdaftar</small>
        </div>

        <div class="form-group">
            <label for="judul">Judul Aduan <span style="color: #dc3545;">*</span></label>
            <input
                type="text"
                name="judul"
                id="judul"
                class="form-control"
                placeholder="Contoh: Jalan Rusak di RT 02"
                required
                value="{{ old('judul') }}">
        </div>

        <div class="form-group">
            <label for="kategori">Kategori Aduan <span style="color: #dc3545;">*</span></label>
            <select name="kategori" id="kategori" class="form-control" required style="cursor: pointer;">
                <option value="">-- Pilih Kategori --</option>
                <option value="infrastruktur" {{ old('kategori') == 'infrastruktur' ? 'selected' : '' }}>🏗️ Infrastruktur (Jalan, Drainase, dll)</option>
                <option value="keamanan" {{ old('kategori') == 'keamanan' ? 'selected' : '' }}>🔒 Keamanan</option>
                <option value="kebersihan" {{ old('kategori') == 'kebersihan' ? 'selected' : '' }}>🧹 Kebersihan</option>
                <option value="lainnya" {{ old('kategori') == 'lainnya' ? 'selected' : '' }}>📌 Lainnya</option>
            </select>
        </div>

        <div class="form-group">
            <label for="isi_aduan">Isi Aduan <span style="color: #dc3545;">*</span></label>
            <textarea
                name="isi_aduan"
                id="isi_aduan"
                class="form-control"
                rows="6"
                placeholder="Jelaskan detail aduan Anda dengan lengkap..."
                required>{{ old('isi_aduan') }}</textarea>
            <small style="color: #5ba6a0; font-size: 12px; display: block; margin-top: 8px;">Berikan penjelasan yang jelas agar kami dapat menindaklanjuti dengan baik</small>
        </div>

        <div class="action-buttons" style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary" style="min-width: 180px;">📤 Kirim Aduan</button>
            <a href="{{ route('aduan.index') }}" class="btn btn-secondary" style="margin-left: 0;">← Batal</a>
        </div>
    </form>
</div>
@endsection