<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edukasi Orang Tua</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: sans-serif;
      background: #f5f5f0;
      color: #1a1a18;
      padding: 2rem;
      min-height: 100vh;
    }

    .edu-wrap {
      max-width: 900px;
      margin: 0 auto;
      display: flex;
      flex-direction: column;
      gap: 1.25rem;
    }

    /* Header */
    .edu-header { display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .edu-header-left { display: flex; align-items: center; gap: 12px; }
    .edu-icon {
      width: 40px; height: 40px; border-radius: 10px;
      background: #E1F5EE; display: flex; align-items: center;
      justify-content: center; flex-shrink: 0;
    }
    .edu-icon i { font-size: 20px; color: #0F6E56; }
    .edu-title { font-size: 18px; font-weight: 600; color: #1a1a18; }
    .edu-sub { font-size: 12px; color: #888780; margin-top: 2px; }
    .btn-all {
      padding: 7px 14px;
      border: 0.5px solid #d3d1c7;
      border-radius: 8px;
      background: #fff;
      color: #5f5e5a;
      font-size: 13px;
      cursor: pointer;
      font-family: sans-serif;
      transition: background 0.15s, color 0.15s, border-color 0.15s;
    }
    .btn-all:hover { background: #E1F5EE; color: #0F6E56; border-color: #5DCAA5; }

    /* Card grid */
    .cards-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 12px;
    }

    .edu-card {
      background: #fff;
      border: 0.5px solid #e2e2dd;
      border-radius: 12px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      transition: border-color 0.15s;
    }
    .edu-card:hover { border-color: #b4b2a9; }

    /* Thumbnail */
    .card-thumb {
      height: 140px;
      background: #E1F5EE;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    .card-thumb.blue { background: #E6F1FB; }
    .card-thumb.amber { background: #FAEEDA; }

    .card-thumb i { font-size: 40px; color: #9FE1CB; }
    .card-thumb.blue i { color: #B5D4F4; }
    .card-thumb.amber i { color: #FAC775; }

    /* Tag kategori */
    .card-tag {
      position: absolute; top: 10px; left: 10px;
      padding: 3px 9px; border-radius: 99px; font-size: 11px;
      background: #fff; border: 0.5px solid #9FE1CB; color: #085041;
    }
    .card-tag.blue { border-color: #B5D4F4; color: #0C447C; }
    .card-tag.amber { border-color: #FAC775; color: #633806; }

    /* Body */
    .card-body {
      padding: 1rem;
      display: flex;
      flex-direction: column;
      flex: 1;
      gap: 6px;
    }
    .card-title { font-size: 14px; font-weight: 600; color: #1a1a18; }
    .card-desc { font-size: 12px; color: #5f5e5a; line-height: 1.6; flex: 1; }

    /* Footer */
    .card-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-top: 10px;
      border-top: 0.5px solid #e2e2dd;
      margin-top: 6px;
    }
    .card-link {
      display: flex; align-items: center; gap: 4px;
      font-size: 12px; color: #0F6E56;
      text-decoration: none;
      transition: color 0.15s;
    }
    .card-link:hover { color: #085041; }
    .card-link i { font-size: 14px; }
    .card-duration {
      font-size: 11px; color: #888780;
      display: flex; align-items: center; gap: 3px;
    }
    .card-duration i { font-size: 13px; }
  </style>
</head>
<body>

<div class="edu-wrap">

  <!-- Header -->
  <div class="edu-header">
    <div class="edu-header-left">
      <div class="edu-icon">
        <i class="ti ti-book-2"></i>
      </div>
      <div>
        <div class="edu-title">Edukasi orang tua</div>
        <div class="edu-sub">Wawasan tumbuh kembang</div>
      </div>
    </div>
    <button class="btn-all">Lihat semua materi</button>
  </div>

  <!-- Kartu artikel -->
  <div class="cards-grid">

    <!-- Nutrisi -->
    <div class="edu-card">
      <div class="card-thumb">
        <i class="ti ti-salad"></i>
        <span class="card-tag">Nutrisi</span>
      </div>
      <div class="card-body">
        <div class="card-title">Pentingnya MPASI bergizi</div>
        <div class="card-desc">Panduan memberikan makanan pendamping ASI pertama yang kaya nutrisi untuk si kecil.</div>
        <div class="card-footer">
          <a class="card-link" href="#">Baca selengkapnya <i class="ti ti-arrow-right"></i></a>
          <span class="card-duration"><i class="ti ti-clock"></i> 5 menit</span>
        </div>
      </div>
    </div>

    <!-- Psikologi -->
    <div class="edu-card">
      <div class="card-thumb blue">
        <i class="ti ti-heart-handshake" style="color:#B5D4F4;"></i>
        <span class="card-tag blue">Psikologi</span>
      </div>
      <div class="card-body">
        <div class="card-title">Bonding ayah &amp; anak</div>
        <div class="card-desc">Membangun ikatan emosional yang kuat antara ayah dan si kecil sejak dini.</div>
        <div class="card-footer">
          <a class="card-link" href="#">Baca selengkapnya <i class="ti ti-arrow-right"></i></a>
          <span class="card-duration"><i class="ti ti-clock"></i> 3 menit</span>
        </div>
      </div>
    </div>

    <!-- Imunisasi (kartu tambahan) -->
    <div class="edu-card">
      <div class="card-thumb amber">
        <i class="ti ti-vaccine" style="color:#FAC775;"></i>
        <span class="card-tag amber">Imunisasi</span>
      </div>
      <div class="card-body">
        <div class="card-title">Jadwal imunisasi lengkap</div>
        <div class="card-desc">Kenali jadwal dan jenis vaksin yang wajib diberikan sesuai usia balita.</div>
        <div class="card-footer">
          <a class="card-link" href="#">Baca selengkapnya <i class="ti ti-arrow-right"></i></a>
          <span class="card-duration"><i class="ti ti-clock"></i> 4 menit</span>
        </div>
      </div>
    </div>

  </div>
</div>

</body>
</html>