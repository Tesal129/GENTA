<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Balita – GENTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>

        /* ══════════════ RESET & BASE ══════════════ */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --g-bg:           #F7FBFF;
            --g-bg2:          #EEF9F4;
            --g-green:        #0E9E72;
            --g-green-mid:    #12BC88;
            --g-green-lite:   #E6F7F1;
            --g-green-border: rgba(14, 158, 114, .18);
            --g-blue:         #1565C0;
            --g-blue-mid:     #1976D2;
            --g-dark:         #0A1628;
            --g-text:         #1A2E3B;
            --g-text2:        #3D5A6C;
            --g-muted:        #7A9BB0;
            --g-border:       rgba(21, 101, 192, .1);
            --g-white:        #FFFFFF;
            --sidebar-w:      240px;
        }

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
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 24px 20px 20px;
            border-bottom: 1px solid var(--g-border);
            text-decoration: none;
        }

        .sidebar-brand img {
            width: 36px;
            height: 36px;
            border-radius: 9px;
        }

        .sidebar-brand span {
            font-size: 17px;
            font-weight: 900;
            color: var(--g-dark);
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

        .nav-item i {
            font-size: 16px;
            width: 18px;
            text-align: center;
        }

        .nav-item:hover {
            background: var(--g-bg2);
            color: var(--g-green);
        }

        .nav-item.active {
            background: var(--g-green-lite);
            color: var(--g-green);
            font-weight: 700;
        }

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
            font-size: 13px;
            font-weight: 900;
            color: #fff;
            flex-shrink: 0;
        }

        .user-info .user-name {
            font-size: 13px;
            font-weight: 700;
            color: var(--g-dark);
        }

        .user-info .user-role {
            font-size: 11px;
            color: var(--g-muted);
        }

        .logout-btn {
            margin-left: auto;
            color: var(--g-muted);
            background: none;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: color .2s;
        }

        .logout-btn:hover {
            color: #e53e3e;
        }

        /* ══════════════ MAIN LAYOUT ══════════════ */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
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
        }

        .topbar-left p {
            font-size: 13px;
            color: var(--g-muted);
            margin-top: 2px;
            font-weight: 400;
        }

        /* ══════════════ BUTTONS ══════════════ */
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
            box-shadow: 0 4px 14px rgba(21, 101, 192, .2);
        }

        .btn-primary:hover {
            background: var(--g-blue-mid);
            transform: translateY(-1px);
            color: #fff;
        }

        .btn-icon {
            width: 30px;
            height: 30px;
            border-radius: 7px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all .2s;
        }

        .btn-icon:hover {
            opacity: .8;
            transform: scale(1.05);
        }

        .btn-icon.view   { background: rgba(14, 158, 114, .1); color: var(--g-green); }
        .btn-icon.edit   { background: rgba(21, 101, 192, .1); color: var(--g-blue); }
        .btn-icon.delete { background: rgba(239, 68, 68, .08); color: #DC2626; }

        /* ══════════════ CONTENT ══════════════ */
        .content {
            padding: 28px 32px;
            flex: 1;
        }

        /* ══════════════ ALERTS ══════════════ */
        .alert {
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-success {
            background: var(--g-green-lite);
            border: 1px solid var(--g-green-border);
            color: var(--g-green);
        }

        .alert-danger {
            background: rgba(239, 68, 68, .08);
            border: 1px solid rgba(239, 68, 68, .2);
            color: #DC2626;
        }

        /* ══════════════ TOOLBAR ══════════════ */
        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 12px;
        }

        .search-wrap {
            position: relative;
            flex: 1;
            max-width: 320px;
        }

        .search-wrap i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--g-muted);
            font-size: 14px;
        }

        .search-input {
            width: 100%;
            padding: 9px 14px 9px 36px;
            border: 1px solid var(--g-border);
            border-radius: 8px;
            font-size: 13px;
            font-family: 'Lato', sans-serif;
            background: var(--g-white);
            color: var(--g-text);
            outline: none;
            transition: border-color .2s;
        }

        .search-input:focus {
            border-color: rgba(14, 158, 114, .4);
        }

        /* ══════════════ CARD ══════════════ */
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
            padding: 16px 20px;
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
            margin-top: 2px;
            font-weight: 400;
        }

        /* ══════════════ TABLE ══════════════ */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--g-muted);
            padding: 12px 20px;
            text-align: left;
            background: var(--g-bg);
            border-bottom: 1px solid var(--g-border);
        }

        tbody td {
            padding: 13px 20px;
            font-size: 13px;
            color: var(--g-text);
            border-bottom: 1px solid rgba(21, 101, 192, .05);
            font-weight: 400;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover td {
            background: var(--g-bg);
        }

        .nama-cell {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .balita-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--g-green);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 900;
            color: #fff;
            flex-shrink: 0;
        }

        .balita-avatar.blue {
            background: var(--g-blue);
        }

        .action-btns {
            display: flex;
            gap: 6px;
        }

        /* ══════════════ BADGES ══════════════ */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 100px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-L { background: rgba(21, 101, 192, .1); color: var(--g-blue); }
        .badge-P { background: rgba(236, 72, 153, .1); color: #DB2777; }

        /* ══════════════ PAGINATION ══════════════ */
        .pagination-wrap {
            padding: 16px 20px;
            border-top: 1px solid var(--g-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .pagination-info {
            font-size: 12px;
            color: var(--g-muted);
        }

        /* ══════════════ EMPTY STATE ══════════════ */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 48px;
            color: var(--g-muted);
            opacity: .4;
            margin-bottom: 16px;
            display: block;
        }

        .empty-state p {
            font-size: 14px;
            color: var(--g-muted);
            margin-bottom: 20px;
            font-weight: 400;
        }

    </style>
</head>
<body>

<!-- ══════ SIDEBAR ══════ -->
<aside class="sidebar">
    <a href="/dashboard" class="sidebar-brand">
        <img src="{{ asset('https://www.image2url.com/r2/default/images/1780470981952-c4f72cc3-af32-42ae-9228-d8a982bc998a.png') }}" alt="Logo GENTA" style="width:38px; height:38px; border-radius:8px;">
        <span>GENTA</span>
    </a>

    <div class="sidebar-section">
        <div class="sidebar-section-label">Menu Utama</div>
        <a href="/dashboard" class="nav-item">
            <i class="bi bi-grid-1x2-fill"></i> Dashboard
        </a>
        <a href="/balita" class="nav-item active">
            <i class="bi bi-person-heart"></i> Data Balita
            <span class="nav-badge">{{ \App\Models\Balita::count() }}</span>
        </a>
        <a href="/pemeriksaan" class="nav-item">
            <i class="bi bi-clipboard2-pulse"></i> Pemeriksaan
        </a>
        <a href="/jadwal" class="nav-item">
            <i class="bi bi-calendar3"></i> Jadwal Kegiatan
        </a>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-section-label">Laporan</div>
        <a href="/laporan" class="nav-item">
            <i class="bi bi-bar-chart-line"></i> Statistik & Laporan
        </a>
        <a href="/edukasi" class="nav-item">
            <i class="bi bi-book"></i> Konten Edukasi
        </a>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-section-label">Sistem</div>
        <a href="/kelola-user" class="nav-item">
            <i class="bi bi-people"></i> Kelola Kader
        </a>
        <a href="/pengaturan" class="nav-item">
            <i class="bi bi-gear"></i> Pengaturan
        </a>
    </div>

    <div class="sidebar-footer">
        <div class="user-card">
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->nama_kader, 0, 1)) }}
            </div>
            <div class="user-info">
                <div class="user-name">{{ Auth::user()->nama_kader }}</div>
                <div class="user-role">{{ ucfirst(Auth::user()->role) }}</div>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="margin:0">
                @csrf
                <button type="submit" class="logout-btn" title="Keluar">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</aside>

<!-- ══════ MAIN ══════ -->
<div class="main">
    <!-- TOPBAR -->
        <a href="{{ route('balita.create') }}" class="btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Balita
        </a>
    </div>

    <!-- CONTENT -->
    <div class="content">

        @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}
        </div>
        @endif

        <div class="toolbar">
            <form method="GET" action="{{ route('balita.index') }}" style="flex:1;max-width:320px">
                <div class="search-wrap">
                    <i class="bi bi-search"></i>
                    <input
                        type="text"
                        name="search"
                        class="search-input"
                        placeholder="Cari nama balita..."
                        value="{{ request('search') }}"
                    >
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-title">Daftar Balita</div>
                    <div class="card-sub">Total {{ $balitas->total() }} balita terdaftar</div>
                </div>
            </div>

            @if($balitas->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nama Balita</th>
                        <th>NIK</th>
                        <th>Tgl Lahir</th>
                        <th>Kelamin</th>
                        <th>Nama Ibu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($balitas as $balita)
                    <tr>
                        <td>
                            <div class="nama-cell">
                                <div class="balita-avatar {{ $balita->jenis_kelamin === 'L' ? 'blue' : '' }}">
                                    {{ strtoupper(substr($balita->nama_balita, 0, 1)) }}
                                </div>
                                {{ $balita->nama_balita }}
                            </div>
                        </td>
                        <td>{{ $balita->nik_balita ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($balita->tanggal_lahir)->format('d M Y') }}</td>
                        <td>
                            <span class="badge badge-{{ $balita->jenis_kelamin }}">
                                {{ $balita->jenis_kelamin === 'L' ? '♂ Laki-laki' : '♀ Perempuan' }}
                            </span>
                        </td>
                        <td>{{ $balita->nama_ibu ?? '-' }}</td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('balita.edit', $balita->id_balita) }}" class="btn-icon edit" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('balita.destroy', $balita->id_balita) }}" onsubmit="return confirm('Hapus data balita ini?')" style="margin:0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon delete" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination-wrap">
                <div class="pagination-info">
                    Menampilkan {{ $balitas->firstItem() }}–{{ $balitas->lastItem() }} dari {{ $balitas->total() }}
                </div>
                <div>
                    {{ $balitas->links() }}
                </div>
            </div>

            @else
            <div class="empty-state">
                <i class="bi bi-person-heart"></i>
                <p>Belum ada data balita.</p>
                </a>
            </div>
            @endif
        </div>

    </div>
</div>

</body>
</html>