<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Iuran Warga</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- STYLE CSS --- */
        :root {
            --bg-color: #F8F8F8;
            --primary-green: #0A7968;
            --hover-green: #086052;
            --text-dark: #333;
            --border-color: #ddd;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            padding: 0;
            color: var(--text-dark);
        }

        /* Navbar Sederhana */
        .navbar {
            background-color: white;
            padding: 20px 60px;
            border-bottom: 1px solid #eee;
            margin-bottom: 40px;
        }

        .navbar a {
            text-decoration: none;
            color: var(--primary-green);
            font-weight: 700;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Container Utama */
        .container {
            max-width: 800px;
            margin: 0 auto 80px auto;
            padding: 0 20px;
        }

        /* Judul Halaman */
        .header-center {
            text-align: center;
            margin-bottom: 30px;
        }

        .header-center h1 {
            color: var(--primary-green);
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .header-center p {
            color: #666;
            font-size: 14px;
        }

        /* Card Form */
        .form-card {
            background-color: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid #eee;
        }

        /* Input Styles */
        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            color: var(--primary-green);
            font-weight: 600;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            box-sizing: border-box;
            color: #333;
        }

        .form-control:focus {
            border-color: var(--primary-green);
            outline: none;
            background-color: #fafafe;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        /* Tombol File Custom */
        input[type="file"]::file-selector-button {
            background-color: var(--primary-green);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 15px;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            transition: 0.3s;
        }

        /* Tombol Aksi */
        .btn-wrapper {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn-submit {
            background-color: var(--primary-green);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-submit:hover {
            background-color: var(--hover-green);
        }

        .btn-cancel {
            background-color: #e0e0e0;
            color: #555;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
            transition: 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-cancel:hover {
            background-color: #d0d0d0;
        }

        /* Pesan Alert */
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .alert-success { background-color: #e6fffa; color: var(--primary-green); border: 1px solid #ccfbf1; }
        .alert-danger { background-color: #ffe6e6; color: #cc0000; border: 1px solid #ffcccc; }
        .alert-danger ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="{{ url('/') }}">HOME</a>
    </div>

    <div class="container">

        <div class="header-center">
            <h1>Iuran Warga RT</h1>
            <p>Kelola dan Pantau Iuran Warga</p>
        </div>

    <form method="POST" action="/iuran" enctype="multipart/form-data">
        @csrf

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/iuran" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="form-label">Pilih NIK warga</label>
                    <select id="NIK" name="NIK" class="form-control" required>
                        <option value="">-- Pilih Warga --</option>

                        {{-- Logika Loop data warga kamu --}}
                        @if(isset($wargaList))
                            @foreach ($wargaList as $nik => $nama)
                                <option value="{{ $nik }}" {{ old('NIK') == $nik ? 'selected' : '' }}>
                                    {{ $nik }} - {{ $nama }}
                                </option>
                            @endforeach
                        @else
                            <option value="" disabled>Data Warga Belum Tersedia</option>
                        @endif

                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Periode Iuran</label>
                    <input type="date" id="Periode" name="Periode" class="form-control" value="{{ old('Periode') }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Nominal Iuran</label>
                    <input type="number" id="Nominal" name="Nominal" class="form-control" value="{{ old('Nominal') }}" placeholder="Contoh: 50000" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Bukti Iuran</label>
                    <input type="file" id="Bukti_Iuran" name="Bukti_Iuran" class="form-control" accept="image/*" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Keterangan</label>
                    <textarea id="Keterangan" name="Keterangan" class="form-control" rows="4">{{ old('Keterangan') }}</textarea>
                </div>

                <div class="btn-wrapper">
                    <button type="submit" class="btn-submit">Simpan Pembayaran Iuran</button>
                    <a href="{{ url('/iuran') }}" class="btn-cancel">Batal</a>
                </div>

            </form>

        </div>
    </div>

</body>
</html>
