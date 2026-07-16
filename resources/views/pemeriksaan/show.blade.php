<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemeriksaan – GENTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --g-bg:#F7FBFF; --g-bg2:#EEF9F4; --g-green:#0E9E72; --g-green-lite:#E6F7F1;
            --g-green-border:rgba(14,158,114,.18); --g-blue:#1565C0; --g-blue-mid:#1976D2;
            --g-dark:#0A1628; --g-text:#1A2E3B; --g-text2:#3D5A6C; --g-muted:#7A9BB0;
            --g-border:rgba(21,101,192,.1); --g-white:#FFFFFF; --sidebar-w:240px;
        }
        body { font-family:'Lato',sans-serif; background:var(--g-bg); color:var(--g-text); display:flex; min-height:100vh; }
        .sidebar { width:var(--sidebar-w); background:var(--g-white); border-right:1px solid var(--g-border); display:flex; flex-direction:column; position:fixed; top:0; left:0; bottom:0; z-index:50; }
        .sidebar-brand { display:flex; align-items:center; gap:10px; padding:24px 20px 20px; border-bottom:1px solid var(--g-border); text-decoration:none; }
        .sidebar-brand img { width:36px; height:36px; border-radius:9px; }
        .sidebar-brand span { font-size:17px; font-weight:900; color:var(--g-dark); }
        .sidebar-section { padding:20px 12px 8px; }
        .sidebar-section-label { font-size:10px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:var(--g-muted); padding:0 8px; margin-bottom:6px; }
        .nav-item { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; text-decoration:none; color:var(--g-text2); font-size:14px; font-weight:400; transition:all .2s; margin-bottom:2px; }
        .nav-item i { font-size:16px; width:18px; text-align:center; }
        .nav-item:hover { background:var(--g-bg2); color:var(--g-green); }
        .nav-item.active { background:var(--g-green-lite); color:var(--g-green); font-weight:700; }
        .nav-badge { margin-left:auto; background:var(--g-green); color:#fff; font-size:10px; font-weight:700; padding:2px 7px; border-radius:100px; }
        .sidebar-footer { margin-top:auto; padding:16px 12px; border-top:1px solid var(--g-border); }
        .user-card { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; background:var(--g-bg); border:1px solid var(--g-border); }
        .user-avatar { width:34px; height:34px; border-radius:50%; background:var(--g-blue); display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:900; color:#fff; flex-shrink:0; }
        .user-info .user-name { font-size:13px; font-weight:700; color:var(--g-dark); }
        .user-info .user-role { font-size:11px; color:var(--g-muted); }
        .logout-btn { margin-left:auto; color:var(--g-muted); background:none; border:none; font-size:16px; cursor:pointer; transition:color .2s; }
        .logout-btn:hover { color:#e53e3e; }
        .main { margin-left:var(--sidebar-w); flex:1; display:flex; flex-direction:column; }
        .topbar { background:var(--g-white); border-bottom:1px solid var(--g-border); padding:16px 32px; display:flex; align-items:center; justify-content:space-between; position:sticky; top:0; z-index:40; }
        .topbar-left h1 { font-size:20px; font-weight:900; color:var(--g-dark); }
        .topbar-left p { font-size:13px; color:var(--g-muted); font-weight:400; margin-top:2px; }
        .topbar-actions { display:flex; gap:10px; }
        .btn-secondary { display:inline-flex; align-items:center; gap:6px; padding:8px 18px; background:var(--g-white); color:var(--g-text2); border-radius:8px; font-size:13px; font-weight:700; text-decoration:none; border:1px solid var(--g-border); transition:all .2s; }
        .btn-secondary:hover { background:var(--g-bg); }
        .btn-primary { display:inline-flex; align-items:center; gap:6px; padding:8px 18px; background:var(--g-blue); color:#fff; border-radius:8px; font-size:13px; font-weight:700; text-decoration:none; border:none; cursor:pointer; transition:all .2s; }
        .btn-primary:hover { background:var(--g-blue-mid); color:#fff; }
        .content { padding:28px 32px; flex:1; }
        .detail-card { background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; overflow:hidden; max-width:700px; }
        .detail-header { padding:20px 24px; border-bottom:1px solid var(--g-border); display:flex; align-items:center; justify-content:space-between; }
        .detail-header-info h2 { font-size:18px; font-weight:900; color:var(--g-dark); }
        .detail-header-info p { font-size:13px; color:var(--g-muted); margin-top:4px; }
        .badge { display:inline-flex; align-items:center; gap:4px; padding:5px 14px; border-radius:100px; font-size:12px; font-weight:700; }
        .badge-normal    { background:rgba(14,158,114,.1);  color:var(--g-green); }
        .badge-stunting  { background:rgba(245,158,11,.1);  color:#D97706; }
        .badge-gizi_buruk{ background:rgba(239,68,68,.08);  color:#EF4444; }
        .badge-obesitas  { background:rgba(99,102,241,.1);  color:#6366F1; }
        .detail-body { padding:24px; }
        .detail-section-label { font-size:11px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--g-green); margin-bottom:14px; margin-top:20px; }
        .detail-section-label:first-child { margin-top:0; }
        .detail-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
        .detail-item { display:flex; flex-direction:column; gap:4px; }
        .detail-item .lbl { font-size:11px; font-weight:700; color:var(--g-muted); text-transform:uppercase; letter-spacing:.06em; }
        .detail-item .val { font-size:15px; font-weight:700; color:var(--g-dark); }
        .detail-item.full { grid-column:1 / -1; }
        .metric-card { background:var(--g-bg); border:1px solid var(--g-border); border-radius:12px; padding:16px; text-align:center; }
        .metric-card .metric-val { font-size:28px; font-weight:900; color:var(--g-green); line-height:1; }
        .metric-card .metric-unit { font-size:13px; color:var(--g-muted); margin-top:2px; }
        .metric-card .metric-lbl { font-size:11px; color:var(--g-muted); margin-top:6px; font-weight:700; text-transform:uppercase; letter-spacing:.06em; }
        .catatan-box { background:var(--g-bg); border:1px solid var(--g-border); border-radius:10px; padding:14px; font-size:14px; color:var(--g-text2); line-height:1.7; margin-top:4px; }
    </style>
</head>
<body>
<aside class="sidebar">
    <a href="/dashboard" class="sidebar-brand">
        <img src="{{ asset('https://www.image2url.com/r2/default/images/1780470981952-c4f72cc3-af32-42ae-9228-d8a982bc998a.png') }}" alt="Logo GENTA">
        <span>GENTA</span>
    </a>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Menu Utama</div>
        <a href="/dashboard" class="nav-item"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
        <a href="/balita" class="nav-item"><i class="bi bi-person-heart"></i> Data Balita <span class="nav-badge">{{ \App\Models\Balita::count() }}</span></a>
        <a href="/pemeriksaan" class="nav-item active"><i class="bi bi-clipboard2-pulse"></i> Pemeriksaan</a>
        <a href="/jadwal" class="nav-item"><i class="bi bi-calendar3"></i> Jadwal Kegiatan</a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Laporan</div>
        <a href="/laporan" class="nav-item"><i class="bi bi-bar-chart-line"></i> Statistik & Laporan</a>
        <a href="/edukasi" class="nav-item"><i class="bi bi-book"></i> Konten Edukasi</a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Sistem</div>
        <a href="{{ route('kader.index') }}" class="nav-item"><i class="bi bi-people"></i> Kelola Kader</a>
        <a href="/pengaturan" class="nav-item"><i class="bi bi-gear"></i> Pengaturan</a>
    </div>
    <div class="sidebar-footer">
        <div class="user-card">
            <div class="user-avatar">{{ strtoupper(substr(Auth::user()->nama_kader, 0, 1)) }}</div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->nama_kader }}</div>
                <div class="user-role">{{ ucfirst(Auth::user()->role) }}</div>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin:0">
                @csrf
                <button type="submit" class="logout-btn" title="Keluar"><i class="bi bi-box-arrow-right"></i></button>
            </form>
        </div>
    </div>
</aside>

<div class="main">
    <div class="topbar">
        <div class="topbar-left">
            <h1>Detail Pemeriksaan</h1>
            <p>{{ $pemeriksaan->balita->nama_balita ?? '-' }} · {{ \Carbon\Carbon::parse($pemeriksaan->tanggal_periksa)->format('d M Y') }}</p>
        </div>
        <div class="topbar-actions">
            <a href="{{ route('pemeriksaan.edit', $pemeriksaan->id_pemeriksaan) }}" class="btn-primary"><i class="bi bi-pencil"></i> Edit</a>
            <a href="{{ route('pemeriksaan.index') }}" class="btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="content">
        <div class="detail-card">
            <div class="detail-header">
                <div class="detail-header-info">
                    <h2>{{ $pemeriksaan->balita->nama_balita ?? '-' }}</h2>
                    <p>Diperiksa oleh {{ $pemeriksaan->user->nama_kader ?? '-' }} · {{ \Carbon\Carbon::parse($pemeriksaan->tanggal_periksa)->format('d F Y') }}</p>
                </div>
                <span class="badge badge-{{ $pemeriksaan->status_gizi }}">
                    {{ ucwords(str_replace('_', ' ', $pemeriksaan->status_gizi)) }}
                </span>
            </div>
            <div class="detail-body">
                <div class="detail-section-label">Hasil Pengukuran</div>
                <div class="detail-grid">
                    <div class="metric-card">
                        <div class="metric-val">{{ $pemeriksaan->berat_badan }}</div>
                        <div class="metric-unit">kg</div>
                        <div class="metric-lbl">Berat Badan</div>
                    </div>
                    <div class="metric-card">
                        <div class="metric-val">{{ $pemeriksaan->tinggi_badan }}</div>
                        <div class="metric-unit">cm</div>
                        <div class="metric-lbl">Tinggi Badan</div>
                    </div>
                    @if($pemeriksaan->lingkar_kepala)
                    <div class="metric-card">
                        <div class="metric-val">{{ $pemeriksaan->lingkar_kepala }}</div>
                        <div class="metric-unit">cm</div>
                        <div class="metric-lbl">Lingkar Kepala</div>
                    </div>
                    @endif
                    @if($pemeriksaan->lingkar_lengan)
                    <div class="metric-card">
                        <div class="metric-val">{{ $pemeriksaan->lingkar_lengan }}</div>
                        <div class="metric-unit">cm</div>
                        <div class="metric-lbl">Lingkar Lengan</div>
                    </div>
                    @endif
                </div>

                @if($pemeriksaan->catatan)
                <div class="detail-section-label" style="margin-top:20px">Catatan Kader</div>
                <div class="catatan-box">{{ $pemeriksaan->catatan }}</div>
                @endif

                <div class="detail-section-label" style="margin-top:20px">Info Balita</div>
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="lbl">Nama</div>
                        <div class="val">{{ $pemeriksaan->balita->nama_balita ?? '-' }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="lbl">Umur saat periksa</div>
                        <div class="val">{{ \Carbon\Carbon::parse($pemeriksaan->balita->tanggal_lahir)->diffInMonths($pemeriksaan->tanggal_periksa) }} bulan</div>
                    </div>
                    <div class="detail-item">
                        <div class="lbl">Jenis Kelamin</div>
                        <div class="val">{{ $pemeriksaan->balita->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                    </div>
                    <div class="detail-item">
                        <div class="lbl">Nama Ibu</div>
                        <div class="val">{{ $pemeriksaan->balita->nama_ibu ?? '-' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

