@php
use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persuratan RT PEMWEB D</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

<style> 
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f8f8;
        color: #333;
        line-height: 1.6;
    }
    .container {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 20px;
    }
    header {
        padding: 15px 0;
        margin-bottom: 20px;
        background-color: #fff;
    }
    header h1 {
        font-size: 16px;
        font-weight: bold;
        text-align: left;
        margin-left: -200px;
    }
    .judul-bagian {
        font-size: 65px;
        font-weight: bold;
        text-align: center;
        margin-top: 40px;
        margin-bottom: 5px;
        color: #0A7968;
    }
    .subjudul-form {
        font-size: 22px;
        text-align: center;
        margin-bottom: 30px;
        color: #0A7968;
    }
    .formulir {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        padding: 20px;
    }
    .grup-input {
        width: calc(50% - 7.5px);
        margin-bottom: 10px;
    }
    .grup-input.full {
        width: 100%;
    }
    .formulir input[type="text"],
    .formulir select {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
    }
    .formulir input:focus,
    .formulir select:focus{
        outline: none;
        border-color: #0A7968;
    }
    .container-tombol {
        width: 100%;
        text-align: center;
        margin-top: 5px;
    }
    .tombol-kirim {
        width: 100%;
        max-width: 400px;
        background-color: #0A7968;
        padding: 12px 20px;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
    }
    .bagian-daftar {
        margin: 50px 0;
    }
    .container-tabel {
        overflow-x: auto;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table th, table td {
        padding: 12px 15px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }
    table th {
        background-color: #0A7968;
        color: white;
    }
    table tbody tr:nth-child(even) {
        background-color: #fff;
    }
</style>
</head>

<body>

<header>
    <div class="container">
        <h1>HOME</h1>
    </div>
</header>

<main class="container">

    {{-- ALERT --}}
    @if(session('success'))
        <div style="background:#c7f9cc; padding:10px; margin-bottom:15px; border-radius:5px; border-left:5px solid green;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
    <div style="background:#ffd6d6; padding:10px; margin-bottom:15px; border-radius:5px; border-left:5px solid red;">
        {{ session('error') }}
    </div>
    @endif
    @if ($errors->any())
        <div style="background:#ffd6d6; padding:10px; margin-bottom:15px; border-radius:5px; border-left:5px solid red;">
            <ul style="margin:0; padding-left:18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <h2 class="judul-bagian">Persuratan RT PEMWEB D</h2>
    <h3 class="subjudul-form">Formulir Permohonan Surat</h3>

    <form class="formulir" action="{{ route('surat.store') }}" method="POST">
        @csrf

        <div class="grup-input">
            <input type="text" name="Nama_Lengkap" placeholder="Nama Lengkap sesuai Pendataan Warga" value="{{ old('Nama_Lengkap') }}" required>
        </div>

        <div class="grup-input">
            <input type="text" name="NIK" placeholder="NIK (16 digit) sesuai Pendataan Warga" maxlength="16" value="{{ old('NIK') }}" required>
        </div>

        <div class="grup-input full">
            <select name="Jenis_Surat" required>
                <option disabled selected>Pilih Jenis Surat</option>
                <option value="Surat Domisili">Surat Domisili</option>
                <option value="Surat Usaha">Surat Usaha</option>
                <option value="Surat Pengantar">Surat Pengantar</option>
            </select>
        </div>

        <div class="container-tombol">
            <button class="tombol-kirim">Kirim Permohonan</button>
        </div>
    </form>

    <section class="bagian-daftar">
        <h2 class="judul-bagian">Daftar Permohonan Surat</h2>

        <div class="container-tabel">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Jenis Surat</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($surat as $index => $s)
                        <tr style="text-align:center;">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $s->Jenis_Surat }}</td>
                        <td>{{ $s->Nama_Lengkap }}</td>
                        <td>{{ $s->NIK }}</td>
                        <td>{{ Carbon::parse($s->Tanggal_Pengajuan)->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align:center;">Belum ada permohonan surat</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</main>

</body>
</html>
