<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kader – GENTA</title>
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
            padding: 32px 16px;
        }

        body::before {
            content: '';
            position: fixed;
            top: -20%; right: -10%;
            width: 60vw; height: 70vh;
            background: radial-gradient(ellipse, rgba(21, 101, 192, .07) 0%, transparent 70%);
            pointer-events: none;
        }

        .bg-grid {
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(14, 158, 114, .06) 1px, transparent 1px);
            background-size: 36px 36px;
            pointer-events: none;
        }

        /* ══════════════ CARD WRAP ══════════════ */
        .card-wrap {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
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

        /* ══════════════ ALERT ══════════════ */
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
            margin-top: 8px;
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
            <h1>Buat Akun Kader</h1>
            <p class="subtitle">Daftar sebagai kader posyandu untuk mengelola data balita.</p>

            {{-- Error umum --}}
            @if($errors->any())
            <div class="alert-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('register.kader.store') }}">
                @csrf

                <!-- Nama Kader -->
                <div class="form-group">
                    <label for="nama_kader">Nama Lengkap</label>
                    <div class="input-wrap">
                        <i class="bi bi-person-badge"></i>
                        <input
                            type="text"
                            id="nama_kader"
                            name="nama_kader"
                            class="form-control {{ $errors->has('nama_kader') ? 'is-invalid' : '' }}"
                            placeholder="Nama kader posyandu"
                            value="{{ old('nama_kader') }}"
                            autofocus
                        >
                    </div>
                    @error('nama_kader')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <!-- Username -->
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-wrap">
                        <i class="bi bi-at"></i>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                            placeholder="Buat username unik"
                            value="{{ old('username') }}"
                            autocomplete="username"
                        >
                    </div>
                    @error('username')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                    <div class="hint">Gunakan huruf kecil, angka, atau underscore. Tidak bisa diubah.</div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="Minimal 6 karakter"
                            autocomplete="new-password"
                        >
                    </div>
                    @error('password')
                    <div class="invalid-feedback"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock-fill"></i>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Ulangi password"
                            autocomplete="new-password"
                        >
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="bi bi-person-plus"></i> Daftar Sebagai Kader
                </button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>

        <a href="/" class="back-link">
            <i class="bi bi-arrow-left"></i> Kembali ke beranda
        </a>
    </div>
</body>
</html>


