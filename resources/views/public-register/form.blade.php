<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Balita – GENTA</title>
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
            --g-error:        #E05C5C;
        }

        body {
            font-family: 'Lato', sans-serif;
            background: linear-gradient(160deg, #F7FBFF 0%, #EEF7FF 40%, #E6F7F1 100%);
            color: var(--g-text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
            padding: 40px 16px;
        }

        body::before {
            content: '';
            position: fixed;
            top: -15%; right: -10%;
            width: 60vw; height: 70vh;
            background: radial-gradient(ellipse, rgba(21, 101, 192, .07) 0%, transparent 65%);
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -10%; left: -5%;
            width: 45vw; height: 55vh;
            background: radial-gradient(ellipse, rgba(14, 158, 114, .09) 0%, transparent 65%);
            pointer-events: none;
        }

        .bg-grid {
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(14, 158, 114, .07) 1px, transparent 1px);
            background-size: 36px 36px;
            pointer-events: none;
        }

        /* ══════════════ CARD WRAP ══════════════ */
        .card-wrap {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 520px;
            animation: fadeUp .6s ease forwards;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ══════════════ BRAND ══════════════ */
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            margin-bottom: 28px;
            text-decoration: none;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            background: var(--g-green);
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-icon i {
            color: #fff;
            font-size: 19px;
        }

        .brand-name {
            font-size: 22px;
            font-weight: 900;
            color: var(--g-dark);
            letter-spacing: .02em;
        }

        /* ══════════════ AUTH CARD ══════════════ */
        .auth-card {
            background: var(--g-white);
            border: 1px solid var(--g-border);
            border-radius: 24px;
            padding: 36px 32px;
            box-shadow: 0 12px 48px rgba(21, 101, 192, .1);
        }

        .auth-card h1 {
            font-size: 22px;
            font-weight: 900;
            letter-spacing: -.02em;
            color: var(--g-dark);
            margin-bottom: 6px;
        }

        .auth-card .subtitle {
            font-size: 14px;
            color: var(--g-muted);
            font-weight: 400;
            margin-bottom: 26px;
        }

        /* ══════════════ ALERTS ══════════════ */
        .alert-success {
            background: var(--g-green-lite);
            border: 1px solid var(--g-green-border);
            border-radius: 10px;
            padding: 13px 16px;
            font-size: 13px;
            color: var(--g-green);
            margin-bottom: 22px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-weight: 700;
        }

        .alert-error {
            background: rgba(224, 92, 92, .08);
            border: 1px solid rgba(224, 92, 92, .25);
            border-radius: 10px;
            padding: 11px 14px;
            font-size: 13px;
            color: #C53030;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ══════════════ FORM SECTIONS ══════════════ */
        .form-section-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--g-green);
            margin: 22px 0 12px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .form-section-label:first-of-type {
            margin-top: 0;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        /* ══════════════ FORM ELEMENTS ══════════════ */
        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: var(--g-text2);
            margin-bottom: 7px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--g-muted);
            font-size: 15px;
        }

        .form-control {
            width: 100%;
            background: var(--g-bg);
            border: 1.5px solid var(--g-border);
            border-radius: 11px;
            padding: 11px 14px 11px 38px;
            font-size: 14px;
            font-family: 'Lato', sans-serif;
            font-weight: 400;
            color: var(--g-text);
            outline: none;
            transition: border-color .2s, background .2s, box-shadow .2s;
        }

        select.form-control {
            padding-left: 38px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath fill='%237A9BB0' d='M6 8L0 0h12z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 70px;
            padding-left: 14px;
        }

        .form-control::placeholder {
            color: var(--g-muted);
        }

        .form-control:focus {
            border-color: rgba(14, 158, 114, .45);
            background: var(--g-white);
            box-shadow: 0 0 0 3px rgba(14, 158, 114, .08);
        }

        .form-control.is-invalid {
            border-color: rgba(224, 92, 92, .5);
        }

        .invalid-feedback {
            font-size: 12px;
            color: #C53030;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
            font-weight: 400;
        }

        .hint {
            font-size: 11.5px;
            color: var(--g-muted);
            margin-top: 5px;
            font-weight: 400;
        }

        /* ══════════════ SUBMIT BUTTON ══════════════ */
        .btn-submit {
            width: 100%;
            padding: 13px;
            background: var(--g-blue);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            font-family: 'Lato', sans-serif;
            cursor: pointer;
            margin-top: 10px;
            transition: background .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 8px 28px rgba(21, 101, 192, .25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-submit:hover {
            background: var(--g-blue-mid);
            transform: translateY(-1px);
            box-shadow: 0 12px 36px rgba(21, 101, 192, .38);
        }

        /* ══════════════ LINKS ══════════════ */
        .login-link {
            text-align: center;
            font-size: 13.5px;
            color: var(--g-muted);
            font-weight: 400;
            margin-top: 20px;
        }

        .login-link a {
            color: var(--g-green);
            font-weight: 700;
            text-decoration: none;
            transition: color .2s;
        }

        .login-link a:hover {
            color: var(--g-green-mid);
            text-decoration: underline;
        }

        .back-link {
            display: flex;
            align-items: center;
            gap: 6px;
            justify-content: center;
            margin-top: 20px;
            font-size: 13px;
            color: var(--g-muted);
            text-decoration: none;
            font-weight: 400;
            transition: color .2s;
        }

        .back-link:hover {
            color: var(--g-green);
        }

        /* ══════════════ RESPONSIVE ══════════════ */
        @media (max-width: 480px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

    </style>
</head>
<body>
    <div class="bg-grid"></div>

    <div class="card-wrap">
        <a href="/" class="brand">
            <img src="{{ asset('https://www.image2url.com/r2/default/images/1780470981952-c4f72cc3-af32-42ae-9228-d8a982bc998a.png') }}" alt="Logo GENTA" style="width:40px; height:40px; border-radius:8px;">
            <span class="brand-name">GENTA</span>
        </a>

        <div class="auth-card">
            <h1>Daftarkan Balita Kesayanganmu</h1>
            <p class="subtitle">Isi data di bawah ini untuk mendaftarkan balita ke posyandu. Tidak perlu akun.</p>

            {{-- Pesan sukses --}}
            @if(session('success'))
            <div class="alert-success">
                <i class="bi bi-check-circle-fill" style="margin-top:1px"></i>
                <span>{{ session('success') }}</span>
            </div>
            @endif

            {{-- Error umum --}}
            @if($errors->any())
            <div class="alert-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}">
                @csrf

                <!-- ══════ DATA BALITA ══════ -->
                <div class="form-section-label">
                    <i class="bi bi-person-heart"></i> Data Balita
                </div>

                <div class="form-group">
                    <label for="nama_balita">Nama Lengkap Balita</label>
                    <div class="input-wrap">
                        <i class="bi bi-person"></i>
                        <input
                            type="text"
                            id="nama_balita"
                            name="nama_balita"
                            class="form-control {{ $errors->has('nama_balita') ? 'is-invalid' : '' }}"
                            placeholder="Nama lengkap sesuai akta"
                            value="{{ old('nama_balita') }}"
                            autofocus
                        >
                    </div>
                    @error('nama_balita')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <div class="input-wrap">
                            <i class="bi bi-calendar3"></i>
                            <input
                                type="date"
                                id="tanggal_lahir"
                                name="tanggal_lahir"
                                class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}"
                                value="{{ old('tanggal_lahir') }}"
                            >
                        </div>
                        @error('tanggal_lahir')
                        <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="input-wrap">
                            <i class="bi bi-gender-ambiguous"></i>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}">
                                <option value="">Pilih</option>
                                <option value="L" {{ old('jenis_kelamin') === 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') === 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="nik_balita">NIK Balita <span style="color:var(--g-muted);font-weight:400">(opsional)</span></label>
                    <div class="input-wrap">
                        <i class="bi bi-card-text"></i>
                        <input
                            type="text"
                            id="nik_balita"
                            name="nik_balita"
                            class="form-control {{ $errors->has('nik_balita') ? 'is-invalid' : '' }}"
                            placeholder="16 digit sesuai KK"
                            maxlength="16"
                            value="{{ old('nik_balita') }}"
                        >
                    </div>
                    @error('nik_balita')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <!-- ══════ DATA ORANG TUA ══════ -->
                <div class="form-section-label">
                    <i class="bi bi-people"></i> Data Orang Tua
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                        <div class="input-wrap">
                            <i class="bi bi-person-heart"></i>
                            <input
                                type="text"
                                id="nama_ibu"
                                name="nama_ibu"
                                class="form-control"
                                placeholder="Nama ibu kandung"
                                value="{{ old('nama_ibu') }}"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah</label>
                        <div class="input-wrap">
                            <i class="bi bi-person"></i>
                            <input
                                type="text"
                                id="nama_ayah"
                                name="nama_ayah"
                                class="form-control"
                                placeholder="Nama ayah kandung"
                                value="{{ old('nama_ayah') }}"
                            >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="no_hp_ortu">Nomor HP / WhatsApp</label>
                    <div class="input-wrap">
                        <i class="bi bi-telephone"></i>
                        <input
                            type="text"
                            id="no_hp_ortu"
                            name="no_hp_ortu"
                            class="form-control {{ $errors->has('no_hp_ortu') ? 'is-invalid' : '' }}"
                            placeholder="08xxxxxxxxxx"
                            value="{{ old('no_hp_ortu') }}"
                        >
                    </div>
                    @error('no_hp_ortu')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                    <div class="hint">Akan dihubungi kader untuk konfirmasi jadwal posyandu.</div>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Tempat Tinggal</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        class="form-control"
                        placeholder="Alamat lengkap sesuai domisili"
                    >{{ old('alamat') }}</textarea>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="bi bi-send-check"></i> Daftarkan Balita
                </button>
            </form>

            <div class="login-link">
                Kader posyandu? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>

        <a href="/" class="back-link">
            <i class="bi bi-arrow-left"></i> Kembali ke beranda
        </a>
    </div>
</body>
</html>

