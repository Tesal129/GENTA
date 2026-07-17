<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=3" type="image/png">
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
        .topbar { background:var(--g-white); border-bottom:1px solid var(--g-border); padding:16px 32px; display: flex; justify-content: space-between; align-items: center; }
        .topbar h1 { font-size:20px; font-weight:900; color:var(--g-dark); }
        .topbar p { font-size:13px; color:var(--g-muted); margin-top:2px; }
        .btn-add { background: var(--g-blue); color: #fff; padding: 10px 16px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 700; display: inline-flex; align-items: center; gap: 6px; }
        .btn-add:hover { background: #1976D2; }
        .content { padding:28px 32px; }
        .edu-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:16px; }
        .edu-card { background:var(--g-white); border:1px solid var(--g-border); border-radius:16px; padding:22px; transition:transform .2s, box-shadow .2s; position: relative; display: flex; flex-direction: column; }
        .edu-card:hover { transform:translateY(-3px); box-shadow:0 8px 28px rgba(14,158,114,.1); }
        .edu-thumb { width: 100%; height: 140px; border-radius: 8px; object-fit: cover; margin-bottom: 14px; background: var(--g-bg2); }
        .edu-icon { width:44px; height:44px; border-radius:12px; background:var(--g-green-lite); color:var(--g-green); display:flex; align-items:center; justify-content:center; font-size:20px; margin-bottom:14px; }
        .edu-kategori { font-size:10px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--g-green); margin-bottom:6px; }
        .edu-judul { font-size:16px; font-weight:900; color:var(--g-dark); margin-bottom:8px; line-height:1.3; }
        .edu-ringkas { font-size:13px; color:var(--g-muted); line-height:1.6; flex: 1; }
        .edu-actions { margin-top: 16px; display: flex; gap: 8px; padding-top: 16px; border-top: 1px solid var(--g-border); }
        .btn-edit { background: rgba(21,101,192,.1); color: var(--g-blue); padding: 8px 12px; border-radius: 6px; text-decoration: none; font-size: 13px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; flex: 1; justify-content: center; }
        .btn-delete { background: rgba(220,53,69,.1); color: #dc3545; padding: 8px 12px; border-radius: 6px; border: none; cursor: pointer; font-size: 13px; font-weight: 700; display: inline-flex; align-items: center; gap: 4px; flex: 1; justify-content: center; }
        .badge-featured { position: absolute; top: 12px; right: 12px; background: #FFC107; color: #000; font-size: 10px; font-weight: 900; padding: 4px 8px; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,.1); }
        .alert { background: #E6F7F1; color: var(--g-green); padding: 12px 16px; border-radius: 8px; font-size: 14px; font-weight: 700; margin-bottom: 20px; }
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.open { transform: translateX(0); }
            .main { margin-left: 0; }
            .topbar { padding: 14px 16px; flex-direction: column; align-items: flex-start; gap: 12px; }
            .content { padding: 20px 16px; }
            .edu-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

@include('partials.admin-sidebar', ['active' => 'edukasi'])

<div class="main">
    <div class="topbar">
        <div>
            <h1>Konten Edukasi</h1>
            <p>Materi edukasi kesehatan ibu dan anak untuk kader posyandu</p>
        </div>
        <a href="{{ route('edukasi.create') }}" class="btn-add"><i class="bi bi-plus-lg"></i> Tambah Konten</a>
    </div>

    <div class="content">
        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div class="edu-grid">
            @forelse($konten as $item)
            <div class="edu-card">
                @if($item->is_featured)
                    <div class="badge-featured"><i class="bi bi-star-fill"></i> LANDING PAGE</div>
                @endif
                
                @if($item->gambar_thumbnail)
                    <img src="{{ Storage::url($item->gambar_thumbnail) }}" alt="{{ $item->judul }}" class="edu-thumb">
                @else
                    <div class="edu-icon"><i class="bi bi-book"></i></div>
                @endif
                
                <div class="edu-kategori">{{ $item->kategori }}</div>
                <div class="edu-judul">{{ $item->judul }}</div>
                <div class="edu-ringkas">{{ Str::limit($item->ringkasan, 80) }}</div>
                
                <div class="edu-actions">
                    <a href="{{ route('edukasi.edit', $item->id) }}" class="btn-edit"><i class="bi bi-pencil"></i> Edit</a>
                    <form action="{{ route('edukasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus konten ini?')" style="display:flex; flex:1;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete"><i class="bi bi-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: var(--g-muted);">
                    <i class="bi bi-inbox" style="font-size: 40px;"></i>
                    <p style="margin-top: 10px;">Belum ada konten edukasi. Silakan tambah baru.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
</body>
</html>
