<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kegiatan – GENTA</title>
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
        .btn-primary { display:inline-flex; align-items:center; gap:6px; padding:8px 18px; background:var(--g-blue); color:#fff; border-radius:8px; font-size:13px; font-weight:700; text-decoration:none; border:none; cursor:pointer; transition:all .2s; box-shadow:0 4px 14px rgba(21,101,192,.2); }
        .btn-primary:hover { background:var(--g-blue-mid); transform:translateY(-1px); color:#fff; }
        .btn-icon { width:30px; height:30px; border-radius:7px; display:inline-flex; align-items:center; justify-content:center; font-size:13px; text-decoration:none; border:none; cursor:pointer; transition:all .2s; }
        .btn-icon:hover { opacity:.8; transform:scale(1.05); }
        .btn-icon.edit   { background:rgba(21,101,192,.1); color:var(--g-blue); }
        .btn-icon.delete { background:rgba(239,68,68,.08); color:#DC2626; }
        .content { padding:28px 32px; flex:1; }
        .alert { padding:12px 16px; border-radius:10px; font-size:13px; font-weight:700; margin-bottom:20px; display:flex; align-items:center; gap:8px; }
        .alert-success { background:var(--g-green-lite); border:1px solid var(--g-green-border); color:var(--g-green); }

        /* JADWAL CARDS */
        .jadwal-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); gap:16px; }
        .jadwal-card { background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; padding:20px; transition:all .25s; position:relative; overflow:hidden; }
        .jadwal-card::before { content:''; position:absolute; top:0; left:0; right:0; height:3px; }
        .jadwal-card.posyandu::before  { background:var(--g-green); }
        .jadwal-card.imunisasi::before { background:var(--g-blue); }
        .jadwal-card.penyuluhan::before { background:#6366F1; }
        .jadwal-card:hover { transform:translateY(-3px); box-shadow:0 8px 28px rgba(14,158,114,.1); }
        .jadwal-card-top { display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:14px; }
        .jadwal-date-box { display:flex; flex-direction:column; align-items:center; justify-content:center; width:48px; height:48px; border-radius:12px; flex-shrink:0; }
        .jadwal-card.posyandu  .jadwal-date-box { background:var(--g-green-lite); }
        .jadwal-card.imunisasi .jadwal-date-box { background:rgba(21,101,192,.1); }
        .jadwal-card.penyuluhan .jadwal-date-box { background:rgba(99,102,241,.1); }
        .jadwal-date-box .day { font-size:18px; font-weight:900; line-height:1; }
        .jadwal-card.posyandu  .jadwal-date-box .day { color:var(--g-green); }
        .jadwal-card.imunisasi .jadwal-date-box .day { color:var(--g-blue); }
        .jadwal-card.penyuluhan .jadwal-date-box .day { color:#6366F1; }
        .jadwal-date-box .month { font-size:10px; font-weight:700; text-transform:uppercase; color:var(--g-muted); }
        .jadwal-actions { display:flex; gap:6px; }
        .jadwal-name { font-size:15px; font-weight:700; color:var(--g-dark); margin-bottom:8px; line-height:1.3; }
        .jadwal-meta { display:flex; flex-direction:column; gap:5px; }
        .jadwal-meta-item { display:flex; align-items:center; gap:7px; font-size:12px; color:var(--g-muted); }
        .jadwal-meta-item i { font-size:13px; }
        .tipe-badge { display:inline-flex; align-items:center; font-size:10px; font-weight:700; padding:3px 10px; border-radius:6px; text-transform:uppercase; letter-spacing:.05em; margin-top:12px; }
        .tipe-posyandu  { background:rgba(14,158,114,.1);  color:var(--g-green); }
        .tipe-imunisasi { background:rgba(21,101,192,.1);  color:var(--g-blue); }
        .tipe-penyuluhan { background:rgba(99,102,241,.1); color:#6366F1; }

        .toolbar { display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; }
        .empty-state { text-align:center; padding:60px 20px; background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; }
        .empty-state i { font-size:48px; color:var(--g-muted); opacity:.4; margin-bottom:16px; display:block; }
        .empty-state p { font-size:14px; color:var(--g-muted); margin-bottom:20px; }
        .pagination-wrap { margin-top:20px; display:flex; justify-content:flex-end; }
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
        <a href="/pemeriksaan" class="nav-item"><i class="bi bi-clipboard2-pulse"></i> Pemeriksaan</a>
        <a href="/jadwal" class="nav-item active"><i class="bi bi-calendar3"></i> Jadwal Kegiatan</a>
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
            <h1>Jadwal Kegiatan</h1>
            <p>Atur dan pantau jadwal posyandu, imunisasi, dan penyuluhan</p>
        </div>
        <a href="{{ route('jadwal.create') }}" class="btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Jadwal
        </a>
    </div>
    <div class="content">
        @if(session('success'))
        <div class="alert alert-success"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
        @endif

        @if($jadwals->count() > 0)
        <div class="toolbar">
            <div style="font-size:13px;color:var(--g-muted)">{{ $jadwals->total() }} kegiatan terjadwal</div>
        </div>
        <div class="jadwal-grid">
            @foreach($jadwals as $j)
            <div class="jadwal-card {{ $j->tipe_kegiatan }}">
                <div class="jadwal-card-top">
                    <div class="jadwal-date-box">
                        <div class="day">{{ \Carbon\Carbon::parse($j->tanggal)->format('d') }}</div>
                        <div class="month">{{ \Carbon\Carbon::parse($j->tanggal)->format('M') }}</div>
                    </div>
                    <div class="jadwal-actions">
                        <a href="{{ route('jadwal.edit', $j->id_jadwal) }}" class="btn-icon edit" title="Edit"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('jadwal.destroy', $j->id_jadwal) }}" onsubmit="return confirm('Hapus jadwal ini?')" style="margin:0">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-icon delete" title="Hapus"><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </div>
                <div class="jadwal-name">{{ $j->nama_kegiatan }}</div>
                <div class="jadwal-meta">
                    <div class="jadwal-meta-item"><i class="bi bi-geo-alt"></i> {{ $j->lokasi ?? 'Lokasi belum ditentukan' }}</div>
                    @if($j->keterangan)
                    <div class="jadwal-meta-item"><i class="bi bi-chat-text"></i> {{ Str::limit($j->keterangan, 60) }}</div>
                    @endif
                </div>
                <span class="tipe-badge tipe-{{ $j->tipe_kegiatan }}">{{ ucfirst($j->tipe_kegiatan) }}</span>
            </div>
            @endforeach
        </div>
        <div class="pagination-wrap">{{ $jadwals->links() }}</div>
        @else
        <div class="empty-state">
            <i class="bi bi-calendar3"></i>
            <p>Belum ada jadwal kegiatan.</p>
        </div>
        @endif
    </div>
</div>
</body>
</html>
