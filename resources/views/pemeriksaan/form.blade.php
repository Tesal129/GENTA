<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($pemeriksaan) ? 'Edit' : 'Tambah' }} Pemeriksaan – GENTA</title>
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
        .btn-secondary { display:inline-flex; align-items:center; gap:6px; padding:8px 18px; background:var(--g-white); color:var(--g-text2); border-radius:8px; font-size:13px; font-weight:700; text-decoration:none; border:1px solid var(--g-border); cursor:pointer; transition:all .2s; }
        .btn-secondary:hover { background:var(--g-bg); color:var(--g-dark); }
        .content { padding:28px 32px; flex:1; }
        .form-card { background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; padding:28px 32px; max-width:700px; }
        .form-card h2 { font-size:16px; font-weight:900; color:var(--g-dark); margin-bottom:24px; padding-bottom:16px; border-bottom:1px solid var(--g-border); }
        .form-card h2 i { color:var(--g-green); margin-right:8px; }
        .form-section-label { font-size:11px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--g-green); margin:22px 0 14px; display:flex; align-items:center; gap:6px; }
        .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:18px; }
        .form-group { display:flex; flex-direction:column; gap:6px; }
        .form-group.full { grid-column:1 / -1; }
        label { font-size:13px; font-weight:700; color:var(--g-text2); }
        .required { color:#DC2626; margin-left:2px; }
        input, select, textarea { padding:10px 14px; border:1.5px solid var(--g-border); border-radius:8px; font-size:14px; font-family:'Lato',sans-serif; color:var(--g-text); background:var(--g-bg); outline:none; transition:border-color .2s,box-shadow .2s; width:100%; }
        input:focus, select:focus, textarea:focus { border-color:rgba(14,158,114,.45); background:var(--g-white); box-shadow:0 0 0 3px rgba(14,158,114,.08); }
        input.is-invalid, select.is-invalid { border-color:rgba(239,68,68,.5); }
        textarea { resize:vertical; min-height:80px; }
        .invalid-feedback { font-size:12px; color:#DC2626; display:flex; align-items:center; gap:4px; }
        .hint { font-size:12px; color:var(--g-muted); margin-top:4px; }
        .form-actions { display:flex; gap:12px; margin-top:24px; padding-top:20px; border-top:1px solid var(--g-border); }
        .btn-submit { display:inline-flex; align-items:center; gap:6px; padding:10px 24px; background:var(--g-blue); color:#fff; border-radius:8px; font-size:14px; font-weight:700; font-family:'Lato',sans-serif; border:none; cursor:pointer; transition:all .2s; box-shadow:0 4px 14px rgba(21,101,192,.2); }
        .btn-submit:hover { background:var(--g-blue-mid); transform:translateY(-1px); }
        .btn-cancel { display:inline-flex; align-items:center; gap:6px; padding:10px 20px; background:var(--g-white); color:var(--g-text2); border-radius:8px; font-size:14px; font-weight:700; text-decoration:none; border:1.5px solid var(--g-border); transition:all .2s; }
        .btn-cancel:hover { background:var(--g-bg); }
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
            <h1>{{ isset($pemeriksaan) ? 'Edit Pemeriksaan' : 'Tambah Pemeriksaan' }}</h1>
            <p>{{ isset($pemeriksaan) ? 'Perbarui data hasil pemeriksaan' : 'Catat hasil pemeriksaan tumbuh kembang balita' }}</p>
        </div>
        <a href="{{ route('pemeriksaan.index') }}" class="btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="content">
        <div class="form-card">
            <h2><i class="bi bi-clipboard2-pulse"></i>Data Pemeriksaan</h2>

            <form method="POST" action="{{ isset($pemeriksaan) ? route('pemeriksaan.update', $pemeriksaan->id_pemeriksaan) : route('pemeriksaan.store') }}">
                @csrf
                @if(isset($pemeriksaan)) @method('PUT') @endif

                <div class="form-section-label"><i class="bi bi-person-heart"></i> Info Balita & Waktu</div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Balita <span class="required">*</span></label>
                        <select name="Balita_id_balita" class="{{ $errors->has('Balita_id_balita') ? 'is-invalid' : '' }}">
                            <option value="">-- Pilih Balita --</option>
                            @foreach($balitas as $b)
                            <option value="{{ $b->id_balita }}" {{ old('Balita_id_balita', $pemeriksaan->Balita_id_balita ?? '') == $b->id_balita ? 'selected' : '' }}>
                                {{ $b->nama_balita }}
                            </option>
                            @endforeach
                        </select>
                        @error('Balita_id_balita')<div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Tanggal Periksa <span class="required">*</span></label>
                        <input type="date" name="tanggal_periksa" value="{{ old('tanggal_periksa', isset($pemeriksaan) ? $pemeriksaan->tanggal_periksa : '') }}" class="{{ $errors->has('tanggal_periksa') ? 'is-invalid' : '' }}">
                        @error('tanggal_periksa')<div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-section-label"><i class="bi bi-rulers"></i> Hasil Pengukuran</div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>Berat Badan (kg) <span class="required">*</span></label>
                        <input type="number" step="0.01" name="berat_badan" value="{{ old('berat_badan', $pemeriksaan->berat_badan ?? '') }}" placeholder="cth: 8.5" class="{{ $errors->has('berat_badan') ? 'is-invalid' : '' }}">
                        @error('berat_badan')<div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Tinggi Badan (cm) <span class="required">*</span></label>
                        <input type="number" step="0.01" name="tinggi_badan" value="{{ old('tinggi_badan', $pemeriksaan->tinggi_badan ?? '') }}" placeholder="cth: 72.5" class="{{ $errors->has('tinggi_badan') ? 'is-invalid' : '' }}">
                        @error('tinggi_badan')<div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label>Lingkar Kepala (cm)</label>
                        <input type="number" step="0.01" name="lingkar_kepala" value="{{ old('lingkar_kepala', $pemeriksaan->lingkar_kepala ?? '') }}" placeholder="cth: 43.2">
                    </div>
                    <div class="form-group">
                        <label>Lingkar Lengan (cm)</label>
                        <input type="number" step="0.01" name="lingkar_lengan" value="{{ old('lingkar_lengan', $pemeriksaan->lingkar_lengan ?? '') }}" placeholder="cth: 14.5">
                    </div>
                    <div class="form-group full">
                        <label>Catatan</label>
                        <textarea name="catatan" placeholder="Catatan tambahan dari kader...">{{ old('catatan', $pemeriksaan->catatan ?? '') }}</textarea>
                        <div class="hint"><i class="bi bi-info-circle"></i> Status gizi akan dihitung otomatis berdasarkan data di atas.</div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-lg"></i> {{ isset($pemeriksaan) ? 'Simpan Perubahan' : 'Simpan Pemeriksaan' }}
                    </button>
                    <a href="{{ route('pemeriksaan.index') }}" class="btn-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>