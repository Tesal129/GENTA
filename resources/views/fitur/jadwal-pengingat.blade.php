<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jadwal Pengingat Kesehatan</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: sans-serif;
      background: #f5f5f0;
      color: #1a1a18;
      padding: 2rem;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .remind-wrap {
      width: 100%;
      max-width: 420px;
      background: #fff;
      border: 0.5px solid #e2e2dd;
      border-radius: 16px;
      overflow: hidden;
    }

    /* Header */
    .remind-header {
      padding: 1.25rem 1.5rem;
      border-bottom: 0.5px solid #e2e2dd;
      display: flex; align-items: center; justify-content: space-between;
    }
    .header-left { display: flex; align-items: center; gap: 10px; }
    .header-icon {
      width: 36px; height: 36px; border-radius: 10px;
      background: #E1F5EE; display: flex;
      align-items: center; justify-content: center; flex-shrink: 0;
    }
    .header-icon i { font-size: 18px; color: #0F6E56; }
    .header-title { font-size: 15px; font-weight: 600; color: #1a1a18; }
    .header-sub { font-size: 11px; color: #888780; margin-top: 1px; }
    .btn-cal {
      display: flex; align-items: center; gap: 4px;
      font-size: 12px; color: #0F6E56;
      background: none; border: none; cursor: pointer; font-family: sans-serif;
    }
    .btn-cal i { font-size: 14px; }

    /* List */
    .remind-list {
      padding: 1rem 1.25rem;
      display: flex; flex-direction: column; gap: 8px;
    }

    .remind-item {
      display: flex; align-items: center; gap: 12px;
      padding: 12px; border: 0.5px solid #e2e2dd;
      border-radius: 12px; background: #f8f8f5;
    }
    .remind-item.upcoming { border-color: #5DCAA5; background: #E1F5EE; }
    .remind-item.done { opacity: 0.6; }

    /* Ikon */
    .item-icon {
      width: 36px; height: 36px; border-radius: 10px;
      display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
    .item-icon.teal { background: #9FE1CB; border: 0.5px solid #5DCAA5; }
    .item-icon.teal i { font-size: 18px; color: #085041; }
    .item-icon.green { background: #E1F5EE; border: 0.5px solid #9FE1CB; }
    .item-icon.green i { font-size: 18px; color: #0F6E56; }
    .item-icon.neutral { background: #fff; border: 0.5px solid #d3d1c7; }
    .item-icon.neutral i { font-size: 18px; color: #888780; }

    /* Body */
    .item-body { flex: 1; }
    .item-name { font-size: 14px; font-weight: 600; color: #1a1a18; }
    .item-name.done { text-decoration: line-through; color: #888780; }
    .item-date {
      font-size: 11px; color: #888780; margin-top: 2px;
      display: flex; align-items: center; gap: 4px;
    }
    .item-date i { font-size: 12px; }

    /* Kanan */
    .item-right {
      display: flex; flex-direction: column;
      align-items: flex-end; gap: 4px; flex-shrink: 0;
    }
    .badge { padding: 3px 8px; border-radius: 99px; font-size: 11px; }
    .badge.teal { background: #1D9E75; color: #E1F5EE; }
    .badge.green { background: #E1F5EE; color: #085041; border: 0.5px solid #9FE1CB; }
    .badge.neutral { background: #f5f5f0; color: #5f5e5a; border: 0.5px solid #d3d1c7; }
    .countdown {
      font-size: 11px; color: #0F6E56;
      display: flex; align-items: center; gap: 3px;
    }
    .countdown i { font-size: 12px; }

    /* Footer */
    .remind-footer {
      padding: 10px 1.5rem;
      border-top: 0.5px solid #e2e2dd;
      background: #f8f8f5;
      display: flex; align-items: center;
      justify-content: center; gap: 5px;
    }
    .remind-footer i { font-size: 13px; color: #888780; }
    .remind-footer span { font-size: 11px; color: #888780; }
  </style>
</head>
<body>

<div class="remind-wrap">

  <div class="remind-header">
    <div class="header-left">
      <div class="header-icon">
        <i class="ti ti-clock"></i>
      </div>
      <div>
        <div class="header-title">Jadwal pengingat</div>
        <div class="header-sub">Kesehatan buah hati</div>
      </div>
    </div>
    <button class="btn-cal">
      <i class="ti ti-calendar"></i> Kalender
    </button>
  </div>

  <div class="remind-list">

    <!-- Mendatang -->
    <div class="remind-item upcoming">
      <div class="item-icon teal">
        <i class="ti ti-vaccine"></i>
      </div>
      <div class="item-body">
        <div class="item-name">Imunisasi Campak</div>
        <div class="item-date"><i class="ti ti-calendar"></i> 20 Mei 2026</div>
      </div>
      <div class="item-right">
        <span class="badge teal">Mendatang</span>
        <span class="countdown"><i class="ti ti-hourglass"></i> 5 hari lagi</span>
      </div>
    </div>

    <!-- Selesai -->
    <div class="remind-item done">
      <div class="item-icon green">
        <i class="ti ti-check"></i>
      </div>
      <div class="item-body">
        <div class="item-name done">Vitamin A</div>
        <div class="item-date">Selesai pada 01 Mei</div>
      </div>
      <div class="item-right">
        <span class="badge green">Selesai</span>
      </div>
    </div>

    <!-- Terjadwal -->
    <div class="remind-item">
      <div class="item-icon neutral">
        <i class="ti ti-stethoscope"></i>
      </div>
      <div class="item-body">
        <div class="item-name">Pemeriksaan bulanan</div>
        <div class="item-date"><i class="ti ti-calendar"></i> 01 Juni 2026</div>
      </div>
      <div class="item-right">
        <span class="badge neutral">Terjadwal</span>
      </div>
    </div>

  </div>

  <div class="remind-footer">
    <i class="ti ti-bell"></i>
    <span>Notifikasi aktif untuk semua jadwal</span>
  </div>

</div>

</body>
</html>