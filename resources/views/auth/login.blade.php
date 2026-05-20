<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk – GENTA</title>
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
            --g-error:     #E05C5C;
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
        }

        /* Background glow */
        body::before {
            content: '';
            position: fixed;
            top: -20%; left: -10%;
            width: 60vw; height: 70vh;
            background: radial-gradient(ellipse, rgba(29,158,117,.15) 0%, transparent 70%);
            pointer-events: none;
        }
        body::after {
            content: '';
            position: fixed;
            bottom: -20%; right: -10%;
            width: 50vw; height: 60vh;
            background: radial-gradient(ellipse, rgba(78,237,181,.07) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Grid dots background */
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle, rgba(78,237,181,.06) 1px, transparent 1px);
            background-size: 36px 36px;
            pointer-events: none;
        }

        .card-wrap {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 420px;
            padding: 24px;
            animation: fadeUp .6s ease forwards;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Brand */
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            margin-bottom: 32px;
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

        /* Card */
        .auth-card {
            background: var(--g-dark2);
            border: 1px solid rgba(78,237,181,.12);
            border-radius: 24px;
            padding: 36px 32px;
            box-shadow: 0 24px 60px rgba(0,0,0,.4);
        }

        .auth-card h1 {
            font-family: 'Sora', sans-serif;
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -.02em;
            color: var(--g-white);
            margin-bottom: 6px;
        }
        .auth-card .subtitle {
            font-size: 14px;
            color: var(--g-muted);
            margin-bottom: 28px;
        }

        /* Alert error */
        .alert-error {
            background: rgba(224,92,92,.12);
            border: 1px solid rgba(224,92,92,.3);
            border-radius: 10px;
            padding: 11px 14px;
            font-size: 13px;
            color: #F28B8B;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Form */
        .form-group { margin-bottom: 18px; }

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
        .form-control:focus {
            border-color: rgba(78,237,181,.45);
            background: rgba(255,255,255,.06);
        }
        .form-control.is-invalid { border-color: rgba(224,92,92,.5); }

        .invalid-feedback {
            font-size: 12px;
            color: #F28B8B;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Remember + forgot */
        .form-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }
        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 13px;
            color: var(--g-muted);
            cursor: pointer;
        }
        .remember input[type="checkbox"] {
            width: 15px; height: 15px;
            accent-color: var(--g-green);
            cursor: pointer;
        }
        .forgot {
            font-size: 13px;
            color: var(--g-green-lite);
            text-decoration: none;
        }
        .forgot:hover { text-decoration: underline; }

        /* Submit button */
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
            transition: background .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 8px 28px rgba(29,158,117,.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-submit:hover {
            background: var(--g-green-mid);
            transform: translateY(-1px);
            box-shadow: 0 12px 36px rgba(29,158,117,.45);
        }
        .btn-submit:active { transform: translateY(0); }

        /* Divider */
        .divider {
            text-align: center;
            font-size: 13px;
            color: var(--g-muted);
            margin: 22px 0;
            position: relative;
        }
        .divider::before, .divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 38%;
            height: 1px;
            background: rgba(255,255,255,.07);
        }
        .divider::before { left: 0; }
        .divider::after  { right: 0; }

        .register-link {
            text-align: center;
            font-size: 13.5px;
            color: var(--g-muted);
        }
        .register-link a {
            color: var(--g-green-lite);
            font-weight: 600;
            text-decoration: none;
        }
        .register-link a:hover { text-decoration: underline; }

        /* Back link */
        .back-link {
            display: flex;
            align-items: center;
            gap: 6px;
            justify-content: center;
            margin-top: 22px;
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
                <img src="{{ asset('https://img.sanishtech.com/u/84f996c60c30b287ca79b4ac4f94b9f3.png') }}" alt="Logo GENTA" style="width:40px; height:40px; border-radius:8px;">
            </div>
            <span class="brand-name">GENTA</span>
        </a>

        <div class="auth-card">
            <h1>Selamat Datang di Genta</h1>
            <p class="subtitle">Masuk ke akun kader kamu untuk melanjutkan.</p>

            {{-- Error umum --}}
            @if($errors->any())
            <div class="alert-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ $errors->first() }}
            </div>
            @endif

            {{-- Flash success (misal dari logout) --}}
            @if(session('success'))
            <div style="background:rgba(29,158,117,.12);border:1px solid rgba(78,237,181,.2);border-radius:10px;padding:11px 14px;font-size:13px;color:var(--g-green-lite);margin-bottom:20px;display:flex;align-items:center;gap:8px;">
                <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="/login">
                @csrf

                {{-- Username --}}
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-wrap">
                        <i class="bi bi-person"></i>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                            placeholder="Masukkan username"
                            value="{{ old('username') }}"
                            autocomplete="username"
                            autofocus
                        >
                    </div>
                    @error('username')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </div>
                    @enderror
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
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                        >
                    </div>
                    @error('password')
                    <div class="invalid-feedback">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </div>
                    @enderror
                </div>

                {{-- Remember + Lupa password --}}
                <div class="form-bottom">
                    <label class="remember">
                        <input type="checkbox" name="remember"> Ingat saya
                    </label>
                    <a href="#" class="forgot">Lupa password?</a>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk
                </button>
            </form>

            <div class="divider">atau</div>

            <div class="register-link">
                Belum punya akun? <a href="/register">Daftar sekarang →</a>
            </div>
        </div>

        <a href="/" class="back-link">
            <i class="bi bi-arrow-left"></i> Kembali ke beranda
        </a>
    </div>
</body>
</html>