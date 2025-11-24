@extends('layouts.app')

@section('title', 'Tanggapan Aduan')

@section('content')
<div style="margin-bottom: 30px;">
    <a href="{{ route('aduan.show', $aduan) }}" style="color: #5ba6a0; text-decoration: none; font-weight: 600; font-size: 14px;">
        ← Kembali ke Detail Aduan
    </a>
</div>

<h1 class="page-title">Berikan Tanggapan</h1>
<p class="page-subtitle">Update Status dan Tanggapan Aduan</p>

<div class="info-box" style="margin-bottom: 30px;">
    <h3 style="color: #0A7968; margin-bottom: 20px; font-size: 20px; font-weight: 700;">📋 Detail Aduan:</h3>
    <table class="info-table">
        <tr>
            <th>👤 Nama Warga:</th>
            <td><strong>{{ $aduan->warga->Nama }}</strong></td>
        </tr>
        <tr>
            <th>📌 Judul:</th>
            <td><strong style="font-size: 16px; color: #0A7968;">{{ $aduan->judul }}</strong></td>
        </tr>
        <tr>
            <th>🏷️ Kategori:</th>
            <td>
                <span style="background-color: #e8f5f3; padding: 5px 12px; border-radius: 6px; color: #0A7968; font-weight: 600;">
                    {{ ucfirst($aduan->kategori) }}
                </span>
            </td>
        </tr>
        <tr>
            <th>📝 Isi Aduan:</th>
            <td style="line-height: 1.7;">{{ $aduan->isi_aduan }}</td>
        </tr>
    </table>
</div>

<div class="card">
    <h3 style="color: #0A7968; margin-bottom: 25px; font-size: 22px; font-weight: 700;">💬 Form Tanggapan</h3>

    <form action="{{ route('aduan.update', $aduan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Status Aduan <span style="color: #dc3545;">*</span></label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $aduan->status == 'pending' ? 'selected' : '' }}>⏳ Pending - Menunggu Peninjauan</option>
                <option value="diproses" {{ $aduan->status == 'diproses' ? 'selected' : '' }}>🔄 Sedang Diproses</option>
                <option value="selesai" {{ $aduan->status == 'selesai' ? 'selected' : '' }}>✅ Selesai - Sudah Ditindaklanjuti</option>
            </select>
        </div>

        <div class="form-group">
            <label for="tanggapan">Tanggapan / Keterangan</label>
            <textarea name="tanggapan" id="tanggapan" class="form-control" rows="7" placeholder="Berikan tanggapan atau keterangan terkait aduan ini...&#10;&#10;Contoh:&#10;Terima kasih atas laporannya. Tim kami telah meninjau lokasi dan akan segera melakukan perbaikan dalam 3 hari ke depan.">{{ old('tanggapan', $aduan->tanggapan) }}</textarea>
            <small style="color: #5ba6a0; font-size: 12px;">Tanggapan ini akan dilihat oleh warga yang mengajukan aduan</small>
        </div>

        <div class="action-buttons" style="margin-top: 30px;">
            <button type="submit" class="btn btn-primary" style="min-width: 200px;">💾 Simpan Tanggapan</button>
            <a href="{{ route('aduan.show', $aduan) }}" class="btn btn-secondary" style="margin-left: 0;">← Batal</a>
        </div>
    </form>
</div>
@endsection