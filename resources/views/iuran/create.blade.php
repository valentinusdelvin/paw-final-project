<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Iuran</title>
</head>
<body>
    <h1>Form Tambah Iuran Warga</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/iuran" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="NIK">Pilih Warga (NIK):</label><br>
        <select id="NIK" name="NIK" required>
            <option value="">-- Pilih Warga --</option>
            {{-- Loop data warga yang dikirim dari controller --}}
            @foreach ($wargaList as $nik => $nama)
                <option value="{{ $nik }}" {{ old('NIK') == $nik ? 'selected' : '' }}>
                    {{ $nik }} - {{ $nama }}
                </option>
            @endforeach
        </select><br><br>

        <label for="Periode">Periode Iuran (Bulan & Tahun):</label><br>
        <input type="date" id="Periode" name="Periode" value="{{ old('Periode') }}" required><br><br>

        <label for="Nominal">Nominal Iuran:</label><br>
        <input type="number" id="Nominal" name="Nominal" value="{{ old('Nominal') }}" required><br><br>

        <label for="Bukti_Iuran">Bukti Iuran (Foto):</label><br>
        <input type="file" id="Bukti_Iuran" name="Bukti_Iuran" accept="image/*" required><br><br>

        <label for="Keterangan">Keterangan (Opsional):</label><br>
        <input type="text" id="Keterangan" name="Keterangan" value="{{ old('Keterangan') }}"><br><br>

        <button type="submit">Simpan Pembayaran Iuran</button>
    </form>
</body>
</html>
