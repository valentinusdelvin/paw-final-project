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
    /* ================================
        GLOBAL RESET & BASE STYLING
        ================================ */
        /* RESET dasar biar semua elemen mulai dari nol */
        * {
            box-sizing: border-box; /* Hitung padding+border biar layout gak geser */
            margin: 0; /* Hilangin margin bawaan browser */
            padding: 0; /* Hilangin padding bawaan */
        }

        /* Style utama halaman */
        body {
            font-family: 'Poppins', sans-serif; /* Ganti font jadi poppins */
            background-color: #f8f8f8; /* Warna background abu muda */
            color: #333; /* Warna teks gelap biar enak dibaca */
            line-height: 1.6; /* Jarak antar baris biar gak mepet */
        }

        /* Layout pembatas konten */
        .container {
            max-width: 900px; /* Lebar maksimal konten */
            margin: 0 auto; /* Bikin konten di tengah */
            padding: 0 20px; /* Biar konten gak nempel ke pinggir */
            cursor: pointer;
        }

        /* ================= HEADER ================= */
        header {
            padding: 15px 0; /* Ruang atas & bawah */
            margin-bottom: 20px; /* Jarak ke konten berikutnya */
            background-color: #fff; /* Warna putih kaya navbar */
        }

        header h1 {
            font-size: 16px; /* Ukuran tulisan HOME */
            font-weight: bold; /* Tebal */
            text-align: left; /* Rata kiri */
            margin-left: -200px; /* Dipaksa makin kiri */
        }

        /* ================= JUDUL UTAMA ================= */
        .judul-bagian {
            font-size: 65px; /* menyesuaikan design figma */
            font-weight: bold; 
            text-align: center;
            margin-top: 40px; /* jarak dari header */
            margin-bottom: 5px; /* jarak ke subjudul */
            color: #0A7968; 
        }

        /* Subjudul */
        .subjudul-form {
            font-size: 22px;
            text-align: center;
            margin-bottom: 30px;
            color: #0A7968;
        }

        /* ================= FORM ================= */
        .formulir {
            display: flex; /* Biar pakai flexbox */
            flex-wrap: wrap; /* Biar turun kalo kepenuhan */
            gap: 15px; /* Jarak antar input */
            padding: 20px;
        }

        /* Ukuran input normal */
        .grup-input {
            width: calc(50% - 7.5px); /* 2 kolom */
            margin-bottom: 10px;
        }

        /* Input yang harus full */
        .grup-input.full {
            width: 100%;
        }



        /* Style semua input */
        .formulir input[type="text"],
        .formulir select {
            width: 100%; /* full elemen pembungkus */
            padding: 10px 15px; /* ruang dalam */
            border: 1px solid #ddd; /* border tipis */
            border-radius: 5px; /* sudut melengkung */
            font-size: 16px;
        }

        /* Biar border inputnya berwarna Hijau */
        .formulir input:focus,
        .formulir select:focus{
            outline: none;
            border-color: #0A7968;
        }

        /* ================= TOMBOL ================= */
        .container-tombol {
            width: 100%;
            text-align: center; /* tombol ke tengah */
            margin-top: 5px;
        }

        .tombol-kirim {
            width: 100%;
            max-width: 400px; /* batas maksimal */
            background-color: #0A7968;
            padding: 12px 20px;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer; /* tangan mouse */
        }

        /* ================= TABLE ================= */
        .bagian-daftar {
            margin: 50px 0;
        }

        .container-tabel {
            overflow-x: auto; /* biar bisa geser kanan-kiri di hp */
        }

        table {
            width: 100%;
            border-collapse: collapse; /* biar border rapat */
            margin-top: 20px;
        }

        /* Style sel tabel */
        table th, table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd; /* garis bawah */
            text-align: left;
        }

        /* Header tabel */
        table th {
            background-color: #0A7968;
            color: white;
        }

        /* Efek zebra */
        table tbody tr:nth-child(even) {
            background-color: #fff;
        }
</style>
</head>

<body>

<header>
    <div class="container" onclick="window.location.href='/'">
        <h1> HOME </h1>
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
