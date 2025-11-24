<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aduans', function (Blueprint $table) {
            $table->id();
            $table->string('warga_nik', 16);
            $table->string('judul');
            $table->text('isi_aduan');
            $table->enum('kategori', ['infrastruktur', 'keamanan', 'kebersihan', 'lainnya']);
            $table->enum('status', ['pending', 'diproses', 'selesai'])->default('pending');
            $table->text('tanggapan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aduans');
    }
};