<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik & Laporan – GENTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing:border-box; margin:0; padding:0; }
        :root { --g-bg:#F7FBFF; --g-bg2:#EEF9F4; --g-green:#0E9E72; --g-green-lite:#E6F7F1; --g-blue:#1565C0; --g-dark:#0A1628; --g-text:#1A2E3B; --g-muted:#7A9BB0; --g-border:rgba(21,101,192,.1); --g-white:#FFFFFF; --sidebar-w:240px; }
        body { font-family:'Lato',sans-serif; background:var(--g-bg); color:var(--g-text); display:flex; min-height:100vh; }
        .sidebar { width:var(--sidebar-w); background:var(--g-white); border-right:1px solid var(--g-border); display:flex; flex-direction:column; position:fixed; top:0; left:0; bottom:0; z-index:50; }
        .sidebar-brand { display:flex; align-items:center; gap:10px; padding:24px 20px 20px; border-bottom:1px solid var(--g-border); text-decoration:none; }
        .sidebar-brand span { font-size:17px; font-weight:900; color:var(--g-dark); }
        .sidebar-section { padding:20px 12px 8px; }
        .sidebar-section-label { font-size:10px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:var(--g-muted); padding:0 8px; margin-bottom:6px; }
        .nav-item { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; text-decoration:none; color:var(--g-text2); font-size:14px; margin-bottom:2px; }
        .nav-item:hover { background:var(--g-bg2); color:var(--g-green); }
        .nav-item.active { background:var(--g-green-lite); color:var(--g-green); font-weight:700; }
        .nav-badge { margin-left:auto; background:var(--g-green); color:#fff; font-size:10px; font-weight:700; padding:2px 7px; border-radius:100px; }
        .sidebar-footer { margin-top:auto; padding:16px 12px; border-top:1px solid var(--g-border); }
        .user-card { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; background:var(--g-bg); border:1px solid var(--g-border); }
        .user-avatar { width:34px; height:34px; border-radius:50%; background:var(--g-blue); display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:900; color:#fff; }
        .user-info .user-name { font-size:13px; font-weight:700; }
        .user-info .user-role { font-size:11px; color:var(--g-muted); }
        .logout-btn { margin-left:auto; background:none; border:none; color:var(--g-muted); cursor:pointer; }
        .main { margin-left:var(--sidebar-w); flex:1; }
        .topbar { background:var(--g-white); border-bottom:1px solid var(--g-border); padding:16px 32px; }
        .topbar h1 { font-size:20px; font-weight:900; color:var(--g-dark); }
        .topbar p { font-size:13px; color:var(--g-muted); margin-top:2px; }
        .content { padding:28px 32px; }
        .stats-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:16px; margin-bottom:24px; }
        .stat-card { background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; padding:20px; }
        .stat-num { font-size:28px; font-weight:900; color:var(--g-green); }
        .stat-label { font-size:12px; color:var(--g-muted); margin-top:4px; }
        .grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px; }
        .card { background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; overflow:hidden; }
        .card-header { padding:16px 20px; border-bottom:1px solid var(--g-border); font-weight:900; color:var(--g-dark); }
        .stat-row { display:flex; justify-content:space-between; padding:12px 20px; border-bottom:1px solid rgba(21,101,192,.05); font-size:13px; }
        .stat-row:last-child { border-bottom:none; }
        .stat-row strong { color:var(--g-dark); }
        table { width:100%; border-collapse:collapse; }
        th, td { padding:12px 20px; font-size:13px; text-align:left; border-bottom:1px solid rgba(21,101,192,.05); }
        th { background:var(--g-bg); color:var(--g-muted); font-size:11px; text-transform:uppercase; }
        @media (max-width:1024px) { .stats-grid { grid-template-columns:1fr 1fr; } .grid-2 { grid-template-columns:1fr; } }
    </style>
</head>
<body>

@include('partials.admin-sidebar', ['active' => 'laporan'])

<div class="main">
    <div class="topbar">
        <h1>Statistik & Laporan</h1>
        <p>Ringkasan data posyandu GENTA</p>
    </div>

    <div class="content">
        <div class="stats-grid">
            <div class="stat-card"><div class="stat-num">{{ $totalBalita }}</div><div class="stat-label">Total Balita</div></div>
            <div class="stat-card"><div class="stat-num">{{ $totalPemeriksaan }}</div><div class="stat-label">Total Pemeriksaan</div></div>
            <div class="stat-card"><div class="stat-num">{{ $statusGizi->get('normal', 0) }}</div><div class="stat-label">Status Normal</div></div>
            <div class="stat-card"><div class="stat-num">{{ $statusGizi->get('stunting', 0) + $statusGizi->get('gizi_buruk', 0) }}</div><div class="stat-label">Perlu Perhatian</div></div>
        </div>

        <div class="grid-2">
            <div class="card">
                <div class="card-header">Distribusi Status Gizi</div>
                @forelse($statusGizi as $status => $total)
                <div class="stat-row"><span>{{ ucwords(str_replace('_', ' ', $status)) }}</span><strong>{{ $total }}</strong></div>
                @empty
                <div class="stat-row"><span>Belum ada data</span><strong>0</strong></div>
                @endforelse
            </div>
            <div class="card">
                <div class="card-header">Kegiatan per Tipe</div>
                @forelse($kegiatanPerTipe as $tipe => $total)
                <div class="stat-row"><span>{{ ucfirst($tipe) }}</span><strong>{{ $total }}</strong></div>
                @empty
                <div class="stat-row"><span>Belum ada jadwal</span><strong>0</strong></div>
                @endforelse
            </div>
        </div>

        <div class="card">
            <div class="card-header">Pemeriksaan Terbaru</div>
            <table>
                <thead><tr><th>Balita</th><th>Tanggal</th><th>Berat</th><th>Tinggi</th><th>Status</th></tr></thead>
                <tbody>
                    @forelse($pemeriksaanTerbaru as $p)
                    <tr>
                        <td>{{ $p->balita->nama_balita ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_periksa)->format('d M Y') }}</td>
                        <td>{{ $p->berat_badan }} kg</td>
                        <td>{{ $p->tinggi_badan }} cm</td>
                        <td>{{ $p->status_gizi ? ucwords(str_replace('_', ' ', $p->status_gizi)) : '-' }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" style="text-align:center;color:var(--g-muted)">Belum ada pemeriksaan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
