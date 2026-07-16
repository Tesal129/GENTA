<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemeriksaan – GENTA</title>
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
        .sidebar-brand span { font-size:17px; font-weight:900; color:var(--g-dark); }
        .sidebar-section { padding:20px 12px 8px; }
        .sidebar-section-label { font-size:10px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:var(--g-muted); padding:0 8px; margin-bottom:6px; }
        .nav-item { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; text-decoration:none; color:var(--g-text2); font-size:14px; transition:all .2s; margin-bottom:2px; }
        .nav-item i { font-size:16px; width:18px; text-align:center; }
        .nav-item:hover { background:var(--g-bg2); color:var(--g-green); }
        .nav-item.active { background:var(--g-green-lite); color:var(--g-green); font-weight:700; }
        .nav-badge { margin-left:auto; background:var(--g-green); color:#fff; font-size:10px; font-weight:700; padding:2px 7px; border-radius:100px; }
        .sidebar-footer { margin-top:auto; padding:16px 12px; border-top:1px solid var(--g-border); }
        .user-card { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; background:var(--g-bg); border:1px solid var(--g-border); }
        .user-avatar { width:34px; height:34px; border-radius:50%; background:var(--g-blue); display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:900; color:#fff; }
        .user-info .user-name { font-size:13px; font-weight:700; color:var(--g-dark); }
        .user-info .user-role { font-size:11px; color:var(--g-muted); }
        .logout-btn { margin-left:auto; color:var(--g-muted); background:none; border:none; font-size:16px; cursor:pointer; }
        .logout-btn:hover { color:#e53e3e; }
        .main { margin-left:var(--sidebar-w); flex:1; display:flex; flex-direction:column; }
        .topbar { background:var(--g-white); border-bottom:1px solid var(--g-border); padding:16px 32px; display:flex; align-items:center; justify-content:space-between; position:sticky; top:0; z-index:40; }
        .topbar-left h1 { font-size:20px; font-weight:900; color:var(--g-dark); }
        .topbar-left p { font-size:13px; color:var(--g-muted); margin-top:2px; }
        .btn-primary { display:inline-flex; align-items:center; gap:6px; padding:8px 18px; background:var(--g-blue); color:#fff; border-radius:8px; font-size:13px; font-weight:700; text-decoration:none; box-shadow:0 4px 14px rgba(21,101,192,.2); }
        .btn-primary:hover { background:var(--g-blue-mid); color:#fff; }
        .content { padding:28px 32px; flex:1; }
        .alert { padding:12px 16px; border-radius:10px; font-size:13px; font-weight:700; margin-bottom:20px; display:flex; align-items:center; gap:8px; }
        .alert-success { background:var(--g-green-lite); border:1px solid var(--g-green-border); color:var(--g-green); }
        .card { background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; overflow:hidden; }
        .card-header { padding:18px 24px; border-bottom:1px solid var(--g-border); display:flex; align-items:center; justify-content:space-between; }
        .card-title { font-size:15px; font-weight:900; color:var(--g-dark); }
        .card-sub { font-size:12px; color:var(--g-muted); margin-top:2px; }
        table { width:100%; border-collapse:collapse; }
        th { text-align:left; font-size:11px; font-weight:700; letter-spacing:.06em; text-transform:uppercase; color:var(--g-muted); padding:12px 24px; background:var(--g-bg); border-bottom:1px solid var(--g-border); }
        td { padding:14px 24px; border-bottom:1px solid rgba(21,101,192,.05); font-size:13px; vertical-align:middle; }
        tr:last-child td { border-bottom:none; }
        tr:hover td { background:var(--g-bg); }
        .nama-cell { display:flex; align-items:center; gap:10px; font-weight:700; color:var(--g-dark); }
        .balita-avatar { width:32px; height:32px; border-radius:50%; background:var(--g-green-lite); color:var(--g-green); display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:900; flex-shrink:0; }
        .balita-avatar.blue { background:rgba(21,101,192,.1); color:var(--g-blue); }
        .badge { display:inline-flex; align-items:center; gap:4px; padding:4px 10px; border-radius:100px; font-size:11px; font-weight:700; }
        .badge-normal { background:rgba(14,158,114,.1); color:var(--g-green); }
        .badge-stunting { background:rgba(245,158,11,.1); color:#D97706; }
        .badge-gizi_buruk { background:rgba(239,68,68,.08); color:#EF4444; }
        .badge-obesitas { background:rgba(99,102,241,.1); color:#6366F1; }
        .badge-none { background:rgba(122,155,176,.12); color:var(--g-muted); }
        .action-btns { display:flex; gap:6px; }
        .btn-icon { width:30px; height:30px; border-radius:7px; display:inline-flex; align-items:center; justify-content:center; font-size:13px; text-decoration:none; border:none; cursor:pointer; }
        .btn-icon.view { background:rgba(14,158,114,.1); color:var(--g-green); }
        .btn-icon.edit { background:rgba(21,101,192,.1); color:var(--g-blue); }
        .btn-icon.delete { background:rgba(239,68,68,.08); color:#DC2626; }
        .empty-state { text-align:center; padding:60px 20px; }
        .empty-state i { font-size:48px; color:var(--g-muted); opacity:.4; display:block; margin-bottom:16px; }
        .empty-state p { font-size:14px; color:var(--g-muted); margin-bottom:20px; }
        .pagination-wrap { padding:16px 24px; display:flex; align-items:center; justify-content:space-between; border-top:1px solid var(--g-border); }
        .pagination-info { font-size:12px; color:var(--g-muted); }
    </style>
</head>
<body>

@include('partials.admin-sidebar', ['active' => 'pemeriksaan'])

<div class="main">
    <div class="topbar">
        <div class="topbar-left">
            <h1>Pemeriksaan Balita</h1>
            <p>Catat dan pantau hasil pemeriksaan tumbuh kembang</p>
        </div>
        <a href="{{ route('pemeriksaan.create') }}" class="btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Pemeriksaan
        </a>
    </div>

    <div class="content">
        @if(session('success'))
        <div class="alert alert-success"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-title">Riwayat Pemeriksaan</div>
                    <div class="card-sub">Total {{ $pemeriksaans->total() }} pemeriksaan tercatat</div>
                </div>
            </div>

            @if($pemeriksaans->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Balita</th>
                        <th>Tanggal</th>
                        <th>Berat</th>
                        <th>Tinggi</th>
                        <th>Status Gizi</th>
                        <th>Kader</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemeriksaans as $p)
                    <tr>
                        <td>
                            <div class="nama-cell">
                                <div class="balita-avatar {{ ($p->balita->jenis_kelamin ?? 'P') === 'L' ? 'blue' : '' }}">
                                    {{ strtoupper(substr($p->balita->nama_balita ?? '?', 0, 1)) }}
                                </div>
                                {{ $p->balita->nama_balita ?? '-' }}
                            </div>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_periksa)->format('d M Y') }}</td>
                        <td>{{ $p->berat_badan }} kg</td>
                        <td>{{ $p->tinggi_badan }} cm</td>
                        <td>
                            @if($p->status_gizi)
                            <span class="badge badge-{{ $p->status_gizi }}">
                                {{ ucwords(str_replace('_', ' ', $p->status_gizi)) }}
                            </span>
                            @else
                            <span class="badge badge-none">Belum ada</span>
                            @endif
                        </td>
                        <td>{{ $p->user->nama_kader ?? '-' }}</td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('pemeriksaan.show', $p->id_pemeriksaan) }}" class="btn-icon view" title="Detail"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('pemeriksaan.edit', $p->id_pemeriksaan) }}" class="btn-icon edit" title="Edit"><i class="bi bi-pencil"></i></a>
                                <form method="POST" action="{{ route('pemeriksaan.destroy', $p->id_pemeriksaan) }}" onsubmit="return confirm('Hapus pemeriksaan ini?')" style="margin:0">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-icon delete" title="Hapus"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-wrap">
                <div class="pagination-info">Menampilkan {{ $pemeriksaans->firstItem() }}–{{ $pemeriksaans->lastItem() }} dari {{ $pemeriksaans->total() }}</div>
                <div>{{ $pemeriksaans->links() }}</div>
            </div>
            @else
            <div class="empty-state">
                <i class="bi bi-clipboard2-pulse"></i>
                <p>Belum ada data pemeriksaan.</p>
            </div>
            @endif
        </div>
    </div>
</div>
</body>
</html>



