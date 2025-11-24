<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi RT Terpadu')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F8F8F8;
            color: #333;
        }

        /* ================= HEADER ================= */
        header {
            padding: 18px 0;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 40px;
        }

        header .container-header {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
        }

        header h1 {
            font-size: 16px;
            font-weight: 600;
            color: #0A7968;
            cursor: pointer;
            transition: color 0.3s;
        }

        header h1:hover {
            color: #5ba6a0;
        }

        /* ================= MAIN CONTENT ================= */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 30px;
        }

        .page-title {
            font-size: 42px;
            font-weight: 700;
            color: #0A7968;
            text-align: center;
            margin-bottom: 12px;
        }

        .page-subtitle {
            font-size: 18px;
            color: #5ba6a0;
            text-align: center;
            margin-bottom: 50px;
            font-weight: 500;
        }

        /* ================= CARD STYLES ================= */
        .card {
            background: white;
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0 4px 12px rgba(10, 121, 104, 0.08);
            margin-bottom: 25px;
        }

        /* ================= FORM STYLES ================= */
        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            color: #0A7968;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
            background-color: #fff;
        }

        .form-control:focus {
            outline: none;
            border-color: #5ba6a0;
            box-shadow: 0 0 0 4px rgba(91, 166, 160, 0.1);
        }

        select.form-control {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%230A7968' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 40px;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 130px;
        }

        /* ================= BUTTON STYLES ================= */
        .btn {
            padding: 14px 32px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            font-family: 'Poppins', sans-serif;
        }

        .btn-primary {
            background-color: #0A7968;
            color: white;
        }

        .btn-primary:hover {
            background-color: #5ba6a0;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(10, 121, 104, 0.25);
        }

        .btn-secondary {
            background-color: #e8e8e8;
            color: #0A7968;
            margin-left: 10px;
        }

        .btn-secondary:hover {
            background-color: #d5d5d5;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-block {
            width: 100%;
            display: block;
        }

        /* ================= TABLE STYLES ================= */
        .table-container {
            overflow-x: auto;
            margin-top: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        table thead {
            background-color: #0A7968;
            color: white;
        }

        table th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
        }

        table td {
            padding: 16px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        table tbody tr:hover {
            background-color: #F8F8F8;
        }

        table tbody tr:last-child td {
            border-bottom: none;
        }

        /* ================= BADGE STYLES ================= */
        .badge {
            display: inline-block;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .badge-diproses {
            background-color: #cfe2ff;
            color: #084298;
        }

        .badge-selesai {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        .badge-tinggi {
            background-color: #f8d7da;
            color: #842029;
        }

        .badge-sedang {
            background-color: #fff3cd;
            color: #856404;
        }

        .badge-rendah {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        /* ================= ALERT STYLES ================= */
        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 14px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
            border-left: 4px solid #0A7968;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #842029;
            border-left: 4px solid #dc3545;
        }

        /* ================= ACTION BUTTONS ================= */
        .action-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .action-buttons a,
        .action-buttons button {
            padding: 10px 18px;
            font-size: 13px;
            text-decoration: none;
        }

        /* ================= PENGUMUMAN CARD ================= */
        .pengumuman-card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(10, 121, 104, 0.08);
            border-left: 5px solid #5ba6a0;
            transition: all 0.3s;
        }

        .pengumuman-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(10, 121, 104, 0.15);
            border-left-color: #0A7968;
        }

        .pengumuman-card h3 {
            color: #0A7968;
            margin-bottom: 12px;
            font-size: 22px;
            font-weight: 700;
        }

        .pengumuman-meta {
            color: #5ba6a0;
            font-size: 13px;
            margin-bottom: 18px;
            font-weight: 500;
        }

        /* ================= INFO BOX ================= */
        .info-box {
            background-color: #e8f5f3;
            border-left: 5px solid #5ba6a0;
            padding: 20px 25px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .info-table {
            width: 100%;
        }

        .info-table th {
            text-align: left;
            padding: 12px;
            font-weight: 600;
            width: 200px;
            vertical-align: top;
            color: #0A7968;
        }

        .info-table td {
            padding: 12px;
            vertical-align: top;
        }

        /* ================= SECTION HEADER ================= */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-header h2 {
            color: #0A7968;
            font-size: 26px;
            font-weight: 700;
        }

        /* ================= RESPONSIVE ================= */
        @media (max-width: 768px) {
            .page-title {
                font-size: 32px;
            }

            .page-subtitle {
                font-size: 16px;
            }

            .card {
                padding: 25px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons a,
            .action-buttons button {
                width: 100%;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .main-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header HOME -->
    <header>
        <div class="container-header">
            <h1 onclick="window.location.href='{{ url('/') }}'">HOME</h1>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-container">
        @yield('content')
    </div>
</body>
</html>