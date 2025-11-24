<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
    }

        /* Container utama */
    .container {
        margin: 60px;
        text-align: center;
    }

    /* Judul utama */
    .hero-title {
        font-size: 40px;
        font-weight: bold;
        color: #0A7968;
        text-align: center;
        margin-bottom: 10px;
    }

    .hero-desc {
        margin: 0 auto 40px auto;
        max-width: 650px;
        font-size: 15px;
    }

    /* Card layout */
    .cards-row {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    /* Card */
    .card {
        padding: 20px;
        width: 260px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        text-align: left;
        cursor: pointer;
    }

    .card h3 {
        color: #0A7968;
        margin-bottom: 10px;
        font-size: 16px;
    }

    .card p {
        color: #555;
        font-size: 14px;
        line-height: 1.4;
    }



</style>
</head>

<body>



    <!-- Konten utama -->
    <div class="container">

        <h2 class="hero-title">Selamat Datang di Aplikasi RT PEMWEB D</h2>
        <p class="hero-desc">
            Dashboard utama untuk mengelola data warga, iuran, aduan, persuratan, dan pengumuman RT secara terpadu dan efisien.
        </p>

        <!-- Baris 1 -->
        <div class="cards-row">
            <!-- punya kelompok 1 -->
            <div class="card" onclick="window.location.href='warga/tambah'">
                <h3>Pendataan Warga</h3>
                <p>Kelola data kependudukan warga RT dengan sistem yang terorganisir dan mudah diakses.</p>
            </div>

            <!-- punya kelompok 1 -->
            <div class="card"  onclick="window.location.href='iuran/tambah'">
                <h3>Iuran Warga</h3>
                <p>Pantau dan kelola pembayaran iuran bulanan warga dengan transparansi penuh.</p>
            </div>

            <!-- punya kelompok 2 -->
            <div class="card" onclick="window.location.href='{{ route('aduan.index') }}'">
                <h3>Aduan Warga</h3>
                <p>Terima dan tindaklanjuti aduan warga untuk meningkatkan kualitas lingkungan RT.</p>
            </div>
        </div>

        <!-- Baris 2 -->
        <div class="cards-row">
            <!-- punya kelompok 3 -->
            <div class="card" onclick="window.location.href='surat'"> 
                <h3>Persuratan</h3> 
                <p>Buat dan kelola surat menyurat RT seperti surat keterangan dan dokumen resmi lainnya.</p>
            </div>

            <!-- punya kelompok 2 -->
            <div class="card" onclick="window.location.href='{{ route('pengumuman.index') }}'">
                <h3>Pengumuman Warga</h3>
                <p>Publikasikan informasi penting dan pengumuman untuk seluruh warga RT.</p>
            </div>
        </div>

    </div>

</body>
</html>
