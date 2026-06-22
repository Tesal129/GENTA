<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GENTA – Generasi Sehat Kita</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --g-bg:          #F7FBFF;
            --g-bg2:         #EEF9F4;
            --g-bg3:         #E4F5F0;
            --g-green:       #0E9E72;
            --g-green-mid:   #12BC88;
            --g-green-lite:  #E6F7F1;
            --g-blue:        #1565C0;
            --g-blue-mid:    #1976D2;
            --g-blue-lite:   #42A5F5;
            --g-dark:        #0A1628;
            --g-dark2:       #102240;
            --g-text:        #1A2E3B;
            --g-text2:       #3D5A6C;
            --g-muted:       #7A9BB0;
            --g-border:      rgba(21,101,192,.12);
            --g-green-border: rgba(14,158,114,.18);
            --g-white:       #FFFFFF;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Lato', sans-serif;
            background: var(--g-bg);
            color: var(--g-text);
            overflow-x: hidden;
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
            transition: background .4s, padding .4s, box-shadow .4s;
        }
        nav.scrolled {
            background: rgba(247,251,255,.94);
            backdrop-filter: blur(16px);
            padding: 14px 60px;
            box-shadow: 0 2px 20px rgba(21,101,192,.08);
            border-bottom: 1px solid var(--g-border);
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .nav-brand .logo {
            width: 38px; height: 38px;
            border-radius: 10px;
            overflow: hidden;
        }
        .nav-brand span {
            font-family: 'Lato', sans-serif;
            font-weight: 900; font-size: 18px;
            color: var(--g-dark);
            letter-spacing: .02em;
        }

        .nav-links { display: flex; align-items: center; gap: 36px; }
        .nav-links a {
            font-size: 14px; font-weight: 700;
            color: var(--g-text2); text-decoration: none; transition: color .2s;
        }
        .nav-links a:hover { color: var(--g-green); }

        .nav-cta { display: flex; align-items: center; gap: 12px; }

        .btn-outline-nav {
            padding: 8px 20px; border-radius: 8px;
            border: 1.5px solid var(--g-green-border);
            color: var(--g-green); font-size: 13px; font-weight: 700;
            text-decoration: none; transition: all .2s;
        }
        .btn-outline-nav:hover { border-color: var(--g-green); background: rgba(14,158,114,.06); }

        .btn-solid-nav {
            padding: 8px 22px; border-radius: 8px;
            background: var(--g-blue); color: #fff;
            font-size: 13px; font-weight: 700;
            text-decoration: none; transition: all .2s;
            box-shadow: 0 4px 14px rgba(21,101,192,.25);
        }
        .btn-solid-nav:hover { background: var(--g-blue-mid); transform: translateY(-1px); }

        /* ══════════════ HERO ══════════════ */
        .hero {
            min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
            position: relative;
            padding: 140px 60px 100px;
            overflow: hidden;
            background: linear-gradient(160deg, #F7FBFF 0%, #EEF7FF 40%, #E6F7F1 100%);
            text-align: center;
        }

        .hero::before {
            content: '';
            position: absolute; top: -15%; right: -10%;
            width: 60vw; height: 70vh;
            background: radial-gradient(ellipse, rgba(21,101,192,.07) 0%, transparent 65%);
            pointer-events: none;
        }
        .hero::after {
            content: '';
            position: absolute; bottom: -10%; left: -5%;
            width: 45vw; height: 55vh;
            background: radial-gradient(ellipse, rgba(14,158,114,.09) 0%, transparent 65%);
            pointer-events: none;
        }

        .hero-grid {
            position: absolute; inset: 0;
            background-image: radial-gradient(circle, rgba(14,158,114,.07) 1px, transparent 1px);
            background-size: 36px 36px;
            pointer-events: none;
        }

        .hero-content {
            position: relative; z-index: 2;
            max-width: 720px;
            display: flex; flex-direction: column; align-items: center;
        }

        .hero-pill {
            display: inline-flex; align-items: center; gap: 8px;
            background: rgba(14,158,114,.1);
            border: 1px solid rgba(14,158,114,.25);
            border-radius: 100px; padding: 6px 16px;
            font-size: 12px; font-weight: 700; color: var(--g-green);
            letter-spacing: .06em; text-transform: uppercase;
            margin-bottom: 28px; opacity: 0;
            animation: fadeUp .7s .2s forwards;
        }

        .hero h1 {
            font-family: 'Lato', sans-serif;
            font-size: clamp(40px, 5.5vw, 68px);
            font-weight: 900; line-height: 1.08;
            letter-spacing: -.02em; color: var(--g-dark);
            opacity: 0; animation: fadeUp .7s .35s forwards;
        }
        .hero h1 em { font-style: normal; color: var(--g-blue); }

        .hero p {
            margin-top: 22px; font-size: 17px; line-height: 1.75;
            color: var(--g-text2); font-weight: 300; max-width: 520px;
            opacity: 0; animation: fadeUp .7s .5s forwards;
        }

        .hero-actions {
            display: flex; align-items: center; justify-content: center;
            gap: 16px; margin-top: 40px;
            opacity: 0; animation: fadeUp .7s .65s forwards;
        }

        .btn-hero-primary {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 14px 30px; background: var(--g-blue); color: #fff;
            border-radius: 12px; font-size: 15px; font-weight: 700;
            text-decoration: none; transition: all .2s;
            box-shadow: 0 8px 28px rgba(21,101,192,.3);
        }
        .btn-hero-primary:hover { background: var(--g-blue-mid); transform: translateY(-2px); box-shadow: 0 14px 40px rgba(21,101,192,.42); color: #fff; }

        .btn-hero-ghost {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 14px 26px; border: 1.5px solid var(--g-green-border);
            border-radius: 12px; color: var(--g-green);
            font-size: 15px; font-weight: 400; text-decoration: none; transition: all .2s;
        }
        .btn-hero-ghost:hover { border-color: var(--g-green); background: rgba(14,158,114,.05); }

        .hero-stats {
            display: flex; gap: 40px; margin-top: 60px; padding-top: 40px;
            border-top: 1px solid rgba(14,158,114,.15);
            opacity: 0; animation: fadeUp .7s .8s forwards;
            justify-content: center;
        }
        .hero-stat-item .num {
            font-family: 'Lato', sans-serif; font-size: 28px; font-weight: 900;
            color: var(--g-green); line-height: 1;
        }
        .hero-stat-item .lbl { font-size: 12px; color: var(--g-muted); margin-top: 4px; }

        /* ══════════════ STATS BAR ══════════════ */
        .stats-section {
            padding: 0 60px; display: grid; grid-template-columns: repeat(4, 1fr);
            background: #F0FBF6;
            border-top: 1px solid rgba(14,158,114,.15);
            border-bottom: 1px solid rgba(14,158,114,.15);
        }
        .stat-block { text-align: center; padding: 44px 20px; border-right: 1px solid rgba(14,158,114,.1); }
        .stat-block:last-child { border-right: none; }
        .stat-block .big-num {
            font-family: 'Lato', sans-serif; font-size: 46px; font-weight: 900;
            line-height: 1; letter-spacing: -.03em; color: var(--g-green);
        }
        .stat-block .big-lbl { font-size: 14px; color: var(--g-muted); margin-top: 8px; font-weight: 400; }

        /* ══════════════ FEATURES ══════════════ */
        .section { padding: 100px 60px; position: relative; background: var(--g-white); }

        .section-label {
            font-size: 11px; font-weight: 700; letter-spacing: .12em;
            text-transform: uppercase; color: var(--g-green); margin-bottom: 14px;
        }
        .section-title {
            font-family: 'Lato', sans-serif;
            font-size: clamp(28px, 4vw, 46px); font-weight: 900;
            letter-spacing: -.02em; line-height: 1.1; color: var(--g-dark); margin-bottom: 16px;
        }
        .section-sub { font-size: 16px; color: var(--g-muted); font-weight: 300; max-width: 520px; line-height: 1.7; }

        .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 56px; }

        .feat-card {
            background: var(--g-bg);
            border: 1px solid rgba(14,158,114,.1);
            border-radius: 20px; padding: 32px 28px;
            transition: all .3s; position: relative; overflow: hidden;
            text-decoration: none; display: block;
        }
        .feat-card::before {
            content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
            background: var(--g-green); opacity: 0; transition: opacity .3s;
        }
        .feat-card:hover { border-color: rgba(14,158,114,.25); transform: translateY(-4px); box-shadow: 0 16px 44px rgba(14,158,114,.1); }
        .feat-card:hover::before { opacity: 1; }

        .feat-icon {
            width: 48px; height: 48px; border-radius: 14px;
            background: rgba(14,158,114,.1); border: 1px solid rgba(14,158,114,.2);
            display: flex; align-items: center; justify-content: center; margin-bottom: 22px;
        }
        .feat-icon i { font-size: 21px; color: var(--g-green); }

        .feat-card h3 {
            font-family: 'Lato', sans-serif; font-size: 17px; font-weight: 700;
            color: var(--g-dark); margin-bottom: 10px; letter-spacing: -.01em;
        }
        .feat-card p { font-size: 14px; color: var(--g-muted); line-height: 1.7; font-weight: 400; }

        /* ══════════════ HOW IT WORKS ══════════════ */
        .how-section {
            padding: 100px 60px;
            background: linear-gradient(160deg, #EEF9F4 0%, #E4F5F0 100%);
            position: relative; overflow: hidden;
        }
        .how-section::before {
            content: ''; position: absolute; right: -80px; top: -80px;
            width: 400px; height: 400px;
            background: radial-gradient(circle, rgba(14,158,114,.08) 0%, transparent 70%);
        }

        .steps-row {
            display: grid; grid-template-columns: repeat(4, 1fr);
            gap: 32px; margin-top: 60px; position: relative;
        }
        .steps-row::before {
            content: ''; position: absolute;
            top: 28px; left: 14%; right: 14%; height: 1px;
            background: linear-gradient(90deg, transparent, rgba(14,158,114,.3), rgba(21,101,192,.3), transparent);
        }

        .step-item { text-align: center; }
        .step-num {
            width: 56px; height: 56px; border-radius: 50%;
            background: var(--g-green);
            display: flex; align-items: center; justify-content: center;
            font-family: 'Lato', sans-serif; font-size: 18px; font-weight: 900; color: #fff;
            margin: 0 auto 20px; position: relative; z-index: 1;
            box-shadow: 0 6px 20px rgba(14,158,114,.25);
        }
        .step-item h4 { font-family: 'Lato', sans-serif; font-size: 15px; font-weight: 700; color: var(--g-dark); margin-bottom: 8px; }
        .step-item p  { font-size: 13px; color: var(--g-text2); line-height: 1.6; font-weight: 400; }

        /* ══════════════ CTA ══════════════ */
        .cta-section {
            padding: 120px 60px; text-align: center;
            position: relative; overflow: hidden;
            background: linear-gradient(135deg, var(--g-dark) 0%, var(--g-dark2) 100%);
        }
        .cta-section::before {
            content: ''; position: absolute; inset: 0;
            background: radial-gradient(ellipse at center, rgba(255, 255, 255, 0.12) 0%, transparent 65%);
        }
        .cta-section .section-title { color: #fff; margin: 0 auto 16px; }
        .cta-section .section-sub { color: rgba(255,255,255,.55); margin: 0 auto 40px; text-align: center; }
        .cta-section .section-label { text-align: center; color: var(--g-green-mid); }

        .cta-btns { display: flex; align-items: center; justify-content: center; gap: 16px; flex-wrap: wrap; }

        .btn-cta-primary {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 16px 36px; background: var(--g-blue); color: #fff;
            border-radius: 14px; font-size: 16px; font-weight: 700;
            text-decoration: none; transition: all .2s;
            box-shadow: 0 10px 36px rgba(21,101,192,.4);
        }
        .btn-cta-primary:hover { background: var(--g-blue-mid); transform: translateY(-3px); color: #fff; }

        .btn-cta-ghost {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 16px 32px; border: 1.5px solid rgba(14,158,114,.35);
            border-radius: 14px; color: #6EE7B7;
            font-size: 16px; font-weight: 400; text-decoration: none; transition: all .2s;
        }
        .btn-cta-ghost:hover { border-color: var(--g-green-mid); color: #fff; }

        /* ══════════════ FOOTER ══════════════ */
        footer {
            background: var(--g-white);
            border-top: 1px solid var(--g-border);
            padding: 60px 60px 32px;
        }
        .footer-top { display: grid; grid-template-columns: 1.5fr 1fr 1fr 1fr; gap: 48px; margin-bottom: 48px; }

        .footer-brand .logo-row { display: flex; align-items: center; gap: 10px; margin-bottom: 14px; }
        .footer-brand .logo-icon {
            width: 36px; height: 36px; background: var(--g-green);
            border-radius: 9px; display: flex; align-items: center; justify-content: center;
        }
        .footer-brand .logo-icon i { color: #fff; font-size: 16px; }
        .footer-brand .logo-name { font-family: 'Lato', sans-serif; font-weight: 900; font-size: 17px; color: var(--g-dark); }
        .footer-brand p { font-size: 13px; color: var(--g-muted); line-height: 1.7; max-width: 240px; font-weight: 400; }

        .footer-col h5 {
            font-family: 'Lato', sans-serif; font-size: 13px; font-weight: 700;
            color: var(--g-dark); letter-spacing: .05em; text-transform: uppercase; margin-bottom: 16px;
        }
        .footer-col a { display: block; font-size: 13px; color: var(--g-muted); text-decoration: none; margin-bottom: 10px; transition: color .2s; font-weight: 400; }
        .footer-col a:hover { color: var(--g-green); }

        .footer-bottom {
            display: flex; align-items: center; justify-content: space-between;
            padding-top: 24px; border-top: 1px solid var(--g-border);
            font-size: 12px; color: var(--g-muted); font-weight: 400;
        }

        /* ══════════════ ANIMATIONS ══════════════ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes float1 { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        @keyframes float2 { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(8px); } }

        .reveal { opacity: 0; transform: translateY(30px); transition: opacity .7s, transform .7s; }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        /* ══════════════ RESPONSIVE ══════════════ */
        @media (max-width: 1024px) {
            nav { padding: 18px 28px; }
            nav.scrolled { padding: 14px 28px; }
            .nav-links { display: none; }
            .hero { padding: 120px 28px 80px; }
            .features-grid { grid-template-columns: 1fr 1fr; }
            .steps-row { grid-template-columns: 1fr 1fr; }
            .steps-row::before { display: none; }
            .stats-section { grid-template-columns: 1fr 1fr; padding: 0 28px; }
            .footer-top { grid-template-columns: 1fr 1fr; }
            .section { padding: 70px 28px; }
            .how-section { padding: 70px 28px; }
            .cta-section { padding: 80px 28px; }
            footer { padding: 48px 28px 24px; }
        }
        @media (max-width: 600px) {
            .features-grid { grid-template-columns: 1fr; }
            .steps-row { grid-template-columns: 1fr; }
            .stats-section { grid-template-columns: 1fr 1fr; }
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
            <img src="{{ asset('https://www.image2url.com/r2/default/images/1780470981952-c4f72cc3-af32-42ae-9228-d8a982bc998a.png') }}" alt="Logo GENTA" style="width:38px; height:38px; border-radius:8px;">
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
        <a href="/register" class="btn-solid-nav">Yuk Daftar</a>
    </div>
</nav>

<!-- ══════ HERO ══════ -->
<section class="hero" id="beranda">
    <div class="hero-grid"></div>
    <div class="hero-content">
        <h1>Langkah Kecil<br>untuk <em>Generasi</em><br><em>Masa Depan</em></h1>
        <p>Catatan medis, jadwal imunisasi, dan grafik perkembangan anak — semua dalam satu platform digital yang aman, mudah, dan selalu siap menemanimu.</p>
        <div class="hero-actions">
            <a href="/register" class="btn-hero-primary">Yuk Daftar</a>
            <a href="#fitur" class="btn-hero-ghost">Lihat Fitur</a>
        </div>
</section>

<!-- ══════ STATS BAR ══════ -->
<div class="stats-section">
    <div class="stat-block reveal"><div class="big-num">2.4K+</div><div class="big-lbl">Balita Terpantau</div></div>
    <div class="stat-block reveal"><div class="big-num">120+</div><div class="big-lbl">Posyandu Terhubung</div></div>
    <div class="stat-block reveal"><div class="big-num">98%</div><div class="big-lbl">Tingkat Akurasi Data</div></div>
    <div class="stat-block reveal"><div class="big-num">3x</div><div class="big-lbl">Lebih Cepat dari Manual</div></div>
</div>

<!-- ══════ FEATURES ══════ -->
<section class="section" id="fitur">
    <div class="reveal">
        <h2 class="section-title">Semua yang Kader<br>Butuhkan, Dalam Satu Tempat</h2>
        <p class="section-sub">Dirancang khusus untuk posyandu dan kader kesehatan agar pemantauan tumbuh kembang balita jadi lebih mudah dan akurat.</p>
    </div>
    <div class="features-grid">
        <a href="{{ route('fitur.data-balita') }}" class="feat-card reveal">
            <div class="feat-icon"><i class="bi bi-person-heart"></i></div>
            <h3>Data Balita Lengkap</h3>
            <p>Simpan riwayat lengkap setiap balita mulai dari biodata, riwayat pemeriksaan, hingga catatan khusus dari kader secara terstruktur.</p>
        </a>
        <a href="{{ route('fitur.grafik-pertumbuhan') }}" class="feat-card reveal">
            <div class="feat-icon"><i class="bi bi-graph-up-arrow"></i></div>
            <h3>Grafik Pertumbuhan</h3>
            <p>Visualisasi tren berat badan dan tinggi badan secara otomatis dengan standar WHO untuk deteksi dini stunting dan gizi buruk.</p>
        </a>
        <a href="{{ route('fitur.jadwal-pengingat') }}" class="feat-card reveal">
            <div class="feat-icon"><i class="bi bi-calendar3"></i></div>
            <h3>Jadwal & Pengingat</h3>
            <p>Atur jadwal posyandu, imunisasi, dan penyuluhan dengan notifikasi otomatis agar tidak ada kegiatan yang terlewat.</p>
        </a>
        <a href="{{ route('fitur.pemeriksaan-digital') }}" class="feat-card reveal">
            <div class="feat-icon"><i class="bi bi-clipboard2-pulse"></i></div>
            <h3>Pemeriksaan Digital</h3>
            <p>Catat hasil penimbangan dan pengukuran langsung dari smartphone. Status gizi dihitung otomatis berdasarkan data yang dimasukkan.</p>
        </a>
    </div>
</section>

<!-- ══════ HOW IT WORKS ══════ -->
<section class="how-section" id="cara-kerja">
    <div class="reveal">
        <h2 class="section-title">Mulai dalam 4 Langkah Mudah</h2>
        <p class="section-sub">Tidak butuh keahlian teknis. GENTA dirancang agar siapa pun bisa langsung pakai.</p>
    </div>
    <div class="steps-row">
        <div class="step-item reveal">
            <div class="step-num">1</div>
            <h4>Input Data Balita</h4>
            <p>Masukkan data balitamu melalui fitur Yuk Daftar yang ada di atas.</p>
        </div>
        <div class="step-item reveal">
            <div class="step-num">2</div>
            <h4>Proses Pemeriksaan</h4>
            <p>Selanjutnya akan dilakukan pemeriksaan lanjutan oleh dokter berpengalaman.</p>
        </div>
        <div class="step-item reveal">
            <div class="step-num">3</div>
            <h4>Catat Pemeriksaan</h4>
            <p>Setiap bulan, catat hasil penimbangan. Grafik dan status gizi otomatis terupdate.</p>
        </div>
        <div class="step-item reveal">
            <div class="step-num">4</div>
            <h4>Pantau & Laporkan</h4>
            <p>Cs akan menghubungimu melalui whatsaap setiap kamu melakukan pemeriksaan berkala.</p>
        </div>
    </div>
</section>

<!-- ══════ FOOTER ══════ -->
<footer id="kontak">
    <div class="footer-top">
        <div class="footer-brand">
            <div class="logo-row">
                <div class="logo-icon">
                    <img src="{{ asset('https://www.image2url.com/r2/default/images/1780470981952-c4f72cc3-af32-42ae-9228-d8a982bc998a.png') }}" alt="Logo GENTA" style="width:40px; height:40px; border-radius:8px;">
                </div>
                <span class="logo-name">GENTA</span>
            </div>
            <p>Generasi Sehat Kita — Platform digital pemantauan tumbuh kembang balita untuk posyandu di seluruh Indonesia.</p>
        </div>
        <div class="footer-col">
            <h5>Produk</h5>
            <a href="#fitur">Fitur</a>
            <a href="#cara-kerja">Cara Kerja</a>
        </div>
        <div class="footer-col">
            <h5>Sumber Daya</h5>
            <a href="#">Panduan Kader</a>
            <a href="#">FAQ</a>
        </div>
        <div class="footer-col">
            <h5>Kontak</h5>
            <a href="mailto:genta@gmail.com">genta@gmail.com</a>
            <a href="https://wa.me/6283836305843">Cutomer Servis GENTA</a>
            <a href="#">Instagram</a>
            <a href="#">Facebook</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>© 2026 GENTA – Generasi Sehat Kita.</span>
        <span>Dibuat dengan hati untuk kesehatan anak Indonesia</span>
    </div>
</footer>

<script>
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 40);
    });

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

    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const target = document.querySelector(a.getAttribute('href'));
            if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
        });
    });
</script>
</body>
</html>