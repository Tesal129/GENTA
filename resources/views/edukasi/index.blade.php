<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konten Edukasi – GENTA</title>
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
        .edu-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px; }
        .edu-card { background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; padding:22px; transition:transform .2s, box-shadow .2s; }
        .edu-card:hover { transform:translateY(-3px); box-shadow:0 8px 28px rgba(14,158,114,.1); }
        .edu-icon { width:44px; height:44px; border-radius:12px; background:var(--g-green-lite); color:var(--g-green); display:flex; align-items:center; justify-content:center; font-size:20px; margin-bottom:14px; }
        .edu-kategori { font-size:10px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--g-green); margin-bottom:6px; }
        .edu-judul { font-size:16px; font-weight:900; color:var(--g-dark); margin-bottom:8px; line-height:1.3; }
        .edu-ringkas { font-size:13px; color:var(--g-muted); line-height:1.6; }
    </style>
</head>
<body>

@include('partials.admin-sidebar', ['active' => 'edukasi'])

<div class="main">
    <div class="topbar">
        <h1>Konten Edukasi</h1>
        <p>Materi edukasi kesehatan ibu dan anak untuk kader posyandu</p>
    </div>

    <div class="content">
        <div class="edu-grid">
            @foreach($konten as $item)
            <div class="edu-card">
                <div class="edu-icon"><i class="bi {{ $item['icon'] }}"></i></div>
                <div class="edu-kategori">{{ $item['kategori'] }}</div>
                <div class="edu-judul">{{ $item['judul'] }}</div>
                <div class="edu-ringkas">{{ $item['ringkas'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>



