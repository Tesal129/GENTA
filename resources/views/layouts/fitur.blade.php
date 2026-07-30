<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') – GENTA</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --g-bg:           #F7FBFF;
            --g-green:        #0E9E72;
            --g-green-mid:    #12BC88;
            --g-blue:         #1565C0;
            --g-dark:         #0A1628;
            --g-text:         #1A2E3B;
            --g-text2:        #3D5A6C;
            --g-muted:        #7A9BB0;
            --g-border:       rgba(21,101,192,.12);
            --g-white:        #FFFFFF;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Lato', sans-serif; background: var(--g-bg); color: var(--g-text); min-height: 100vh; display: flex; flex-direction: column; }
        
        /* ══ NAVBAR ══ */
        nav {
            padding: 16px 60px;
            display: flex; align-items: center; justify-content: space-between;
            background: rgba(247,251,255,.94);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--g-border);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .nav-brand { display:flex; align-items:center; gap:10px; text-decoration:none; }
        .nav-brand img { width:34px; height:34px; border-radius:9px; }
        .nav-brand span { font-weight:900; font-size:17px; color:var(--g-dark); }
        .nav-back { font-size:14px; font-weight:700; color:var(--g-muted); text-decoration:none; transition:color .2s; display:flex; align-items:center; gap:6px; }
        .nav-back:hover { color:var(--g-green); }

        /* ══ MAIN ══ */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
        }

        .feature-card {
            background: var(--g-white);
            border: 1px solid var(--g-border);
            border-radius: 24px;
            padding: 48px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 12px 48px rgba(21, 101, 192, .08);
            text-align: center;
            animation: fadeUp .6s ease forwards;
        }

        .feature-icon {
            width: 72px;
            height: 72px;
            border-radius: 20px;
            background: rgba(14,158,114,.1);
            color: var(--g-green);
            font-size: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px;
        }

        h1 {
            font-size: 28px;
            font-weight: 900;
            color: var(--g-dark);
            margin-bottom: 16px;
        }

        p {
            font-size: 16px;
            line-height: 1.7;
            color: var(--g-text2);
            margin-bottom: 32px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 28px;
            background: var(--g-blue);
            color: #fff;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            transition: all .2s;
            box-shadow: 0 8px 28px rgba(21,101,192,.3);
        }
        .btn-primary:hover {
            background: var(--g-blue-mid);
            transform: translateY(-2px);
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 600px) {
            nav { padding: 16px 20px; }
            .feature-card { padding: 32px 20px; }
        }
    </style>
</head>
<body>

<nav>
    <a href="/" class="nav-brand">
        <img src="{{ asset('https://www.image2url.com/r2/default/images/1780470981952-c4f72cc3-af32-42ae-9228-d8a982bc998a.png') }}" alt="Logo GENTA">
        <span>GENTA</span>
    </a>
    <a href="/#fitur" class="nav-back"><i class="bi bi-arrow-left"></i> Kembali</a>
</nav>

<main>
    <div class="feature-card">
        <div class="feature-icon">
            <i class="bi @yield('icon')"></i>
        </div>
        <h1>@yield('title')</h1>
        <p>@yield('description')</p>
        <a href="/register" class="btn-primary">Mulai Gunakan GENTA</a>
    </div>
</main>

</body>
</html>
