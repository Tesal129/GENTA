<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pendaftaran – GENTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>

        /* ══════════════ RESET & BASE ══════════════ */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
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

        body { font-family: 'Lato', sans-serif; background: var(--g-bg); color: var(--g-text); display: flex; min-height: 100vh; }

        /* ══════════════ SIDEBAR & LAYOUT ══════════════ */
        /* Duplicate from index for simplicity */
        .sidebar { width: var(--sidebar-w); background: var(--g-white); border-right: 1px solid var(--g-border); display: flex; flex-direction: column; position: fixed; top: 0; left: 0; bottom: 0; z-index: 50; }
        .sidebar-brand { display: flex; align-items: center; gap: 10px; padding: 24px 20px 20px; border-bottom: 1px solid var(--g-border); text-decoration: none; }
        .sidebar-brand img { width: 36px; height: 36px; border-radius: 9px; }
        .sidebar-brand span { font-size: 17px; font-weight: 900; color: var(--g-dark); }
        .sidebar-section { padding: 20px 12px 8px; }
        .sidebar-section-label { font-size: 10px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--g-muted); padding: 0 8px; margin-bottom: 6px; }
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 10px; text-decoration: none; color: var(--g-text2); font-size: 14px; font-weight: 400; transition: all .2s; margin-bottom: 2px; }
        .nav-item i { font-size: 16px; width: 18px; text-align: center; }
        .nav-item:hover { background: var(--g-bg2); color: var(--g-green); }
        .nav-item.active { background: var(--g-green-lite); color: var(--g-green); font-weight: 700; }
        .main { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; }
        .topbar { background: var(--g-white); border-bottom: 1px solid var(--g-border); padding: 16px 32px; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 40; }
        .topbar-left h1 { font-size: 20px; font-weight: 900; color: var(--g-dark); }
        .topbar-left p { font-size: 13px; color: var(--g-muted); margin-top: 2px; font-weight: 400; }
        .content { padding: 28px 32px; flex: 1; }

        /* ══════════════ ALERTS & CARDS ══════════════ */
        .alert { padding: 12px 16px; border-radius: 10px; font-size: 13px; font-weight: 700; margin-bottom: 20px; display: flex; align-items: center; gap: 8px; }
        .alert-success { background: var(--g-green-lite); border: 1px solid var(--g-green-border); color: var(--g-green); }
        .alert-danger { background: rgba(239, 68, 68, .08); border: 1px solid rgba(239, 68, 68, .2); color: #DC2626; }
        
        .card { background: var(--g-white); border: 1px solid var(--g-border); border-radius: 16px; overflow: hidden; margin-bottom: 20px; }
        .card-header { display: flex; align-items: center; justify-content: space-between; padding: 16px 20px; border-bottom: 1px solid var(--g-border); }
        .card-title { font-size: 14px; font-weight: 700; color: var(--g-dark); }
        .card-sub { font-size: 12px; color: var(--g-muted); margin-top: 2px; font-weight: 400; }

        /* ══════════════ VERIFIKASI ITEM ══════════════ */
        .v-item { display: flex; flex-wrap: wrap; gap: 24px; padding: 24px; border-bottom: 1px solid var(--g-border); }
        .v-item:last-child { border-bottom: none; }
        
        .v-kk-preview { flex-shrink: 0; width: 280px; height: 180px; background: var(--g-bg); border-radius: 12px; overflow: hidden; border: 1px solid var(--g-border); cursor: pointer; position: relative; }
        .v-kk-preview img { width: 100%; height: 100%; object-fit: cover; }
        .v-kk-preview::after { content: 'Klik untuk perbesar'; position: absolute; inset: 0; background: rgba(10,22,40,.6); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 13px; font-weight: 700; opacity: 0; transition: opacity .2s; }
        .v-kk-preview:hover::after { opacity: 1; }
        
        .v-details { flex: 1; min-width: 300px; display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .v-field { font-size: 13px; }
        .v-field span { display: block; color: var(--g-muted); font-size: 11px; text-transform: uppercase; letter-spacing: .05em; font-weight: 700; margin-bottom: 4px; }
        .v-field strong { color: var(--g-dark); font-size: 14px; }
        
        .v-actions { width: 100%; display: flex; gap: 12px; margin-top: 12px; padding-top: 16px; border-top: 1px dashed var(--g-border); }
        .btn-approve { background: var(--g-green); color: #fff; border: none; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 700; cursor: pointer; transition: .2s; }
        .btn-approve:hover { background: var(--g-green-mid); }
        .btn-reject { background: #fff; border: 1.5px solid #DC2626; color: #DC2626; padding: 8px 16px; border-radius: 8px; font-size: 13px; font-weight: 700; cursor: pointer; transition: .2s; }
        .btn-reject:hover { background: rgba(220, 38, 38, .05); }

        .empty-state { text-align: center; padding: 60px 20px; }
        .empty-state i { font-size: 48px; color: var(--g-muted); opacity: .4; margin-bottom: 16px; display: block; }
        .empty-state p { font-size: 14px; color: var(--g-muted); margin-bottom: 20px; font-weight: 400; }

        /* Modal for KK */
        .modal-overlay { position: fixed; inset: 0; background: rgba(10,22,40,.8); z-index: 100; display: none; align-items: center; justify-content: center; padding: 40px; }
        .modal-overlay.open { display: flex; }
        .modal-content { position: relative; max-width: 900px; width: 100%; max-height: 90vh; text-align: center; }
        .modal-content img { max-width: 100%; max-height: 90vh; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,.3); }
        .modal-close { position: absolute; top: -40px; right: 0; background: none; border: none; color: #fff; font-size: 32px; cursor: pointer; }

    </style>
</head>
<body class="{{ auth()->check() && auth()->user()->dark_mode ? 'dark-mode' : '' }}">

<!-- ══════ SIDEBAR ══════ -->
@include('partials.admin-sidebar', ['active' => 'verifikasi'])

<!-- ══════ MAIN ══════ -->
<div class="main">
    <div class="topbar">
        <div class="topbar-left">
            <h1>Verifikasi Pendaftaran</h1>
            <p>Periksa dan validasi pendaftaran mandiri balita</p>
        </div>
    </div>

    <div class="content">
        @if(session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
        </div>
        @endif

        @error('alasan_penolakan')
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-circle-fill"></i> {{ $message }}
        </div>
        @enderror

        <div class="card">
            <div class="card-header">
                <div>
                    <div class="card-title">Daftar Menunggu Verifikasi</div>
                    <div class="card-sub">{{ $balitas->count() }} balita perlu diperiksa</div>
                </div>
            </div>

            @if($balitas->count() > 0)
                <div class="v-list">
                    @foreach($balitas as $balita)
                        <div class="v-item">
                            @if($balita->foto_kk)
                                <div class="v-kk-preview" onclick="openKk('{{ route('verifikasi.kk', $balita->foto_kk) }}')">
                                    <img src="{{ route('verifikasi.kk', $balita->foto_kk) }}" alt="Foto KK">
                                </div>
                            @else
                                <div class="v-kk-preview" style="display:flex;align-items:center;justify-content:center;background:#eee;color:#999;font-size:12px;">
                                    Tidak ada foto KK
                                </div>
                            @endif

                            <div class="v-details">
                                <div class="v-field"><span>Nama Balita</span><strong>{{ $balita->nama_balita }}</strong></div>
                                <div class="v-field"><span>NIK Balita</span><strong>{{ $balita->nik_balita }}</strong></div>
                                <div class="v-field"><span>Tanggal Lahir</span><strong>{{ \Carbon\Carbon::parse($balita->tanggal_lahir)->format('d M Y') }}</strong></div>
                                <div class="v-field"><span>Jenis Kelamin</span><strong>{{ $balita->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</strong></div>
                                <div class="v-field"><span>Nama Ibu</span><strong>{{ $balita->nama_ibu }}</strong></div>
                                <div class="v-field"><span>Nama Ayah</span><strong>{{ $balita->nama_ayah ?: '-' }}</strong></div>
                                <div class="v-field"><span>No HP Ortu</span><strong>{{ $balita->no_hp_ortu }}</strong></div>
                                <div class="v-field"><span>Alamat</span><strong>{{ $balita->alamat }}</strong></div>

                                <div class="v-actions">
                                    <form action="{{ route('verifikasi.approve', $balita->id_balita) }}" method="POST" onsubmit="return confirm('Yakin menyetujui data ini?');">
                                        @csrf
                                        <button type="submit" class="btn-approve"><i class="bi bi-check-lg"></i> Setujui</button>
                                    </form>
                                    
                                    <form action="{{ route('verifikasi.reject', $balita->id_balita) }}" method="POST" style="display: flex; gap: 8px;">
                                        @csrf
                                        <input type="text" name="alasan_penolakan" placeholder="Alasan tolak..." required style="padding: 6px 12px; border: 1px solid var(--g-border); border-radius: 6px; font-size: 12px; outline: none;">
                                        <button type="submit" class="btn-reject" onclick="return confirm('Yakin menolak data ini?');"><i class="bi bi-x-lg"></i> Tolak</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-check-circle"></i>
                    <p>Hore! Semua pendaftaran sudah diverifikasi.</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal Foto KK -->
<div class="modal-overlay" id="kkModal" onclick="closeKk()">
    <div class="modal-content" onclick="event.stopPropagation()">
        <button class="modal-close" onclick="closeKk()">&times;</button>
        <img id="kkModalImage" src="" alt="Kartu Keluarga">
    </div>
</div>

<script>
    function openKk(url) {
        document.getElementById('kkModalImage').src = url;
        document.getElementById('kkModal').classList.add('open');
    }
    function closeKk() {
        document.getElementById('kkModal').classList.remove('open');
        document.getElementById('kkModalImage').src = '';
    }
</script>

</body>
</html>
