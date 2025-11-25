<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Iuran Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0d7a5e;
            --primary-hover: #0a5f49;
            --bg-color: #fdfdfd;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            color: #333;
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .page-subtitle {
            color: #6c757d;
            font-weight: 300;
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        .btn-custom {
            background-color: var(--primary-color);
            color: white;
            border-radius: 6px;
            padding: 10px 20px;
            border: none;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: var(--primary-hover);
            color: white;
        }

        .table-custom thead {
            background-color: var(--primary-color);
            color: white;
        }
        .table-custom thead th {
            font-weight: 500;
            border-bottom: none;
        }

        .card-custom {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            border-radius: 10px;
        }

        .text-primary-custom {
            color: var(--primary-color);
            font-weight: 600;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light bg-white px-4 py-3 mb-4 border-bottom">
    <a class="navbar-brand fw-bold text-success" href="{{ url('/') }}" style="color: var(--primary-color) !important;">HOME</a>
</nav>

<div class="container">

    <div class="text-center">
        <h2 class="page-title">Data Iuran Warga RT</h2>
        <p class="page-subtitle">Pantau pembayaran dan riwayat iuran warga</p>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4 px-2">
        <a href="{{ route('iuran.create') }}" class="btn btn-custom">
            + Tambah Pembayaran Iuran
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card card-custom">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-custom mb-0 align-middle">
                    <thead>
                        <tr>
                            <th class="ps-4 py-3">No</th>
                            <th class="py-3">Nama Warga</th>
                            <th class="py-3">Periode</th>
                            <th class="py-3">Nominal</th>
                            <th class="py-3">Tanggal Bayar</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Bukti</th>
                            <th class="pe-4 py-3">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($iuranList as $key => $iuran)
                        <tr>
                            <td class="ps-4">{{ $key + 1 }}</td>
                            <td>
                                <div class="text-primary-custom">{{ $iuran->warga->Nama ?? 'Data Warga Terhapus' }}</div>
                                <small class="text-muted">{{ $iuran->NIK }}</small>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($iuran->Periode)->format('F Y') }}</td>
                            <td class="fw-bold">Rp {{ number_format($iuran->Nominal, 0, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($iuran->Tanggal_Bayar)->format('d/m/Y') }}</td>
                            <td>

                                <span class="badge" style="background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc;">
                                    {{ $iuran->Status_Bayar }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ asset('storage/' . $iuran->Bukti_Iuran) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $iuran->Bukti_Iuran) }}" alt="Bukti" width="45" height="45" class="rounded-3 object-fit-cover border">
                                </a>
                            </td>
                            <td class="pe-4 text-muted">{{ $iuran->Keterangan ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5 text-muted">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486754.png" width="60" class="mb-3 opacity-50">
                                <br>
                                Belum ada data iuran yang tercatat.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
