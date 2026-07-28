<style>
/* Dark Mode variables - Global */
body.dark-mode {
    --g-bg: #0f172a;
    --g-green: #10b981;
    --g-green-lite: rgba(16, 185, 129, 0.1);
    --g-green-border: rgba(16, 185, 129, 0.2);
    --g-blue: #3b82f6;
    --g-blue-mid: #60a5fa;
    --g-dark: #f8fafc;
    --g-text: #f1f5f9;
    --g-text2: #cbd5e1;
    --g-muted: #94a3b8;
    --g-border: #334155;
    --g-white: #1e293b;
    --g-bg-card: #1e293b;
    --g-gray: #334155;
}
body.dark-mode .form-card, body.dark-mode .sidebar, body.dark-mode .info-card {
    background: var(--g-bg-card);
    border-color: var(--g-border);
}
body.dark-mode input, body.dark-mode select, body.dark-mode textarea {
    background: #0f172a;
    color: #f1f5f9;
    border-color: #475569;
}
body.dark-mode .sidebar a.active {
    background: var(--g-green-lite);
}
body.dark-mode .sidebar a:hover {
    background: #334155;
}
body.dark-mode table th {
    background: #0f172a;
    color: var(--g-text);
}
body.dark-mode table td, body.dark-mode table th {
    border-color: #334155;
}
body.dark-mode .alert {
    background: var(--g-green-lite);
    border-color: var(--g-green);
    color: var(--g-green);
}
</style>
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



