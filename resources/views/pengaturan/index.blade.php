<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan – GENTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing:border-box; margin:0; padding:0; }
        :root { --g-bg:#F7FBFF; --g-green:#0E9E72; --g-green-lite:#E6F7F1; --g-green-border:rgba(14,158,114,.18); --g-blue:#1565C0; --g-blue-mid:#1976D2; --g-dark:#0A1628; --g-text:#1A2E3B; --g-text2:#3D5A6C; --g-muted:#7A9BB0; --g-border:rgba(21,101,192,.1); --g-white:#FFFFFF; --sidebar-w:240px; }
        body { font-family:'Lato',sans-serif; background:var(--g-bg); color:var(--g-text); display:flex; min-height:100vh; }

        .sidebar { width:var(--sidebar-w); background:var(--g-white); border-right:1px solid var(--g-border); display:flex; flex-direction:column; position:fixed; top:0; left:0; bottom:0; z-index:50; }
        .sidebar-brand { display:flex; align-items:center; gap:10px; padding:24px 20px 20px; border-bottom:1px solid var(--g-border); text-decoration:none; }
        .sidebar-brand span { font-size:17px; font-weight:900; color:var(--g-dark); }
        .sidebar-section { padding:20px 12px 8px; }
        .sidebar-section-label { font-size:10px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:var(--g-muted); padding:0 8px; margin-bottom:6px; }
        .nav-item { display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:10px; text-decoration:none; color:var(--g-text2); font-size:14px; margin-bottom:2px; }
        .nav-item:hover { background:var(--g-green-lite); color:var(--g-green); }
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
        .alert { padding:12px 16px; border-radius:10px; font-size:13px; font-weight:700; margin-bottom:20px; display:flex; align-items:center; gap:8px; background:var(--g-green-lite); border:1px solid var(--g-green-border); color:var(--g-green); }
        
        .settings-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; align-items: start; }
        @media(max-width: 900px) { .settings-grid { grid-template-columns: 1fr; } }
        
        .form-card { background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; padding:28px 32px; margin-bottom: 24px; }
        .form-card h2 { font-size:16px; font-weight:900; color:var(--g-dark); margin-bottom:20px; padding-bottom:14px; border-bottom:1px solid var(--g-border); display: flex; align-items: center; gap: 8px; }
        .form-card h2 i { color: var(--g-green); }
        .form-group { margin-bottom:16px; }
        label { display:block; font-size:13px; font-weight:700; color:var(--g-text2); margin-bottom:6px; }
        input[type="text"], input[type="password"], select { width:100%; padding:10px 14px; border:1.5px solid var(--g-border); border-radius:8px; font-family:'Lato',sans-serif; font-size:14px; background:var(--g-bg); color: var(--g-text); }
        .hint { font-size:12px; color:var(--g-muted); margin-top:4px; }
        .error { font-size:12px; color:#DC2626; margin-top:4px; }
        .section-label { font-size:11px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--g-green); margin:22px 0 12px; }
        
        .btn { display:inline-flex; align-items:center; gap:6px; padding:10px 24px; border-radius:8px; font-weight:700; cursor:pointer; font-size: 14px; font-family: 'Lato', sans-serif; text-decoration: none; border: 1px solid transparent; transition: .15s; }
        .btn-submit { background:var(--g-blue); color:#fff; }
        .btn-submit:hover { background:var(--g-blue-mid); }
        .btn-outline { background: var(--g-bg); color: var(--g-text); border-color: var(--g-border); }
        .btn-outline:hover { background: var(--g-green-lite); color: var(--g-green); border-color: var(--g-green-border); }
        .btn-solid { background: var(--g-green); color: #fff; }
        .btn-solid:hover { background: #0c8a63; }
        
        /* Toggle Switch CSS */
        .toggle-row { display: flex; align-items: center; justify-content: space-between; padding: 12px 0; border-bottom: 1px solid var(--g-border); }
        .toggle-row:last-child { border-bottom: none; }
        .toggle-label { font-size: 14px; font-weight: 700; color: var(--g-text); }
        .toggle-desc { font-size: 12px; color: var(--g-muted); margin-top: 2px; }
        
        .toggle-switch { position: relative; display: inline-block; width: 44px; height: 24px; flex-shrink: 0; }
        .toggle-switch input { opacity: 0; width: 0; height: 0; }
        .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: var(--g-border); transition: .3s; border-radius: 34px; }
        .slider:before { position: absolute; content: ""; height: 18px; width: 18px; left: 3px; bottom: 3px; background-color: white; transition: .3s; border-radius: 50%; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        input:checked + .slider { background-color: var(--g-green); }
        input:checked + .slider:before { transform: translateX(20px); }

        /* Table */
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 16px; font-size: 13px; text-align: left; border-bottom: 1px solid var(--g-border); }
        th { background: var(--g-bg); color: var(--g-muted); font-size: 11px; text-transform: uppercase; }
        td { color: var(--g-text); }

        .d-flex { display: flex; gap: 12px; align-items: center; margin-top: 16px; }
    </style>
</head>
<body class="{{ $user->dark_mode ? 'dark-mode' : '' }}">

@include('partials.admin-sidebar', ['active' => 'pengaturan'])

<div class="main">
    <div class="topbar">
        <h1>Pengaturan Akun</h1>
        <p>Kelola profil, keamanan, dan preferensi aplikasi</p>
    </div>

    <div class="content">
        @if(session('success'))
        <div class="alert"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
        @endif

        <div class="settings-grid">
            <!-- Col 1: Profil Kader -->
            <div>
                <div class="form-card">
                    <h2><i class="bi bi-person-circle"></i> Profil Kader</h2>
                    
                    <form method="POST" action="{{ route('pengaturan.update') }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="{{ $user->username }}" disabled>
                            <div class="hint">Username tidak bisa diubah.</div>
                        </div>
                        <div class="form-group">
                            <label>Nama Kader</label>
                            <input type="text" name="nama_kader" value="{{ old('nama_kader', $user->nama_kader) }}" required>
                            @error('nama_kader')<div class="error">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
                        </div>

                        <div class="section-label">Ganti Password</div>
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" name="password_lama">
                            @error('password_lama')<div class="error">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" name="password">
                            @error('password')<div class="error">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation">
                        </div>
                        
                        <div style="margin-top: 24px;">
                            <button type="submit" class="btn btn-submit" style="width: 100%; justify-content: center;">
                                <i class="bi bi-check-lg"></i> Simpan Profil
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Col 2: Preferensi & Laporan -->
            <div>
                <!-- Preferensi Tampilan & Notifikasi -->
                <div class="form-card">
                    <h2><i class="bi bi-bell-fill"></i> Notifikasi & Tampilan</h2>
                    
                    <form method="POST" action="{{ route('pengaturan.preferensi') }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="toggle-row">
                            <div>
                                <div class="toggle-label">Dark Mode</div>
                                <div class="toggle-desc">Ubah tampilan menjadi tema gelap.</div>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" name="dark_mode" {{ $user->dark_mode ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div class="toggle-row">
                            <div>
                                <div class="toggle-label">Reminder Jadwal Posyandu</div>
                                <div class="toggle-desc">Kirim notif WA h-1 sebelum kegiatan.</div>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" name="notif_jadwal" {{ ($user->notification_settings['notif_jadwal'] ?? false) ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <div class="toggle-row">
                            <div>
                                <div class="toggle-label">Reminder Pemeriksaan Ulang</div>
                                <div class="toggle-desc">Notifikasi untuk balita gizi buruk.</div>
                            </div>
                            <label class="toggle-switch">
                                <input type="checkbox" name="notif_pemeriksaan" {{ ($user->notification_settings['notif_pemeriksaan'] ?? false) ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                        </div>
                        
                        <div style="margin-top: 24px;">
                            <button type="submit" class="btn btn-submit" style="width: 100%; justify-content: center;">
                                <i class="bi bi-check-lg"></i> Simpan Pengaturan
                            </button>
                        </div>
                    </form>
                </div>
                    
                    <!-- Kelola Data -->
                    <div class="form-card">
                        <h2><i class="bi bi-file-earmark-pdf-fill"></i> Kelola Data & Laporan</h2>
                        <p class="hint" style="margin-bottom: 12px;">Pilih periode untuk mengunduh laporan PDF data kader dan statistik balita.</p>
                        
                        <div style="display: flex; gap: 12px;">
                            <select id="laporanBulan" style="flex:1">
                                @foreach($riwayatBulan as $r)
                                    <option value="{{ route('laporan.pdf', ['bulan' => $r->bulan, 'tahun' => $r->tahun]) }}" 
                                            {{ $r->bulan == $bulan && $r->tahun == $tahun ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($r->bulan)->translatedFormat('F') }} {{ $r->tahun }}
                                    </option>
                                @endforeach
                            </select>
                            
                            <a href="#" id="btnDownloadPdf" class="btn btn-solid">
                                <i class="bi bi-download"></i> Download PDF
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        <!-- Riwayat Keamanan -->
        <div class="form-card" style="max-width: 100%;">
            <h2><i class="bi bi-shield-lock-fill"></i> Riwayat Keamanan (5 Login Terakhir)</h2>
            <table>
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>IP Address</th>
                        <th>Perangkat (Device)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($loginLogs as $log)
                        <tr>
                            <td>{{ $log->login_at->format('d M Y, H:i') }}</td>
                            <td>{{ $log->ip_address ?? '-' }}</td>
                            <td>{{ Str::limit($log->device, 60) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" style="text-align: center; color: var(--g-muted)">Belum ada riwayat login</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    document.getElementById('btnDownloadPdf').addEventListener('click', function(e) {
        e.preventDefault();
        var sel = document.getElementById('laporanBulan');
        if(sel.value) {
            window.location.href = sel.value;
        } else {
            alert('Belum ada data periode laporan.');
        }
    });
</script>
</body>
</html>
