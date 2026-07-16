<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
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
        .nav-item:hover { background:#EEF9F4; color:var(--g-green); }
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
        .form-card { background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; padding:28px 32px; max-width:560px; }
        .form-card h2 { font-size:16px; font-weight:900; color:var(--g-dark); margin-bottom:20px; padding-bottom:14px; border-bottom:1px solid var(--g-border); }
        .form-group { margin-bottom:16px; }
        label { display:block; font-size:13px; font-weight:700; color:var(--g-text2); margin-bottom:6px; }
        input { width:100%; padding:10px 14px; border:1.5px solid var(--g-border); border-radius:8px; font-family:'Lato',sans-serif; font-size:14px; background:var(--g-bg); }
        .hint { font-size:12px; color:var(--g-muted); margin-top:4px; }
        .error { font-size:12px; color:#DC2626; margin-top:4px; }
        .section-label { font-size:11px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--g-green); margin:22px 0 12px; }
        .btn-submit { display:inline-flex; align-items:center; gap:6px; padding:10px 24px; background:var(--g-blue); color:#fff; border:none; border-radius:8px; font-weight:700; cursor:pointer; margin-top:8px; }
        .btn-submit:hover { background:var(--g-blue-mid); }
    </style>
</head>
<body>

@include('partials.admin-sidebar', ['active' => 'pengaturan'])

<div class="main">
    <div class="topbar">
        <h1>Pengaturan Akun</h1>
        <p>Kelola profil dan keamanan akun kamu</p>
    </div>

    <div class="content">
        @if(session('success'))
        <div class="alert"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
        @endif

        <div class="form-card">
            <h2><i class="bi bi-gear" style="color:var(--g-green);margin-right:8px"></i>Profil Kader</h2>
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

                <button type="submit" class="btn-submit"><i class="bi bi-check-lg"></i> Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

