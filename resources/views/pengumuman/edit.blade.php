@extends('layouts.app')

@section('title', 'Edit Pengumuman')

@section('content')
<div style="margin-bottom: 30px;">
    <a href="{{ route('pengumuman.show', $pengumuman) }}" style="color: #5ba6a0; text-decoration: none; font-weight: 600; font-size: 14px;">
        ← Kembali ke Detail Pengumuman
    </a>
</div>

<h1 class="page-title">Edit Pengumuman</h1>
<p class="page-subtitle">Perbarui Informasi Pengumuman</p>

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

    <form action="{{ route('pengumuman.update', $pengumuman) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="judul">Judul Pengumuman <span style="color: #dc3545;">*</span></label>
            <input 
                type="text" 
                name="judul" 
                id="judul" 
                class="form-control" 
                value="{{ old('judul', $pengumuman->judul) }}" 
                required
            >
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 24px;">
            <div class="form-group" style="margin-bottom: 0;">
                <label for="prioritas">Tingkat Prioritas <span style="color: #dc3545;">*</span></label>
                <select name="prioritas" id="prioritas" class="form-control" required style="cursor: pointer;">
                    <option value="rendah" {{ old('prioritas', $pengumuman->prioritas) == 'rendah' ? 'selected' : '' }}>🟢 Rendah</option>
                    <option value="sedang" {{ old('prioritas', $pengumuman->prioritas) == 'sedang' ? 'selected' : '' }}>🟡 Sedang</option>
                    <option value="tinggi" {{ old('prioritas', $pengumuman->prioritas) == 'tinggi' ? 'selected' : '' }}>🔴 Tinggi</option>
                </select>
            </div>

            <div class="form-group" style="margin-bottom: 0;">
                <label for="tanggal_pengumuman">Tanggal Pengumuman <span style="color: #dc3545;">*</span></label>
                <input 
                    type="date" 
                    name="tanggal_pengumuman" 
                    id="tanggal_pengumuman" 
                    class="form-control" 
                    value="{{ old('tanggal_pengumuman', $pengumuman->tanggal_pengumuman->format('Y-m-d')) }}" 
                    required
                >
            </div>
        </div>

        <div class="form-group">
            <label for="isi_pengumuman">Isi Pengumuman <span style="color: #dc3545;">*</span></label>
            <textarea 
                name="isi_pengumuman" 
                id="isi_pengumuman" 
                class="form-control" 
                rows="8" 
                required
            >{{ old('isi_pengumuman', $pengumuman->isi_pengumuman) }}</textarea>
        </div>

        

        <div class="action-buttons" style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary" style="min-width: 200px;">💾 Update Pengumuman</button>
            <a href="{{ route('pengumuman.show', $pengumuman) }}" class="btn btn-secondary" style="margin-left: 0;">← Batal</a>
        </div>
    </form>
</div>

<style>
    /* Pastikan form bisa diinput */
    input.form-control,
    select.form-control,
    textarea.form-control {
        pointer-events: auto !important;
        cursor: text !important;
    }
    
    select.form-control {
        cursor: pointer !important;
    }
    
    input[type="checkbox"] {
        pointer-events: auto !important;
        cursor: pointer !important;
    }
    
    /* Responsive grid */
    @media (max-width: 768px) {
        div[style*="grid-template-columns"] {
            grid-template-columns: 1fr !important;
        }
    }
</style>
@endsection