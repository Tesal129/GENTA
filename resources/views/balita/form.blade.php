<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($balita) ? 'Edit' : 'Tambah' }} Balita – GENTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* ============================================================
           DESIGN TOKENS
        ============================================================ */
        :root {
            /* Backgrounds */
            --g-bg:              #F7FBFF;
            --g-bg2:             #EEF9F4;
            --g-white:           #FFFFFF;

            /* Brand colors */
            --g-green:           #0E9E72;
            --g-green-lite:      #E6F7F1;
            --g-green-border:    rgba(14, 158, 114, .18);
            --g-blue:            #1565C0;
            --g-blue-mid:        #1976D2;

            /* Text */
            --g-dark:            #0A1628;
            --g-text:            #1A2E3B;
            --g-text2:           #3D5A6C;
            --g-muted:           #7A9BB0;

            /* Borders */
            --g-border:          rgba(21, 101, 192, .1);

            /* Layout */
            --sidebar-w:         240px;
        }

        /* ============================================================
           RESET
        ============================================================ */
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* ============================================================
           BASE
        ============================================================ */
        body {
            font-family: 'Lato', sans-serif;
            background: var(--g-bg);
            color: var(--g-text);
            display: flex;
            min-height: 100vh;
        }

        /* ============================================================
           SIDEBAR
        ============================================================ */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--g-white);
            border-right: 1px solid var(--g-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 50;
        }

        /* Brand */
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 24px 20px 20px;
            border-bottom: 1px solid var(--g-border);
            text-decoration: none;
        }

        .sidebar-brand .brand-icon {
            width: 36px;
            height: 36px;
            background: var(--g-green);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-brand .brand-icon i {
            color: #fff;
            font-size: 16px;
        }

        .sidebar-brand span {
            font-weight: 900;
            font-size: 17px;
            color: var(--g-dark);
        }

        /* Nav sections */
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

        /* Nav items */
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

        .nav-item:hover  { background: var(--g-bg2);        color: var(--g-green); }
        .nav-item.active { background: var(--g-green-lite); color: var(--g-green); font-weight: 700; }

        .nav-badge {
            margin-left: auto;
            background: var(--g-green);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 100px;
        }

        /* Footer / user card */
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
            font-weight: 900;
            font-size: 13px;
            color: #fff;
            flex-shrink: 0;
        }

        .user-info .user-name { font-size: 13px; font-weight: 700; color: var(--g-dark); }
        .user-info .user-role { font-size: 11px; color: var(--g-muted); }

        .logout-btn {
            margin-left: auto;
            color: var(--g-muted);
            text-decoration: none;
            font-size: 16px;
            transition: color .2s;
        }

        .logout-btn:hover { color: #e53e3e; }

        /* ============================================================
           MAIN LAYOUT
        ============================================================ */
        .main {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
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

        .topbar-left h1 { font-size: 20px; font-weight: 900; color: var(--g-dark); }
        .topbar-left p  { font-size: 13px; color: var(--g-muted); margin-top: 2px; }

        /* Content area */
        .content {
            padding: 28px 32px;
            flex: 1;
        }

        /* ============================================================
           BUTTONS
        ============================================================ */
        .btn-secondary,
        .btn-submit,
        .btn-cancel {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 8px;
            font-family: 'Lato', sans-serif;
            font-weight: 700;
            cursor: pointer;
            transition: all .2s;
            text-decoration: none;
        }

        .btn-secondary {
            padding: 8px 18px;
            background: var(--g-white);
            color: var(--g-text2);
            font-size: 13px;
            border: 1px solid var(--g-border);
        }

        .btn-secondary:hover { background: var(--g-bg); color: var(--g-dark); }

        .btn-submit {
            padding: 10px 24px;
            background: var(--g-blue);
            color: #fff;
            font-size: 14px;
            border: none;
            box-shadow: 0 4px 14px rgba(21, 101, 192, .2);
        }

        .btn-submit:hover { background: var(--g-blue-mid); transform: translateY(-1px); }

        .btn-cancel {
            padding: 10px 20px;
            background: var(--g-white);
            color: var(--g-text2);
            font-size: 14px;
            border: 1.5px solid var(--g-border);
        }

        .btn-cancel:hover { background: var(--g-bg); }

        /* ============================================================
           FORM CARD
        ============================================================ */
        .form-card {
            background: var(--g-white);
            border: 1px solid var(--g-border);
            border-radius: 16px;
            padding: 28px 32px;
            max-width: 680px;
        }

        .form-card h2 {
            font-size: 16px;
            font-weight: 900;
            color: var(--g-dark);
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid var(--g-border);
        }

        /* Grid */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        /* Groups */
        .form-group      { display: flex; flex-direction: column; gap: 6px; }
        .form-group.full { grid-column: 1 / -1; }

        /* Labels */
        label    { font-size: 13px; font-weight: 700; color: var(--g-text2); }
        .required { color: #DC2626; margin-left: 2px; }

        /* Inputs */
        input,
        select,
        textarea {
            padding: 10px 14px;
            border: 1.5px solid var(--g-border);
            border-radius: 8px;
            font-size: 14px;
            font-family: 'Lato', sans-serif;
            color: var(--g-text);
            background: var(--g-bg);
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: rgba(14, 158, 114, .45);
            background: var(--g-white);
            box-shadow: 0 0 0 3px rgba(14, 158, 114, .08);
        }

        input.is-invalid,
        select.is-invalid,
        textarea.is-invalid {
            border-color: rgba(239, 68, 68, .5);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Validation message */
        .invalid-feedback {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 12px;
            color: #DC2626;
        }

        /* Form actions */
        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--g-border);
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
    <a href="/dashboard" class="sidebar-brand">
        <img src="{{ asset('https://www.image2url.com/r2/default/images/1780470981952-c4f72cc3-af32-42ae-9228-d8a982bc998a.png') }}" alt="Logo GENTA" style="width:38px; height:38px; border-radius:8px;">
        <span>GENTA</span>
    </a>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Menu Utama</div>
        <a href="/dashboard" class="nav-item"><i class="bi bi-grid-1x2-fill"></i> Dashboard</a>
        <a href="/balita" class="nav-item active"><i class="bi bi-person-heart"></i> Data Balita</a>
        <a href="/pemeriksaan" class="nav-item"><i class="bi bi-clipboard2-pulse"></i> Pemeriksaan</a>
        <a href="/jadwal" class="nav-item"><i class="bi bi-calendar3"></i> Jadwal Kegiatan</a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Laporan</div>
        <a href="/laporan" class="nav-item"><i class="bi bi-bar-chart-line"></i> Statistik & Laporan</a>
        <a href="/edukasi" class="nav-item"><i class="bi bi-book"></i> Konten Edukasi</a>
    </div>
    <div class="sidebar-section">
        <div class="sidebar-section-label">Sistem</div>
        <a href="/kelola-user" class="nav-item"><i class="bi bi-people"></i> Kelola Kader</a>
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

<!-- MAIN -->
<div class="main">
    <div class="topbar">
        <div class="topbar-left">
            <h1>{{ isset($balita) ? 'Edit Data Balita' : 'Tambah Balita Baru' }}</h1>
            <p>{{ isset($balita) ? 'Perbarui informasi data balita' : 'Isi form berikut untuk mendaftarkan balita baru' }}</p>
        </div>
        <a href="{{ route('balita.index') }}" class="btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="content">
        <div class="form-card">
            <h2><i class="bi bi-person-heart" style="color:var(--g-green);margin-right:8px"></i>Data Balita</h2>

            <form method="POST" action="{{ isset($balita) ? route('balita.update', $balita->id_balita) : route('balita.store') }}">
                @csrf
                @if(isset($balita)) @method('PUT') @endif

                <div class="form-grid">
                    <!-- Nama Balita -->
                    <div class="form-group full">
                        <label>Nama Balita <span class="required">*</span></label>
                        <input type="text" name="nama_balita" value="{{ old('nama_balita', $balita->nama_balita ?? '') }}" placeholder="Masukkan nama lengkap balita" class="{{ $errors->has('nama_balita') ? 'is-invalid' : '' }}">
                        @error('nama_balita') <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div> @enderror
                    </div>

                    <!-- NIK -->
                    <div class="form-group">
                        <label>NIK Balita</label>
                        <input type="text" name="nik_balita" value="{{ old('nik_balita', $balita->nik_balita ?? '') }}" placeholder="16 digit NIK" maxlength="16" class="{{ $errors->has('nik_balita') ? 'is-invalid' : '' }}">
                        @error('nik_balita') <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div> @enderror
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="form-group">
                        <label>Tanggal Lahir <span class="required">*</span></label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', isset($balita) ? $balita->tanggal_lahir : '') }}" class="{{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}">
                        @error('tanggal_lahir') <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div> @enderror
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="form-group">
                        <label>Jenis Kelamin <span class="required">*</span></label>
                        <select name="jenis_kelamin" class="{{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}">
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ old('jenis_kelamin', $balita->jenis_kelamin ?? '') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $balita->jenis_kelamin ?? '') === 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin') <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div> @enderror
                    </div>

                    <!-- Nama Ibu -->
                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" name="nama_ibu" value="{{ old('nama_ibu', $balita->nama_ibu ?? '') }}" placeholder="Nama ibu kandung">
                    </div>

                    <!-- Nama Ayah -->
                    <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" name="nama_ayah" value="{{ old('nama_ayah', $balita->nama_ayah ?? '') }}" placeholder="Nama ayah kandung">
                    </div>

                    <!-- Alamat -->
                    <div class="form-group full">
                        <label>Alamat</label>
                        <textarea name="alamat" placeholder="Alamat lengkap tempat tinggal">{{ old('alamat', $balita->alamat ?? '') }}</textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-lg"></i> {{ isset($balita) ? 'Simpan Perubahan' : 'Tambah Balita' }}
                    </button>
                    <a href="{{ route('balita.index') }}" class="btn-cancel">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
