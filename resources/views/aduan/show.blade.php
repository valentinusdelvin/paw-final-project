@extends('layouts.app')

@section('title', 'Detail Aduan')

@section('content')
<div style="margin-bottom: 30px;">
    <a href="{{ route('aduan.index') }}" style="color: #5ba6a0; text-decoration: none; font-weight: 600; font-size: 14px;">
        ← Kembali ke Daftar Aduan
    </a>
</div>

<h1 class="page-title">Detail Aduan</h1>
<p class="page-subtitle">Informasi Lengkap Aduan Warga</p>

<div class="card">
    <div class="info-box">
        <table class="info-table">
            <tr>
                <th>👤 Nama Warga:</th>
                <td><strong>{{ $aduan->warga->Nama }}</strong></td>

                <th>🆔 NIK:</th>
                <td>{{ $aduan->warga->NIK }}</td>
            </tr>
            <tr>
                <th>📌 Judul Aduan:</th>
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
                <th>📊 Status:</th>
                <td>
                    @if($aduan->status == 'pending')
                    <span class="badge badge-pending" style="font-size: 13px; padding: 8px 16px;">⏳ Pending</span>
                    @elseif($aduan->status == 'diproses')
                    <span class="badge badge-diproses" style="font-size: 13px; padding: 8px 16px;">🔄 Diproses</span>
                    @else
                    <span class="badge badge-selesai" style="font-size: 13px; padding: 8px 16px;">✅ Selesai</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>📅 Tanggal Dibuat:</th>
                <td>{{ $aduan->created_at->format('d F Y, H:i') }} WIB</td>
            </tr>
        </table>
    </div>

    <div style="margin: 30px 0;">
        <h3 style="color: #0A7968; margin-bottom: 15px; font-size: 20px; font-weight: 700;">📝 Isi Aduan:</h3>
        <div style="background-color: #F8F8F8; padding: 25px; border-radius: 10px; line-height: 1.8; border-left: 5px solid #5ba6a0;">
            {{ $aduan->isi_aduan }}
        </div>
    </div>

    @if($aduan->tanggapan)
    <div style="margin: 30px 0;">
        <h3 style="color: #0A7968; margin-bottom: 15px; font-size: 20px; font-weight: 700;">💬 Tanggapan Admin:</h3>
        <div style="background-color: #e8f5f3; padding: 25px; border-radius: 10px; border-left: 5px solid #0A7968; line-height: 1.8;">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <span style="background-color: #0A7968; color: white; padding: 4px 10px; border-radius: 4px; font-size: 11px; font-weight: 600;">RESMI</span>
                <span style="color: #5ba6a0; font-size: 13px;">{{ $aduan->updated_at->format('d F Y, H:i') }} WIB</span>
            </div>
            {{ $aduan->tanggapan }}
        </div>
    </div>
    @else
    <div style="margin: 30px 0;">
        <div style="background-color: #fff3cd; padding: 20px; border-radius: 10px; border-left: 5px solid #ffc107; color: #856404;">
            ⚠️ <strong>Belum ada tanggapan</strong> - Aduan Anda sedang dalam proses peninjauan
        </div>
    </div>
    @endif

    <div class="action-buttons" style="margin-top: 40px; padding-top: 30px; border-top: 2px solid #f0f0f0;">
        <a href="{{ route('aduan.edit', $aduan) }}" class="btn btn-primary">✏️ Berikan Tanggapan</a>
        <a href="{{ route('aduan.index') }}" class="btn btn-secondary" style="margin-left: 0;">← Kembali</a>

        <form action="{{ route('aduan.destroy', $aduan) }}" method="POST" style="display: inline;" onsubmit="return confirm('⚠️ Yakin ingin menghapus aduan ini? Data tidak dapat dikembalikan!')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="margin-left: 0;">🗑️ Hapus Aduan</button>
        </form>
    </div>
</div>
@endsection