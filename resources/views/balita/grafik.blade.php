<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Pertumbuhan – GENTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        :root {
            --g-bg:           #F7FBFF;
            --g-bg2:          #EEF9F4;
            --g-green:        #0E9E72;
            --g-green-mid:    #12BC88;
            --g-green-lite:   #E6F7F1;
            --g-green-border: rgba(14,158,114,.18);
            --g-blue:         #1565C0;
            --g-blue-mid:     #1976D2;
            --g-dark:         #0A1628;
            --g-text:         #1A2E3B;
            --g-text2:        #3D5A6C;
            --g-muted:        #7A9BB0;
            --g-border:       rgba(21,101,192,.1);
            --g-white:        #FFFFFF;
            --sidebar-w:      240px;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Lato', sans-serif;
            background: var(--g-bg);
            color: var(--g-text);
            display: flex;
            min-height: 100vh;
        }

        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .topbar {
            background: var(--g-white);
            border-bottom: 1px solid var(--g-border);
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 40;
        }

        /* ══════════════ SIDEBAR ══════════════ */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--g-white);
            border-right: 1px solid var(--g-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 50;
            transition: transform .3s;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 24px 20px 20px;
            border-bottom: 1px solid var(--g-border);
            text-decoration: none;
        }
        .sidebar-brand .brand-icon {
            width: 36px;
            height: 36px;
            background: var(--g-green);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sidebar-brand .brand-icon i { color: #fff; font-size: 16px; }
        .sidebar-brand span {
            font-weight: 900;
            font-size: 17px;
            color: var(--g-dark);
            letter-spacing: .02em;
        }

        .sidebar-section { padding: 20px 12px 8px; }
        .sidebar-section-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--g-muted);
            padding: 0 8px;
            margin-bottom: 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--g-text2);
            font-size: 14px;
            font-weight: 400;
            transition: all .2s;
            margin-bottom: 2px;
        }
        .nav-item i { font-size: 16px; width: 18px; text-align: center; }
        .nav-item:hover { background: var(--g-bg2); color: var(--g-green); }
        .nav-item.active {
            background: var(--g-green-lite);
            color: var(--g-green);
            font-weight: 700;
        }
        .nav-item.active i { color: var(--g-green); }

        .nav-badge {
            margin-left: auto;
            background: var(--g-green);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 100px;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 16px 12px;
            border-top: 1px solid var(--g-border);
        }
        .user-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            background: var(--g-bg);
            border: 1px solid var(--g-border);
        }
        .user-avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: var(--g-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
            font-size: 13px;
            color: #fff;
            flex-shrink: 0;
        }
        .user-info .user-name { font-size: 13px; font-weight: 700; color: var(--g-dark); }
        .user-info .user-role { font-size: 11px; color: var(--g-muted); font-weight: 400; }
        .logout-btn {
            margin-left: auto;
            color: var(--g-muted);
            text-decoration: none;
            font-size: 16px;
            transition: color .2s;
        }
        .logout-btn:hover { color: #e53e3e; }

        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
        }
        .topbar-left h1 {
            font-size: 20px;
            font-weight: 900;
            color: var(--g-dark);
            letter-spacing: -.01em;
        }
        .topbar-left p {
            font-size: 13px;
            color: var(--g-muted);
            font-weight: 400;
            margin-top: 2px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 700;
            color: var(--g-blue);
            text-decoration: none;
        }
        .back-link:hover { color: var(--g-blue-mid); }

        .content { padding: 28px 32px; flex: 1; }

        .card {
            background: var(--g-white);
            border: 1px solid var(--g-border);
            border-radius: 16px;
            padding: 22px 24px;
            margin-bottom: 20px;
        }
        .card-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--g-dark);
            margin-bottom: 4px;
        }
        .card-sub {
            font-size: 12px;
            color: var(--g-muted);
            font-weight: 400;
            margin-bottom: 18px;
        }

        @media (max-width: 768px) {
            .main { margin-left: 0; }
            .content { padding: 20px 16px; }
            .topbar { padding: 14px 16px; }
        }
    </style>
</head>
<body>

@include('partials.admin-sidebar', ['active' => 'balita'])

<div class="main">

    <div class="topbar">
        <div class="topbar-left">
            <h1>Grafik Pertumbuhan</h1>
            <p>{{ $balita->nama_balita }}</p>
        </div>
        <a href="{{ route('balita.index') }}" class="back-link">
            <i class="bi bi-arrow-left"></i> Kembali ke Data Balita
        </a>
    </div>

    <div class="content">

        <div class="card">
            <div class="card-title">Berat Badan</div>
            <div class="card-sub">Riwayat berat badan (kg) dari waktu ke waktu</div>
            <canvas id="chartBerat" height="90"></canvas>
        </div>

        <div class="card">
            <div class="card-title">Tinggi Badan</div>
            <div class="card-sub">Riwayat tinggi badan (cm) dari waktu ke waktu</div>
            <canvas id="chartTinggi" height="90"></canvas>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode($labels) !!};
    const berat  = {!! json_encode($berat) !!};
    const tinggi = {!! json_encode($tinggi) !!};

    new Chart(document.getElementById('chartBerat'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Berat Badan (kg)',
                data: berat,
                borderColor: '#1565C0',
                backgroundColor: 'rgba(21, 101, 192, 0.1)',
                tension: 0.3,
                fill: true,
                pointRadius: 4,
                pointBackgroundColor: '#1565C0',
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false } },
                y: { grid: { color: 'rgba(21,101,192,.08)' } }
            }
        }
    });

    new Chart(document.getElementById('chartTinggi'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Tinggi Badan (cm)',
                data: tinggi,
                borderColor: '#0E9E72',
                backgroundColor: 'rgba(14, 158, 114, 0.1)',
                tension: 0.3,
                fill: true,
                pointRadius: 4,
                pointBackgroundColor: '#0E9E72',
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false } },
                y: { grid: { color: 'rgba(14,158,114,.08)' } }
            }
        }
    });
</script>
</body>
</html>

