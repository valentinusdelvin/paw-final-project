<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surats';

    // Kolom yang bisa diisi
    protected $fillable = [
        'NIK',
        'Nama_Lengkap',
        'Jenis_Surat',
        'Keterangan',
        'Tanggal_Pengajuan',
    ];

    // Relasi ke model Warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'NIK', 'NIK');
    }
}
