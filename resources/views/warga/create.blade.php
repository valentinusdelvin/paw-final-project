@extends('layouts.app')

@section('title', 'Tambah Data Warga')

@section('content')
    <h1 class="page-title">Form Tambah Warga</h1>
    <p class="page-subtitle">Silakan lengkapi data di bawah ini dengan benar</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            <ul style="list-style-type: disc; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form method="POST" action="/warga">
            @csrf

            <div class="form-group">
                <label for="NIK">NIK (16 Digit)</label>
                <input type="text" 
                       id="NIK" 
                       name="NIK" 
                       class="form-control" 
                       value="{{ old('NIK') }}" 
                       placeholder="Masukkan 16 digit NIK"
                       required>
            </div>

            <div class="form-group">
                <label for="Nama">Nama Lengkap</label>
                <input type="text" 
                       id="Nama" 
                       name="Nama" 
                       class="form-control" 
                       value="{{ old('Nama') }}" 
                       placeholder="Masukkan nama lengkap"
                       required>
            </div>

            <div class="form-group">
                <label for="Tanggal_Lahir">Tanggal Lahir</label>
                <input type="date" 
                       id="Tanggal_Lahir" 
                       name="Tanggal_Lahir" 
                       class="form-control" 
                       value="{{ old('Tanggal_Lahir') }}">
            </div>

            <div class="form-group">
                <label for="Alamat">Alamat</label>
                <textarea id="Alamat" 
                          name="Alamat" 
                          class="form-control" 
                          placeholder="Masukkan alamat lengkap"
                          required>{{ old('Alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label for="RT">RT</label>
                <input type="text" 
                       id="RT" 
                       name="RT" 
                       class="form-control" 
                       value="{{ old('RT') }}" 
                       placeholder="Contoh: 005"
                       required>
            </div>

            <div class="action-buttons" style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary">Simpan Warga</button>
                <a href="/warga" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
@endsection