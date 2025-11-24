@extends('layouts.app')

@section('title', 'Detail Pengumuman')

@section('content')
<div style="margin-bottom: 30px;">
    <a href="{{ route('pengumuman.index') }}" style="color: #5ba6a0; text-decoration: none; font-weight: 600; font-size: 14px;">
        ← Kembali ke Daftar Pengumuman
    </a>
</div>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 15px; margin-bottom: 25px;">
        <h1 style="color: #0A7968; font-size: 32px; margin: 0; font-weight: 700; line-height: 1.3; flex: 1; min-width: 250px;">
            {{ $pengumuman->judul }}
        </h1>
        <div>
            @if($pengumuman->prioritas == 'tinggi')
                <span class="badge badge-tinggi" style="font-size: 13px; padding: 8px 16px;">⚠️ PENTING</span>
            @elseif($pengumuman->prioritas == 'sedang')
                <span class="badge badge-sedang" style="font-size: 13px; padding: 8px 16px;">SEDANG</span>
            @else
                <span class="badge badge-rendah" style="font-size: 13px; padding: 8px 16px;">BIASA</span>
            @endif
        </div>
    </div>

    <div style="color: #5ba6a0; font-size: 14px; margin-bottom: 35px; padding-bottom: 25px; border-bottom: 2px solid #e8f5f3; font-weight: 500;">
        📅 {{ $pengumuman->tanggal_pengumuman->format('d F Y') }} • 
        🕒 Dipublikasikan {{ $pengumuman->created_at->format('H:i') }} WIB
        @if($pengumuman->updated_at->format('Y-m-d H:i') != $pengumuman->created_at->format('Y-m-d H:i'))
            • ✏️ Diperbarui {{ $pengumuman->updated_at->format('d/m/Y H:i') }}
        @endif
    </div>

    <div style="background-color: #F8F8F8; padding: 35px; border-radius: 12px; line-height: 1.9; font-size: 15px; border-left: 5px solid #5ba6a0; white-space: pre-wrap; word-wrap: break-word;">{{ $pengumuman->isi_pengumuman }}</div>

    

    <div class="action-buttons" style="margin-top: 30px;">
        <a href="{{ route('pengumuman.edit', $pengumuman) }}" class="btn btn-primary">✏️ Edit Pengumuman</a>
        <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary" style="margin-left: 0;">← Kembali</a>
        
        <form action="{{ route('pengumuman.destroy', $pengumuman) }}" method="POST" style="display: inline;" onsubmit="return confirm('⚠️ Yakin ingin menghapus pengumuman ini? Data tidak dapat dikembalikan!')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" style="margin-left: 0;">🗑️ Hapus Pengumuman</button>
        </form>
    </div>
</div>

<style>
    /* Fix untuk responsive */
    @media (max-width: 768px) {
        .card h1 {
            font-size: 24px !important;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .action-buttons a,
        .action-buttons button,
        .action-buttons form {
            width: 100%;
            margin-left: 0 !important;
            margin-top: 10px;
        }
        
        .action-buttons .btn {
            width: 100%;
        }
    }
</style>
@endsection