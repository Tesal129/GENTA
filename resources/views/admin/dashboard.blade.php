<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin – GENTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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

        .sidebar-section {
            padding: 20px 12px 8px;
        }
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
        .user-info .user-role {
            font-size: 11px;
            color: var(--g-muted);
            font-weight: 400;
        }
        .logout-btn {
            margin-left: auto;
            color: var(--g-muted);
            text-decoration: none;
            font-size: 16px;
            transition: color .2s;
        }
        .logout-btn:hover { color: #e53e3e; }

        /* ══════════════ MAIN ══════════════ */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ══════════════ TOPBAR ══════════════ */
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
        .topbar-right { display: flex; align-items: center; gap: 12px; }

        .topbar-date {
            font-size: 13px;
            color: var(--g-text2);
            font-weight: 400;
            background: var(--g-bg);
            border: 1px solid var(--g-border);
            padding: 6px 14px;
            border-radius: 8px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            background: var(--g-blue);
            color: #fff;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all .2s;
            box-shadow: 0 4px 14px rgba(21,101,192,.2);
        }
        .btn-primary:hover { background: var(--g-blue-mid); transform: translateY(-1px); }

        /* ══════════════ CONTENT ══════════════ */
        .content { padding: 28px 32px; flex: 1; }

        /* ══════════════ STAT CARDS ══════════════ */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: var(--g-white);
            border: 1px solid var(--g-border);
            border-radius: 16px;
            padding: 22px 20px;
            position: relative;
            overflow: hidden;
            transition: all .25s;
        }
        .stat-card:hover { transform: translateY(-2px); box-shadow: 0 8px 28px rgba(14,158,114,.1); }
        .stat-card::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            border-radius: 16px 16px 0 0;
        }
        .stat-card.green::after { background: var(--g-green); }
        .stat-card.blue::after  { background: var(--g-blue); }
        .stat-card.teal::after  { background: #0891B2; }
        .stat-card.indigo::after { background: #6366F1; }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            font-size: 18px;
        }
        .stat-card.green .stat-icon { background: rgba(14,158,114,.1); color: var(--g-green); }
        .stat-card.blue  .stat-icon { background: rgba(21,101,192,.1); color: var(--g-blue); }
        .stat-card.teal  .stat-icon { background: rgba(8,145,178,.1);  color: #0891B2; }
        .stat-card.indigo .stat-icon { background: rgba(99,102,241,.1); color: #6366F1; }

        .stat-num {
            font-size: 32px;
            font-weight: 900;
            color: var(--g-dark);
            line-height: 1;
            letter-spacing: -.02em;
        }
        .stat-label {
            font-size: 13px;
            color: var(--g-muted);
            font-weight: 400;
            margin-top: 4px;
        }
        .stat-trend {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-size: 11px;
            font-weight: 700;
            margin-top: 10px;
            padding: 3px 8px;
            border-radius: 100px;
        }
        .stat-trend.up   { background: rgba(14,158,114,.1); color: var(--g-green); }
        .stat-trend.down { background: rgba(239,68,68,.08); color: #ef4444; }

        /* ══════════════ BOTTOM GRID ══════════════ */
        .bottom-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background: var(--g-white);
            border: 1px solid var(--g-border);
            border-radius: 16px;
            overflow: hidden;
        }
        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 20px 14px;
            border-bottom: 1px solid var(--g-border);
        }
        .card-title {
            font-size: 14px;
            font-weight: 700;
            color: var(--g-dark);
        }
        .card-sub {
            font-size: 12px;
            color: var(--g-muted);
            font-weight: 400;
            margin-top: 2px;
        }
        .card-link {
            font-size: 12px;
            font-weight: 700;
            color: var(--g-green);
            text-decoration: none;
            transition: color .2s;
        }
        .card-link:hover { color: var(--g-green-mid); }

        /* ══════════════ BALITA TABLE ══════════════ */
        .balita-table { width: 100%; border-collapse: collapse; }
        .balita-table th {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--g-muted);
            padding: 10px 20px;
            text-align: left;
            border-bottom: 1px solid var(--g-border);
            background: var(--g-bg);
        }
        .balita-table td {
            padding: 12px 20px;
            font-size: 13px;
            color: var(--g-text);
            border-bottom: 1px solid rgba(21,101,192,.05);
            font-weight: 400;
        }
        .balita-table tr:last-child td { border-bottom: none; }
        .balita-table tr:hover td { background: var(--g-bg); }

        .balita-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--g-green);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 900;
            color: #fff;
            margin-right: 8px;
            vertical-align: middle;
        }
        .balita-avatar.blue { background: var(--g-blue); }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 9px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 700;
        }
        .badge-normal  { background: rgba(14,158,114,.1);  color: var(--g-green); }
        .badge-stunting { background: rgba(245,158,11,.1); color: #D97706; }
        .badge-buruk   { background: rgba(239,68,68,.08);  color: #EF4444; }
        .badge-obesitas { background: rgba(99,102,241,.1); color: #6366F1; }
        .badge-none    { background: rgba(122,155,176,.12); color: var(--g-muted); }

        /* ══════════════ JADWAL LIST ══════════════ */
        .jadwal-list { padding: 8px 0; }
        .jadwal-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 14px 20px;
            border-bottom: 1px solid rgba(21,101,192,.05);
            transition: background .2s;
        }
        .jadwal-item:last-child { border-bottom: none; }
        .jadwal-item:hover { background: var(--g-bg); }

        .jadwal-date {
            flex-shrink: 0;
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: var(--g-green-lite);
            border: 1px solid var(--g-green-border);
        }
        .jadwal-date .day {
            font-size: 16px;
            font-weight: 900;
            color: var(--g-green);
            line-height: 1;
        }
        .jadwal-date .month {
            font-size: 9px;
            font-weight: 700;
            color: var(--g-green);
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .jadwal-info { flex: 1; }
        .jadwal-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--g-dark);
            margin-bottom: 3px;
        }
        .jadwal-meta {
            font-size: 12px;
            color: var(--g-muted);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .jadwal-meta span { display: flex; align-items: center; gap: 4px; }

        .tipe-badge {
            flex-shrink: 0;
            font-size: 10px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 6px;
            text-transform: uppercase;
            letter-spacing: .05em;
        }
        .tipe-posyandu  { background: rgba(14,158,114,.1);  color: var(--g-green); }
        .tipe-imunisasi { background: rgba(21,101,192,.1);  color: var(--g-blue); }
        .tipe-penyuluhan { background: rgba(99,102,241,.1); color: #6366F1; }

        /* ══════════════ RESPONSIVE ══════════════ */
        @media (max-width: 1024px) {
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .bottom-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main { margin-left: 0; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .content { padding: 20px 16px; }
            .topbar { padding: 14px 16px; }
        }
        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .topbar-date { display: none; }
        }
    </style>
</head>
<body>

@include('partials.admin-sidebar', ['active' => 'dashboard'])

<!-- ══════ MAIN ══════ -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="topbar-left">
            <h1>Dashboard Admin</h1>
            <p>Halo, {{ Auth::user()->nama_kader }}</p>
        </div>
        <div class="topbar-right">
            <span class="topbar-date"><i class="bi bi-calendar3"></i> {{ now()->translatedFormat('d F Y') }}</span>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- STAT CARDS -->
        <div class="stats-grid">
            <div class="stat-card green">
                <div class="stat-icon"><i class="bi bi-person-heart"></i></div>
                <div class="stat-num">{{ $totalBalita }}</div>
                <div class="stat-label">Total Balita Terdaftar</div>
            </div>
            <div class="stat-card blue">
                <div class="stat-icon"><i class="bi bi-clipboard2-pulse"></i></div>
                <div class="stat-num">{{ $totalPemeriksaan }}</div>
                <div class="stat-label">Pemeriksaan Bulan Ini</div>
            </div>
            <div class="stat-card teal">
                <div class="stat-icon"><i class="bi bi-calendar-check"></i></div>
                <div class="stat-num">{{ $jadwalBulanIni }}</div>
                <div class="stat-label">Kegiatan Bulan Ini</div>
            </div>
            <div class="stat-card indigo">
                <div class="stat-icon"><i class="bi bi-exclamation-triangle"></i></div>
                <div class="stat-num">{{ $balitaStunting }}</div>
                <div class="stat-label">Balita Perlu Perhatian</div>
            </div>
        </div>

        <!-- BOTTOM GRID -->
        <div class="bottom-grid">

            <!-- BALITA TERBARU -->
            <div class="card">
                <div class="card-header">
                    <div>
                        <div class="card-title">Balita Terbaru Didaftarkan</div>
                        <div class="card-sub">5 pendaftaran terakhir</div>
                    </div>
                    <a href="/balita" class="card-link">Lihat Semua <i class="bi bi-arrow-right"></i></a>
                </div>
                <table class="balita-table">
                    <thead>
                        <tr>
                            <th>Nama Balita</th>
                            <th>Usia</th>
                            <th>Status Gizi</th>
                            <th style="text-align:right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($balitaTerbaru as $balita)
                        @php
                            $status = $balita->status_gizi_terakhir;
                            if ($status) {
                                $badgeClass = match($status) {
                                    'stunting' => 'badge-stunting',
                                    'gizi_buruk' => 'badge-buruk',
                                    'obesitas' => 'badge-obesitas',
                                    default => 'badge-normal',
                                };
                                $statusLabel = ucwords(str_replace('_', ' ', $status));
                            } else {
                                $badgeClass = 'badge-none';
                                $statusLabel = 'Belum diperiksa';
                            }
                        @endphp
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center;">
                                    <span class="balita-avatar {{ $balita->jenis_kelamin === 'L' ? 'blue' : '' }}" style="flex-shrink: 0;">{{ strtoupper(substr($balita->nama_balita, 0, 1)) }}</span>
                                    <span style="line-height: 1.4; word-break: break-word;">{{ $balita->nama_balita }}</span>
                                </div>
                            </td>
                                <td>{{ $balita->umur_bulan }} bln</td>
                                <td><span class="badge {{ $badgeClass }}"><i class="bi bi-check-circle-fill"></i> {{ $statusLabel }}</span></td>
                                <td style="text-align:right">
                                <a href="{{ route('balita.grafik', $balita->id_balita) }}" style="font-size:12px;font-weight:700;color:var(--g-blue);text-decoration:none;display:inline-flex;align-items:center;gap:4px">
                                    <i class="bi bi-graph-up"></i> Grafik
                            </a>
                        </td>
                    </tr>
                        @empty
                        <tr>
                            <td colspan="4" style="text-align:center;color:var(--g-muted);padding:24px">Belum ada balita terdaftar</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- JADWAL MENDATANG -->
            <div class="card">
                <div class="card-header">
                    <div>
                        <div class="card-title">Jadwal Kegiatan Mendatang</div>
                        <div class="card-sub">Kegiatan yang akan datang</div>
                    </div>
                    <a href="/jadwal" class="card-link">Lihat Semua <i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="jadwal-list">
                    @forelse($jadwalMendatang as $j)
                    <div class="jadwal-item">
                        <div class="jadwal-date">
                            <div class="day">{{ \Carbon\Carbon::parse($j->tanggal)->format('d') }}</div>
                            <div class="month">{{ \Carbon\Carbon::parse($j->tanggal)->format('M') }}</div>
                        </div>
                        <div class="jadwal-info">
                            <div class="jadwal-name">{{ $j->nama_kegiatan }}</div>
                            <div class="jadwal-meta">
                                <span><i class="bi bi-geo-alt"></i> {{ $j->lokasi ?? 'Lokasi belum ditentukan' }}</span>
                            </div>
                        </div>
                        <span class="tipe-badge tipe-{{ $j->tipe_kegiatan }}">{{ ucfirst($j->tipe_kegiatan) }}</span>
                    </div>
                    @empty
                    <div style="padding:24px;text-align:center;color:var(--g-muted);font-size:13px">Belum ada jadwal mendatang</div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // Mobile sidebar toggle
    const sidebar = document.getElementById('sidebar');
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') sidebar.classList.remove('open');
    });
</script>
</body>
</html>

