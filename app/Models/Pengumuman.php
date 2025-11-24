<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $table = 'pengumumans';

    protected $fillable = [
        'judul',
        'isi_pengumuman',
        'prioritas',
        'tanggal_pengumuman',
        'is_active'
    ];

    protected $casts = [
        'tanggal_pengumuman' => 'date',
        'is_active' => 'boolean'
    ];
}