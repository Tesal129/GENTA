<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=2" type="image/png">
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; font-size: 12px; color: #1A2E3B; }
        h1 { font-size: 18px; margin-bottom: 2px; }
        .sub { color: #7A9BB0; font-size: 11px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 6px 10px; text-align: left; font-size: 11px; }
        th { background: #F7FBFF; }
        .summary-table td { border: none; padding: 4px 10px; }
        .summary-num { font-size: 16px; font-weight: bold; color: #0E9E72; }
        h2 { font-size: 13px; margin: 16px 0 8px; }
    </style>
</head>
<body>
    <h1>Statistik & Laporan – GENTA</h1>
    <div class="sub">Periode: {{ $namaBulan }} {{ $tahun }}</div>

    <table class="summary-table">
        <tr>
            <td>
                <div class="summary-num">{{ $totalBalita }}</div>
                Total Balita
            </td>
            <td>
                <div class="summary-num">{{ $totalPemeriksaan }}</div>
                Total Pemeriksaan
            </td>
            <td>
                <div class="summary-num">{{ $statusGizi->get('normal', 0) }}</div>
                Status Normal
            </td>
            <td>
                <div class="summary-num">{{ $statusGizi->get('stunting', 0) + $statusGizi->get('gizi_buruk', 0) }}</div>
                Perlu Perhatian
            </td>
        </tr>
    </table>

    <h2>Distribusi Status Gizi</h2>
    <table>
        <thead><tr><th>Status</th><th>Jumlah</th></tr></thead>
        <tbody>
            @forelse($statusGizi as $status => $total)
                <tr><td>{{ ucwords(str_replace('_', ' ', $status)) }}</td><td>{{ $total }}</td></tr>
            @empty
                <tr><td colspan="2">Belum ada data</td></tr>
            @endforelse
        </tbody>
    </table>

    <h2>Kegiatan</h2>
    <table>
        <thead><tr><th>Tipe</th><th>Jumlah</th></tr></thead>
        <tbody>
            @forelse($kegiatanPerTipe as $tipe => $total)
                <tr><td>{{ ucfirst($tipe) }}</td><td>{{ $total }}</td></tr>
            @empty
                <tr><td colspan="2">Belum ada jadwal</td></tr>
            @endforelse
        </tbody>
    </table>

    <h2>Pemeriksaan Terbaru</h2>
    <table>
        <thead><tr><th>Balita</th><th>Tanggal</th><th>Berat</th><th>Tinggi</th><th>Status</th></tr></thead>
        <tbody>
            @forelse($pemeriksaanTerbaru as $p)
                <tr>
                    <td>{{ $p->balita->nama_balita ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($p->tanggal_periksa)->format('d M Y') }}</td>
                    <td>{{ $p->berat_badan }} kg</td>
                    <td>{{ $p->tinggi_badan }} cm</td>
                    <td>{{ $p->status_gizi ? ucwords(str_replace('_', ' ', $p->status_gizi)) : '-' }}</td>
                </tr>
            @empty
                <tr><td colspan="5">Belum ada pemeriksaan</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>


