<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Statistik Posyandu</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: sans-serif;
      background: #f5f5f0;
      color: #1a1a18;
      min-height: 100vh;
      padding: 2rem;
    }

    /* Layout utama */
    .dash { max-width: 960px; margin: 0 auto; display: flex; flex-direction: column; gap: 1.25rem; }

    /* Header */
    .dash-header { display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .dash-title { font-size: 22px; font-weight: 600; color: #1a1a18; }
    .dash-sub { font-size: 12px; color: #888780; margin-top: 4px; }
    .header-actions { display: flex; gap: 8px; }
    .btn-outline {
      display: flex; align-items: center; gap: 6px;
      padding: 8px 14px; border: 0.5px solid #d3d1c7;
      border-radius: 8px; background: #fff; color: #5f5e5a;
      font-size: 13px; cursor: pointer; transition: background 0.15s;
      font-family: sans-serif;
    }
    .btn-outline:hover { background: #f5f5f0; }
    .btn-outline i { font-size: 15px; }
    .btn-primary {
      display: flex; align-items: center; gap: 6px;
      padding: 8px 14px; border: none;
      border-radius: 8px; background: #1D9E75; color: #fff;
      font-size: 13px; cursor: pointer; transition: background 0.15s;
      font-family: sans-serif;
    }
    .btn-primary:hover { background: #0F6E56; }
    .btn-primary i { font-size: 15px; }

    /* Metric cards */
    .metrics-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 10px; }
    .metric-card { background: #fff; border: 0.5px solid #e2e2dd; border-radius: 10px; padding: 1rem; }
    .metric-label { font-size: 12px; color: #888780; margin-bottom: 6px; }
    .metric-value-row { display: flex; align-items: baseline; gap: 6px; }
    .metric-value { font-size: 28px; font-weight: 600; color: #1a1a18; line-height: 1; }
    .metric-value.teal { color: #0F6E56; }
    .metric-value.amber { color: #BA7517; }
    .metric-badge { font-size: 11px; color: #888780; }
    .metric-badge.up { color: #0F6E56; }
    .progress-bar { margin-top: 8px; height: 3px; background: #e2e2dd; border-radius: 99px; overflow: hidden; }
    .progress-fill { height: 100%; background: #1D9E75; border-radius: 99px; }

    /* Grid bawah */
    .main-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 12px; }
    .card { background: #fff; border: 0.5px solid #e2e2dd; border-radius: 12px; padding: 1.25rem; }
    .card-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.25rem; }
    .card-title { font-size: 14px; font-weight: 600; color: #1a1a18; }
    .period-select {
      font-size: 12px; color: #0F6E56; background: #E1F5EE;
      border: none; border-radius: 6px; padding: 4px 8px; cursor: pointer;
      font-family: sans-serif;
    }

    /* Chart */
    .chart-wrap { position: relative; height: 220px; width: 100%; }

    /* Aktivitas */
    .activity-list { display: flex; flex-direction: column; gap: 1rem; }
    .activity-item { display: flex; align-items: flex-start; gap: 10px; }
    .dot { width: 8px; height: 8px; border-radius: 50%; margin-top: 4px; flex-shrink: 0; }
    .dot.green { background: #1D9E75; }
    .dot.green-muted { background: #9FE1CB; }
    .dot.amber { background: #EF9F27; }
    .activity-name { font-size: 13px; font-weight: 600; color: #1a1a18; }
    .activity-sub { font-size: 12px; color: #888780; margin-top: 2px; }
    .btn-log {
      width: 100%; margin-top: 1.25rem; padding: 9px;
      border: 0.5px solid #e2e2dd; border-radius: 8px;
      background: transparent; color: #888780; font-size: 12px;
      cursor: pointer; font-family: sans-serif;
      transition: background 0.15s, color 0.15s, border-color 0.15s;
    }
    .btn-log:hover { background: #E1F5EE; color: #0F6E56; border-color: #5DCAA5; }

    @media (max-width: 600px) {
      .main-grid { grid-template-columns: 1fr; }
      .dash-header { flex-direction: column; }
    }
  </style>
</head>
<body>

<div class="dash">

  <!-- Header -->
  <div class="dash-header">
    <div>
      <div class="dash-title">Laporan statistik</div>
      <div class="dash-sub">Data ringkasan posyandu • Mei 2026</div>
    </div>
    <div class="header-actions">
      <button class="btn-outline">
        <i class="ti ti-download"></i> Cetak PDF
      </button>
      <button class="btn-primary">
        <i class="ti ti-adjustments-horizontal"></i> Filter periode
      </button>
    </div>
  </div>

  <!-- Metric cards -->
  <div class="metrics-row">
    <div class="metric-card">
      <div class="metric-label">Total balita</div>
      <div class="metric-value-row">
        <span class="metric-value">128</span>
        <span class="metric-badge up">+4 bln ini</span>
      </div>
    </div>
    <div class="metric-card">
      <div class="metric-label">Sudah periksa</div>
      <div class="metric-value-row">
        <span class="metric-value">92</span>
        <span class="metric-badge">/ 128 anak</span>
      </div>
      <div class="progress-bar"><div class="progress-fill" style="width:72%"></div></div>
    </div>
    <div class="metric-card">
      <div class="metric-label">Kondisi sehat</div>
      <div class="metric-value-row">
        <span class="metric-value teal">84%</span>
      </div>
      <div class="progress-bar"><div class="progress-fill" style="width:84%"></div></div>
    </div>
    <div class="metric-card">
      <div class="metric-label">Status stunting</div>
      <div class="metric-value-row">
        <span class="metric-value amber">2</span>
        <span class="metric-badge">kasus baru</span>
      </div>
    </div>
  </div>

  <!-- Grid bawah -->
  <div class="main-grid">

    <!-- Grafik -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Tren pertumbuhan berat badan</span>
        <select class="period-select">
          <option>6 bulan terakhir</option>
          <option>3 bulan terakhir</option>
        </select>
      </div>
      <div class="chart-wrap">
        <canvas id="growthChart"></canvas>
      </div>
    </div>

    <!-- Aktivitas -->
    <div class="card">
      <div class="card-header">
        <span class="card-title">Aktivitas terakhir</span>
      </div>
      <div class="activity-list">
        <div class="activity-item">
          <div class="dot green"></div>
          <div>
            <div class="activity-name">Pemeriksaan selesai</div>
            <div class="activity-sub">Andi Wijaya • 10:45 WIB</div>
          </div>
        </div>
        <div class="activity-item">
          <div class="dot green-muted"></div>
          <div>
            <div class="activity-name">Input data balita baru</div>
            <div class="activity-sub">Siti Aminah • 09:12 WIB</div>
          </div>
        </div>
        <div class="activity-item">
          <div class="dot amber"></div>
          <div>
            <div class="activity-name">Jadwal imunisasi esok</div>
            <div class="activity-sub">12 balita terdaftar</div>
          </div>
        </div>
      </div>
      <button class="btn-log">Lihat log aktivitas →</button>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  new Chart(document.getElementById('growthChart'), {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
      datasets: [{
        label: 'Rata-rata berat (kg)',
        data: [8.2, 8.5, 8.9, 9.4, 9.8, 10.2],
        borderColor: '#1D9E75',
        backgroundColor: 'rgba(29,158,117,0.08)',
        fill: true,
        tension: 0.4,
        borderWidth: 2,
        pointRadius: 3,
        pointBackgroundColor: '#1D9E75',
        pointBorderColor: '#fff',
        pointBorderWidth: 2,
        pointHoverRadius: 5
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false },
        tooltip: { callbacks: { label: ctx => ctx.parsed.y.toFixed(1) + ' kg' } }
      },
      scales: {
        y: {
          grid: { color: 'rgba(0,0,0,0.05)' },
          ticks: { color: '#b4b2a9', font: { size: 11 }, callback: v => v.toFixed(1) + ' kg' },
          border: { display: false }
        },
        x: {
          grid: { display: false },
          ticks: { color: '#b4b2a9', font: { size: 11 } },
          border: { display: false }
        }
      }
    }
  });
</script>

</body>
</html>