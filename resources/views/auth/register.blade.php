<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar – GENTA</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --g-dark:      #071A13;
            --g-dark2:     #0D2B1E;
            --g-green:     #1D9E75;
            --g-green-mid: #25C491;
            --g-green-lite:#4EEDB5;
            --g-white:     #F0FBF5;
            --g-white2:    #C8EAD9;
            --g-muted:     #5A8A72;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--g-dark);
            color: var(--g-white);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 32px 16px;
        }
        body::before {
            content: '';
            position: fixed;
            top: -20%; right: -10%;
            width: 60vw; height: 70vh;
            background: radial-gradient(ellipse, rgba(29,158,117,.13) 0%, transparent 70%);
            pointer-events: none;
        }
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(78,237,181,.05) 1px, transparent 1px);
            background-size: 36px 36px;
            pointer-events: none;
        }

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

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            margin-bottom: 28px;
            text-decoration: none;
        }
        .brand-icon {
            width: 40px; height: 40px;
            background: var(--g-green);
            border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
        }
        .brand-icon i { color: #fff; font-size: 19px; }
        .brand-name { font-family: 'Sora', sans-serif; font-size: 22px; font-weight: 800; color: var(--g-white); }

        .auth-card {
            background: var(--g-dark2);
            border: 1px solid rgba(78,237,181,.12);
            border-radius: 24px;
            padding: 36px 32px;
            box-shadow: 0 24px 60px rgba(0,0,0,.4);
        }
        .auth-card h1 {
            font-family: 'Sora', sans-serif;
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -.02em;
            margin-bottom: 6px;
        }
        .auth-card .subtitle { font-size: 14px; color: var(--g-muted); margin-bottom: 26px; }

        .form-group { margin-bottom: 16px; }
        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--g-white2);
            margin-bottom: 7px;
        }
        .input-wrap { position: relative; }
        .input-wrap i {
            position: absolute;
            left: 13px; top: 50%;
            transform: translateY(-50%);
            color: var(--g-muted);
            font-size: 15px;
        }
        .form-control {
            width: 100%;
            background: rgba(255,255,255,.04);
            border: 1.5px solid rgba(78,237,181,.12);
            border-radius: 11px;
            padding: 11px 14px 11px 38px;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            color: var(--g-white);
            outline: none;
            transition: border-color .2s, background .2s;
        }
        .form-control::placeholder { color: var(--g-muted); }
        .form-control:focus { border-color: rgba(78,237,181,.45); background: rgba(255,255,255,.06); }
        .form-control.is-invalid { border-color: rgba(224,92,92,.5); }

        .invalid-feedback {
            font-size: 12px;
            color: #F28B8B;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .hint { font-size: 11.5px; color: var(--g-muted); margin-top: 5px; }

        .btn-submit {
            width: 100%;
            padding: 13px;
            background: var(--g-green);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-family: 'Sora', sans-serif;
            font-weight: 700;
            cursor: pointer;
            margin-top: 8px;
            transition: background .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 8px 28px rgba(29,158,117,.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-submit:hover { background: var(--g-green-mid); transform: translateY(-1px); box-shadow: 0 12px 36px rgba(29,158,117,.45); }

        .login-link {
            text-align: center;
            font-size: 13.5px;
            color: var(--g-muted);
            margin-top: 20px;
        }
        .login-link a { color: var(--g-green-lite); font-weight: 600; text-decoration: none; }
        .login-link a:hover { text-decoration: underline; }

        .back-link {
            display: flex;
            align-items: center;
            gap: 6px;
            justify-content: center;
            margin-top: 20px;
            font-size: 13px;
            color: var(--g-muted);
            text-decoration: none;
            transition: color .2s;
        }
        .back-link:hover { color: var(--g-green-lite); }
    </style>
</head>
<body>
    <div class="bg-grid"></div>

    <div class="card-wrap">
        <a href="/" class="brand">
            <div class="brand-icon">
                <img src="{{ asset('https://img.sanishtech.com/u/84f996c60c30b287ca79b4ac4f94b9f3.png') }}" alt="Logo GENTA" style="width:20px; height:20px; border-radius:6px;">
            </div>
            <span class="brand-name">GENTA</span>
        </a>

        <div class="auth-card">
            <h1>Buat Akun Kader ✨</h1>
            <p class="subtitle">Daftar gratis dan mulai pantau tumbuh kembang balita.</p>

            <form method="POST" action="/register">
                @csrf

                {{-- Nama Kader --}}
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

                {{-- Username --}}
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

                {{-- Password --}}
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

                {{-- Konfirmasi Password --}}
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
                    <i class="bi bi-rocket-takeoff"></i> Buat Akun — Gratis
                </button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="/login">Masuk di sini →</a>
            </div>
        </div>

        <a href="/" class="back-link">
            <i class="bi bi-arrow-left"></i> Kembali ke beranda
        </a>
    </div>
</body>
</html>