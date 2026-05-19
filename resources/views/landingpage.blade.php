<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GENTA – Generasi Sehat Kita</title>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --g-dark:       #071A13;
            --g-dark2:      #0D2B1E;
            --g-dark3:      #122E20;
            --g-green:      #1D9E75;
            --g-green-mid:  #25C491;
            --g-green-lite: #4EEDB5;
            --g-white:      #F0FBF5;
            --g-white2:     #C8EAD9;
            --g-accent:     #A8F0D0;
            --g-muted:      #5A8A72;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--g-dark);
            color: var(--g-white);
            overflow-x: hidden;
            cursor: default;
        }

        /* ── NOISE OVERLAY ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
            opacity: .4;
        }

        /* ══════════════ NAVBAR ══════════════ */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 20px 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: transparent;
            transition: background .4s, padding .4s;
        }
        nav.scrolled {
            background: rgba(7,26,19,.88);
            backdrop-filter: blur(16px);
            padding: 14px 60px;
            border-bottom: 1px solid rgba(29,158,117,.15);
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .nav-brand .logo {
            width: 38px; height: 38px;
            background: var(--g-green);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }
        .nav-brand .logo i { color: #fff; font-size: 18px; }
        .nav-brand span { font-family: 'Sora', sans-serif; font-weight: 800; font-size: 18px; color: var(--g-white); letter-spacing: -.01em; }

        .nav-links { display: flex; align-items: center; gap: 36px; }
        .nav-links a {
            font-size: 14px;
            font-weight: 500;
            color: var(--g-white2);
            text-decoration: none;
            transition: color .2s;
        }
        .nav-links a:hover { color: var(--g-green-lite); }

        .nav-cta {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .btn-outline-nav {
            padding: 8px 20px;
            border-radius: 8px;
            border: 1.5px solid rgba(78,237,181,.3);
            color: var(--g-accent);
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: all .2s;
        }
        .btn-outline-nav:hover { border-color: var(--g-green-lite); background: rgba(78,237,181,.07); color: var(--g-green-lite); }

        .btn-solid-nav {
            padding: 8px 22px;
            border-radius: 8px;
            background: var(--g-green);
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: background .2s, transform .15s;
        }
        .btn-solid-nav:hover { background: var(--g-green-mid); transform: translateY(-1px); }

        /* ══════════════ HERO ══════════════ */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 140px 60px 100px;
            overflow: hidden;
        }

        /* Radial glow behind hero */
        .hero::after {
            content: '';
            position: absolute;
            top: -10%; left: -5%;
            width: 70vw; height: 80vh;
            background: radial-gradient(ellipse, rgba(29,158,117,.18) 0%, transparent 70%);
            pointer-events: none;
        }

        /* Decorative circle grid */
        .hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle, rgba(78,237,181,.08) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 640px;
        }

        .hero-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(29,158,117,.12);
            border: 1px solid rgba(78,237,181,.2);
            border-radius: 100px;
            padding: 6px 16px;
            font-size: 12px;
            font-weight: 600;
            color: var(--g-green-lite);
            letter-spacing: .06em;
            text-transform: uppercase;
            margin-bottom: 28px;
            opacity: 0;
            animation: fadeUp .7s .2s forwards;
        }
        .hero-pill i { font-size: 13px; }

        .hero h1 {
            font-family: 'Sora', sans-serif;
            font-size: clamp(42px, 6vw, 72px);
            font-weight: 800;
            line-height: 1.08;
            letter-spacing: -.03em;
            color: var(--g-white);
            opacity: 0;
            animation: fadeUp .7s .35s forwards;
        }
        .hero h1 em {
            font-style: normal;
            background: linear-gradient(135deg, var(--g-green-mid), var(--g-green-lite));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            margin-top: 22px;
            font-size: 17px;
            line-height: 1.7;
            color: var(--g-white2);
            font-weight: 300;
            max-width: 500px;
            opacity: 0;
            animation: fadeUp .7s .5s forwards;
        }

        .hero-actions {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 40px;
            opacity: 0;
            animation: fadeUp .7s .65s forwards;
        }

        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 30px;
            background: var(--g-green);
            color: #fff;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            transition: background .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 8px 32px rgba(29,158,117,.35);
        }
        .btn-hero-primary:hover {
            background: var(--g-green-mid);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(29,158,117,.5);
            color: #fff;
        }

        .btn-hero-ghost {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 26px;
            border: 1.5px solid rgba(200,234,217,.2);
            border-radius: 12px;
            color: var(--g-white2);
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            transition: all .2s;
        }
        .btn-hero-ghost:hover { border-color: rgba(78,237,181,.4); color: var(--g-green-lite); }

        /* Hero stats bar */
        .hero-stats {
            display: flex;
            gap: 40px;
            margin-top: 60px;
            padding-top: 40px;
            border-top: 1px solid rgba(255,255,255,.07);
            opacity: 0;
            animation: fadeUp .7s .8s forwards;
        }
        .hero-stat-item {}
        .hero-stat-item .num {
            font-family: 'Sora', sans-serif;
            font-size: 28px;
            font-weight: 800;
            color: var(--g-green-lite);
            line-height: 1;
        }
        .hero-stat-item .lbl {
            font-size: 12px;
            color: var(--g-muted);
            margin-top: 4px;
            font-weight: 400;
        }

        /* Hero visual (right side) */
        .hero-visual {
            position: absolute;
            right: 0; top: 50%;
            transform: translateY(-50%);
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            opacity: 0;
            animation: fadeIn 1.2s .5s forwards;
        }

        .hero-card-stack {
            position: relative;
            width: 380px;
            height: 460px;
        }

        .hcard {
            position: absolute;
            background: var(--g-dark2);
            border: 1px solid rgba(78,237,181,.12);
            border-radius: 20px;
            padding: 22px 24px;
            box-shadow: 0 20px 60px rgba(0,0,0,.4);
        }

        .hcard-main {
            width: 320px;
            left: 30px; top: 40px;
            z-index: 3;
        }
        .hcard-back1 {
            width: 300px;
            left: 60px; top: 10px;
            z-index: 2;
            opacity: .6;
            transform: rotate(3deg);
        }
        .hcard-back2 {
            width: 280px;
            left: 80px; top: -20px;
            z-index: 1;
            opacity: .3;
            transform: rotate(6deg);
        }

        .hcard-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--g-muted);
            margin-bottom: 16px;
        }
        .hcard-child {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
        }
        .hcard-avatar {
            width: 44px; height: 44px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--g-green), var(--g-green-lite));
            display: flex; align-items: center; justify-content: center;
            font-family: 'Sora', sans-serif;
            font-weight: 800; font-size: 16px; color: #fff;
        }
        .hcard-name { font-weight: 700; font-size: 15px; color: var(--g-white); }
        .hcard-sub { font-size: 12px; color: var(--g-muted); }

        .hcard-metrics {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 12px;
            margin-bottom: 18px;
        }
        .hcard-metric {
            background: var(--g-dark3);
            border-radius: 10px;
            padding: 12px;
            text-align: center;
        }
        .hcard-metric .val { font-family: 'Sora', sans-serif; font-size: 18px; font-weight: 700; color: var(--g-green-lite); }
        .hcard-metric .key { font-size: 10px; color: var(--g-muted); margin-top: 2px; }

        .hcard-status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(29,158,117,.15);
            border: 1px solid rgba(78,237,181,.2);
            border-radius: 100px;
            padding: 6px 14px;
            font-size: 12px;
            font-weight: 700;
            color: var(--g-green-lite);
        }
        .hcard-status i { font-size: 13px; }

        /* Floating badges */
        .float-badge {
            position: absolute;
            background: var(--g-dark2);
            border: 1px solid rgba(78,237,181,.18);
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 12px;
            font-weight: 600;
            color: var(--g-white);
            box-shadow: 0 8px 24px rgba(0,0,0,.3);
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 10;
        }
        .float-badge i { color: var(--g-green-lite); }
        .float-badge.b1 { right: 10px; top: 30px; animation: float1 4s ease-in-out infinite; }
        .float-badge.b2 { left: 0px; bottom: 80px; animation: float2 5s ease-in-out infinite; }
        .float-badge.b3 { right: 20px; bottom: 20px; animation: float1 3.5s 1s ease-in-out infinite; }

        /* ══════════════ FEATURES ══════════════ */
        .section {
            padding: 100px 60px;
            position: relative;
        }

        .section-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .12em;
            text-transform: uppercase;
            color: var(--g-green-lite);
            margin-bottom: 14px;
        }

        .section-title {
            font-family: 'Sora', sans-serif;
            font-size: clamp(30px, 4vw, 48px);
            font-weight: 800;
            letter-spacing: -.025em;
            line-height: 1.1;
            color: var(--g-white);
            margin-bottom: 16px;
        }

        .section-sub {
            font-size: 16px;
            color: var(--g-muted);
            font-weight: 300;
            max-width: 520px;
            line-height: 1.7;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 56px;
        }

        .feat-card {
            background: var(--g-dark2);
            border: 1px solid rgba(78,237,181,.08);
            border-radius: 20px;
            padding: 32px 28px;
            transition: border-color .3s, transform .3s, box-shadow .3s;
            position: relative;
            overflow: hidden;
        }
        .feat-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--g-green), transparent);
            opacity: 0;
            transition: opacity .3s;
        }
        .feat-card:hover {
            border-color: rgba(78,237,181,.22);
            transform: translateY(-4px);
            box-shadow: 0 20px 50px rgba(0,0,0,.25);
        }
        .feat-card:hover::before { opacity: 1; }

        .feat-icon {
            width: 48px; height: 48px;
            border-radius: 14px;
            background: rgba(29,158,117,.15);
            border: 1px solid rgba(78,237,181,.2);
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 22px;
        }
        .feat-icon i { font-size: 21px; color: var(--g-green-lite); }

        .feat-card h3 {
            font-family: 'Sora', sans-serif;
            font-size: 17px;
            font-weight: 700;
            color: var(--g-white);
            margin-bottom: 10px;
            letter-spacing: -.01em;
        }
        .feat-card p { font-size: 14px; color: var(--g-muted); line-height: 1.7; }

        /* ══════════════ HOW IT WORKS ══════════════ */
        .how-section {
            padding: 100px 60px;
            background: var(--g-dark2);
            position: relative;
            overflow: hidden;
        }
        .how-section::before {
            content: '';
            position: absolute;
            right: -100px; top: -100px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(29,158,117,.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .steps-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 32px;
            margin-top: 60px;
            position: relative;
        }
        .steps-row::before {
            content: '';
            position: absolute;
            top: 28px; left: 14%; right: 14%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(78,237,181,.2), rgba(78,237,181,.2), transparent);
        }

        .step-item { text-align: center; }

        .step-num {
            width: 56px; height: 56px;
            border-radius: 50%;
            background: var(--g-dark3);
            border: 2px solid rgba(78,237,181,.25);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Sora', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: var(--g-green-lite);
            margin: 0 auto 20px;
            position: relative;
            z-index: 1;
        }
        .step-item h4 {
            font-family: 'Sora', sans-serif;
            font-size: 15px;
            font-weight: 700;
            color: var(--g-white);
            margin-bottom: 8px;
        }
        .step-item p { font-size: 13px; color: var(--g-muted); line-height: 1.6; }

        /* ══════════════ STATS SECTION ══════════════ */
        .stats-section {
            padding: 80px 60px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2px;
            background: rgba(78,237,181,.06);
            border-top: 1px solid rgba(78,237,181,.1);
            border-bottom: 1px solid rgba(78,237,181,.1);
        }
        .stat-block {
            text-align: center;
            padding: 40px 20px;
            border-right: 1px solid rgba(78,237,181,.08);
        }
        .stat-block:last-child { border-right: none; }
        .stat-block .big-num {
            font-family: 'Sora', sans-serif;
            font-size: 48px;
            font-weight: 800;
            color: var(--g-green-lite);
            line-height: 1;
            letter-spacing: -.04em;
        }
        .stat-block .big-lbl { font-size: 14px; color: var(--g-muted); margin-top: 8px; }

        /* ══════════════ CTA SECTION ══════════════ */
        .cta-section {
            padding: 120px 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at center, rgba(29,158,117,.12) 0%, transparent 70%);
        }
        .cta-section .section-title { margin: 0 auto 16px; }
        .cta-section .section-sub { margin: 0 auto 40px; text-align: center; }
        .cta-section .section-label { text-align: center; }

        .cta-btns { display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap; }

        .btn-cta-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 36px;
            background: var(--g-green);
            color: #fff;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 700;
            text-decoration: none;
            transition: all .2s;
            box-shadow: 0 10px 40px rgba(29,158,117,.4);
        }
        .btn-cta-primary:hover { background: var(--g-green-mid); transform: translateY(-3px); box-shadow: 0 16px 50px rgba(29,158,117,.55); color: #fff; }

        .btn-cta-ghost {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            border: 1.5px solid rgba(200,234,217,.2);
            border-radius: 14px;
            color: var(--g-white2);
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            transition: all .2s;
        }
        .btn-cta-ghost:hover { border-color: rgba(78,237,181,.4); color: var(--g-green-lite); }

        /* ══════════════ FOOTER ══════════════ */
        footer {
            background: var(--g-dark2);
            border-top: 1px solid rgba(255,255,255,.05);
            padding: 60px 60px 32px;
        }
        .footer-top {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 48px;
        }
        .footer-brand .logo-row {
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 14px;
        }
        .footer-brand .logo-icon {
            width: 36px; height: 36px;
            background: var(--g-green);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
        }
        .footer-brand .logo-icon i { color: #fff; font-size: 16px; }
        .footer-brand .logo-name { font-family: 'Sora', sans-serif; font-weight: 800; font-size: 17px; color: var(--g-white); }
        .footer-brand p { font-size: 13px; color: var(--g-muted); line-height: 1.7; max-width: 240px; }

        .footer-col h5 {
            font-family: 'Sora', sans-serif;
            font-size: 13px;
            font-weight: 700;
            color: var(--g-white);
            letter-spacing: .05em;
            text-transform: uppercase;
            margin-bottom: 16px;
        }
        .footer-col a {
            display: block;
            font-size: 13px;
            color: var(--g-muted);
            text-decoration: none;
            margin-bottom: 10px;
            transition: color .2s;
        }
        .footer-col a:hover { color: var(--g-green-lite); }

        .footer-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 24px;
            border-top: 1px solid rgba(255,255,255,.05);
            font-size: 12px;
            color: var(--g-muted);
        }

        /* ══════════════ ANIMATIONS ══════════════ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }
        @keyframes float1 {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-10px); }
        }
        @keyframes float2 {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(8px); }
        }

        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity .7s, transform .7s;
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ══════════════ RESPONSIVE ══════════════ */
        @media (max-width: 1024px) {
            nav { padding: 18px 28px; }
            nav.scrolled { padding: 14px 28px; }
            .nav-links { display: none; }
            .hero { padding: 120px 28px 80px; }
            .hero-visual { display: none; }
            .features-grid { grid-template-columns: 1fr 1fr; }
            .steps-row { grid-template-columns: 1fr 1fr; }
            .steps-row::before { display: none; }
            .stats-section { grid-template-columns: 1fr 1fr; }
            .footer-top { grid-template-columns: 1fr 1fr; }
            .section { padding: 70px 28px; }
            .how-section { padding: 70px 28px; }
            .cta-section { padding: 80px 28px; }
            footer { padding: 48px 28px 24px; }
        }

        @media (max-width: 600px) {
            .features-grid { grid-template-columns: 1fr; }
            .steps-row { grid-template-columns: 1fr; }
            .stats-section { grid-template-columns: 1fr 1fr; padding: 40px 20px; }
            .footer-top { grid-template-columns: 1fr; }
            .hero-stats { flex-wrap: wrap; gap: 24px; }
        }
    </style>
</head>
<body>

<!-- ══════ NAVBAR ══════ -->
<nav id="navbar">
    <a href="/" class="nav-brand">
        <div class="logo">
            <img src="{{ asset('https://img.sanishtech.com/u/84f996c60c30b287ca79b4ac4f94b9f3.png') }}" alt="Logo GENTA" style="width:40px; height:40px; border-radius:8px;">
        </div>
        <span>GENTA</span>
    </a>
    <div class="nav-links">
        <a href="#fitur">Fitur</a>
        <a href="#cara-kerja">Cara Kerja</a>
        <a href="#tentang">Tentang</a>
        <a href="#kontak">Kontak</a>
    </div>
    <div class="nav-cta">
        <a href="/login" class="btn-outline-nav">Masuk</a>
        <a href="/register" class="btn-solid-nav">Mulai Gratis →</a>
    </div>
</nav>

<!-- ══════ HERO ══════ -->
<section class="hero" id="beranda">
    <div class="hero-grid"></div>

    <div class="hero-content">
        <div class="hero-pill">
            <i class="bi bi-shield-check"></i>
            Platform Kesehatan Balita Terpercaya
        </div>

        <h1>Langkah Kecil<br>untuk <em>Generasi</em><br><em>Masa Depan</em></h1>

        <p>Catatan medis, jadwal imunisasi, dan grafik perkembangan anak — semua dalam satu platform digital yang aman, mudah, dan selalu siap menemanimu.</p>

        <div class="hero-actions">
            <a href="/register" class="btn-hero-primary">
                <i class="bi bi-rocket-takeoff"></i> Mulai Sekarang — Gratis
            </a>
            <a href="#fitur" class="btn-hero-ghost">
                <i class="bi bi-play-circle"></i> Pelajari Fitur →
            </a>
        </div>

        <div class="hero-stats">
            <div class="hero-stat-item">
                <div class="num">2.400+</div>
                <div class="lbl">Balita Terdaftar</div>
            </div>
            <div class="hero-stat-item">
                <div class="num">120+</div>
                <div class="lbl">Posyandu Aktif</div>
            </div>
            <div class="hero-stat-item">
                <div class="num">98%</div>
                <div class="lbl">Kepuasan Kader</div>
            </div>
        </div>
    </div>

    <!-- Visual cards -->
    <div class="hero-visual">
        <div class="hero-card-stack">
            <div class="hcard hcard-back2"></div>
            <div class="hcard hcard-back1"></div>
            <div class="hcard hcard-main">
                <div class="hcard-label">📊 Grafik Tinggi Badan</div>
                <div class="hcard-child">
                    <div class="hcard-avatar">A</div>
                    <div>
                        <div class="hcard-name">Ayu Salsabila</div>
                        <div class="hcard-sub">24 bulan • Perempuan</div>
                    </div>
                </div>
                <div class="hcard-metrics">
                    <div class="hcard-metric">
                        <div class="val">81.2</div>
                        <div class="key">cm – Tinggi</div>
                    </div>
                    <div class="hcard-metric">
                        <div class="val">11.4</div>
                        <div class="key">kg – Berat</div>
                    </div>
                    <div class="hcard-metric">
                        <div class="val">15.4</div>
                        <div class="key">IMT</div>
                    </div>
                </div>
                <div class="hcard-status">
                    <i class="bi bi-check-circle-fill"></i> Status: Normal
                </div>
            </div>

            <div class="float-badge b1">
                <i class="bi bi-calendar-check"></i> Imunisasi 3 hari lagi
            </div>
            <div class="float-badge b2">
                <i class="bi bi-graph-up-arrow"></i> +2.1 cm bulan ini
            </div>
            <div class="float-badge b3">
                <i class="bi bi-people-fill"></i> 12 balita baru
            </div>
        </div>
    </div>
</section>

<!-- ══════ STATS BAR ══════ -->
<div class="stats-section">
    <div class="stat-block reveal">
        <div class="big-num">2.4K+</div>
        <div class="big-lbl">Balita Terpantau</div>
    </div>
    <div class="stat-block reveal">
        <div class="big-num">120+</div>
        <div class="big-lbl">Posyandu Terhubung</div>
    </div>
    <div class="stat-block reveal">
        <div class="big-num">98%</div>
        <div class="big-lbl">Tingkat Akurasi Data</div>
    </div>
    <div class="stat-block reveal">
        <div class="big-num">3x</div>
        <div class="big-lbl">Lebih Cepat dari Manual</div>
    </div>
</div>

<!-- ══════ FEATURES ══════ -->
<section class="section" id="fitur">
    <div class="reveal">
        <div class="section-label">✦ Fitur Unggulan</div>
        <h2 class="section-title">Semua yang Kader<br>Butuhkan, Dalam Satu Tempat</h2>
        <p class="section-sub">Dirancang khusus untuk posyandu dan kader kesehatan agar pemantauan tumbuh kembang balita jadi lebih mudah dan akurat.</p>
    </div>

    <div class="features-grid">
        <a href="{{ route('fitur.data-balita') }}" class="feat-card reveal" style="text-decoration:none;">
    <div class="feat-icon"><i class="bi bi-person-heart"></i></div>
    <h3>Data Balita Lengkap</h3>
    <p>Simpan riwayat lengkap setiap balita mulai dari biodata, riwayat pemeriksaan, hingga catatan khusus dari kader secara terstruktur.</p>
</a>

<a href="{{ route('fitur.grafik-pertumbuhan') }}" class="feat-card reveal" style="text-decoration:none;">
    <div class="feat-icon"><i class="bi bi-graph-up-arrow"></i></div>
    <h3>Grafik Pertumbuhan</h3>
    <p>Visualisasi tren berat badan dan tinggi badan secara otomatis dengan standar WHO untuk deteksi dini stunting dan gizi buruk.</p>
</a>

<a href="{{ route('fitur.jadwal-pengingat') }}" class="feat-card reveal" style="text-decoration:none;">
    <div class="feat-icon"><i class="bi bi-calendar3"></i></div>
    <h3>Jadwal & Pengingat</h3>
    <p>Atur jadwal posyandu, imunisasi, dan penyuluhan dengan notifikasi otomatis agar tidak ada kegiatan yang terlewat.</p>
</a>

<a href="{{ route('fitur.pemeriksaan-digital') }}" class="feat-card reveal" style="text-decoration:none;">
    <div class="feat-icon"><i class="bi bi-clipboard2-pulse"></i></div>
    <h3>Pemeriksaan Digital</h3>
    <p>Catat hasil penimbangan dan pengukuran langsung dari smartphone. Status gizi dihitung otomatis berdasarkan data yang dimasukkan.</p>
</a>

<a href="{{ route('fitur.laporan-statistik') }}" class="feat-card reveal" style="text-decoration:none;">
    <div class="feat-icon"><i class="bi bi-bar-chart-line"></i></div>
    <h3>Laporan & Statistik</h3>
    <p>Generate laporan bulanan dan tahunan dalam hitungan detik. Ekspor data untuk keperluan pelaporan ke puskesmas atau dinas kesehatan.</p>
</a>

<a href="{{ route('fitur.konten-edukasi') }}" class="feat-card reveal" style="text-decoration:none;">
    <div class="feat-icon"><i class="bi bi-book"></i></div>
    <h3>Konten Edukasi</h3>
    <p>Akses artikel, panduan gizi, dan materi penyuluhan yang dikurasi oleh tenaga kesehatan profesional untuk dibagikan ke orang tua balita.</p>
</a>
    </div>
</section>

<!-- ══════ HOW IT WORKS ══════ -->
<section class="how-section" id="cara-kerja">
    <div class="reveal">
        <div class="section-label">✦ Cara Kerja</div>
        <h2 class="section-title">Mulai dalam 4 Langkah Mudah</h2>
        <p class="section-sub">Tidak butuh keahlian teknis. GENTA dirancang agar siapa pun bisa langsung pakai.</p>
    </div>

    <div class="steps-row">
        <div class="step-item reveal">
            <div class="step-num">1</div>
            <h4>Daftar Akun</h4>
            <p>Buat akun kader gratis dalam 2 menit. Tidak perlu kartu kredit atau biaya apapun.</p>
        </div>
        <div class="step-item reveal">
            <div class="step-num">2</div>
            <h4>Input Data Balita</h4>
            <p>Masukkan data balita di wilayah posyandu kamu. Import dari Excel juga tersedia.</p>
        </div>
        <div class="step-item reveal">
            <div class="step-num">3</div>
            <h4>Catat Pemeriksaan</h4>
            <p>Setiap bulan, catat hasil penimbangan. Grafik dan status gizi otomatis terupdate.</p>
        </div>
        <div class="step-item reveal">
            <div class="step-num">4</div>
            <h4>Pantau & Laporkan</h4>
            <p>Pantau perkembangan semua balita sekaligus dan buat laporan kapan saja.</p>
        </div>
    </div>
</section>

<!-- ══════ CTA ══════ -->
<section class="cta-section" id="tentang">
    <div class="reveal">
        <div class="section-label">✦ Bergabung Sekarang</div>
        <h2 class="section-title">Siap Mulai Memantau<br>Generasi Sehat Indonesia?</h2>
        <p class="section-sub">Lebih dari 120 posyandu sudah mempercayai GENTA. Giliran posyandumu.</p>
        <div class="cta-btns">
            <a href="/register" class="btn-cta-primary">
                <i class="bi bi-rocket-takeoff"></i> Mulai Sekarang — Gratis
            </a>
            <a href="/login" class="btn-cta-ghost">
                <i class="bi bi-box-arrow-in-right"></i> Sudah punya akun? Masuk
            </a>
        </div>
    </div>
</section>

<!-- ══════ FOOTER ══════ -->
<footer id="kontak">
    <div class="footer-top">
        <div class="footer-brand">
            <div class="logo-row">
                <div class="logo-icon"><i class="bi bi-heart-pulse-fill"></i></div>
                <span class="logo-name">GENTA</span>
            </div>
            <p>Generasi Sehat Kita — Platform digital pemantauan tumbuh kembang balita untuk posyandu di seluruh Indonesia.</p>
        </div>
        <div class="footer-col">
            <h5>Produk</h5>
            <a href="#fitur">Fitur</a>
            <a href="#cara-kerja">Cara Kerja</a>
            <a href="#">Harga</a>
            <a href="#">Update Terbaru</a>
        </div>
        <div class="footer-col">
            <h5>Sumber Daya</h5>
            <a href="#">Dokumentasi</a>
            <a href="#">Panduan Kader</a>
            <a href="#">Artikel Gizi</a>
            <a href="#">FAQ</a>
        </div>
        <div class="footer-col">
            <h5>Kontak</h5>
            <a href="mailto:geNta@gmail.com">geNta@gmail.com</a>
            <a href="[https://wa.me/6283836305843](https://wa.me/628123456789)">WhatsApp Support</a>
            <a href="#">Instagram</a>
            <a href="#">Facebook</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 GENTA – Generasi Sehat Kita. GENTA.</span>
        <span>Dibuat dengan <i class="bi bi-heart-fill" style="color:var(--g-green-lite);font-size:11px;"></i> untuk kesehatan anak Indonesia</span>
    </div>
</footer>

<script>
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 40);
    });

    // Reveal on scroll
    const reveals = document.querySelectorAll('.reveal');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, i) => {
            if (entry.isIntersecting) {
                setTimeout(() => entry.target.classList.add('visible'), i * 80);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });
    reveals.forEach(el => observer.observe(el));

    // Smooth anchor scroll
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
        });
    });
</script>
</body>
</html>