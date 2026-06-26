<aside class="sidebar">
    <a href="{{ route('dashboard') }}" class="sidebar-brand">
        <img src="{{ asset('https://www.image2url.com/r2/default/images/1780470981952-c4f72cc3-af32-42ae-9228-d8a982bc998a.png') }}" alt="Logo GENTA" style="width:38px;height:38px;border-radius:8px;">
        <span>GENTA</span>
    </a>

    <div class="sidebar-section">
        <div class="sidebar-section-label">Menu Utama</div>
        <a href="{{ route('dashboard') }}" class="nav-item {{ ($active ?? '') === 'dashboard' ? 'active' : '' }}">
            <i class="bi bi-grid-1x2-fill"></i> Dashboard
        </a>
        <a href="{{ route('balita.index') }}" class="nav-item {{ ($active ?? '') === 'balita' ? 'active' : '' }}">
            <i class="bi bi-person-heart"></i> Data Balita
            <span class="nav-badge">{{ \App\Models\Balita::count() }}</span>
        </a>
        <a href="{{ route('pemeriksaan.index') }}" class="nav-item {{ ($active ?? '') === 'pemeriksaan' ? 'active' : '' }}">
            <i class="bi bi-clipboard2-pulse"></i> Pemeriksaan
        </a>
        <a href="{{ route('jadwal.index') }}" class="nav-item {{ ($active ?? '') === 'jadwal' ? 'active' : '' }}">
            <i class="bi bi-calendar3"></i> Jadwal Kegiatan
        </a>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-section-label">Laporan</div>
        <a href="{{ route('laporan.index') }}" class="nav-item {{ ($active ?? '') === 'laporan' ? 'active' : '' }}">
            <i class="bi bi-bar-chart-line"></i> Statistik & Laporan
        </a>
        <a href="{{ route('edukasi.index') }}" class="nav-item {{ ($active ?? '') === 'edukasi' ? 'active' : '' }}">
            <i class="bi bi-book"></i> Konten Edukasi
        </a>
    </div>

    <div class="sidebar-section">
        <div class="sidebar-section-label">Sistem</div>
        <a href="{{ route('kader.index') }}" class="nav-item {{ ($active ?? '') === 'kader' ? 'active' : '' }}">
            <i class="bi bi-people"></i> Kelola Kader
        </a>
        <a href="{{ route('pengaturan.index') }}" class="nav-item {{ ($active ?? '') === 'pengaturan' ? 'active' : '' }}">
            <i class="bi bi-gear"></i> Pengaturan
        </a>
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
                <button type="submit" class="logout-btn" title="Keluar">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</aside>
