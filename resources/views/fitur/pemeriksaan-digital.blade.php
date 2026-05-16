<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pemeriksaan Balita</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: sans-serif; background: #f5f5f0; display: flex; align-items: center; justify-content: center; min-height: 100vh; padding: 2rem; }

    .form-wrap { max-width: 520px; width: 100%; background: #fff; border: 0.5px solid #e2e2dd; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.06); }

    /* Header */
    .form-header { padding: 1.5rem; border-bottom: 0.5px solid #e2e2dd; display: flex; align-items: center; gap: 14px; }
    .header-icon { width: 44px; height: 44px; border-radius: 12px; background: #E1F5EE; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .header-icon i { font-size: 22px; color: #0F6E56; }
    .header-title { font-size: 17px; font-weight: 600; color: #1a1a18; margin: 0; }
    .header-sub { font-size: 13px; color: #888780; margin: 0; margin-top: 2px; }

    /* Step bar */
    .step-bar { display: flex; align-items: center; padding: 0 1.5rem; border-bottom: 0.5px solid #e2e2dd; background: #f8f8f5; }
    .step { display: flex; align-items: center; gap: 6px; padding: 10px 0; font-size: 12px; color: #b4b2a9; flex: 1; }
    .step.active { color: #0F6E56; }
    .step.done { color: #5DCAA5; }
    .step-dot { width: 20px; height: 20px; border-radius: 50%; border: 1.5px solid #d3d1c7; display: flex; align-items: center; justify-content: center; font-size: 10px; font-weight: 600; color: #b4b2a9; flex-shrink: 0; }
    .step.active .step-dot { background: #1D9E75; border-color: #1D9E75; color: #fff; }
    .step.done .step-dot { background: #E1F5EE; border-color: #5DCAA5; color: #0F6E56; font-size: 11px; }
    .step-line { width: 1px; height: 18px; background: #e2e2dd; margin: 0 8px; }

    /* Form body */
    .form-body { padding: 1.5rem; display: flex; flex-direction: column; gap: 1.25rem; }
    .field-group { display: flex; flex-direction: column; gap: 6px; }
    .field-label { font-size: 12px; color: #5f5e5a; display: flex; align-items: center; gap: 5px; }
    .field-label i { font-size: 14px; }

    /* Select */
    .select-wrap { position: relative; }
    .field-select { width: 100%; padding: 10px 36px 10px 12px; border: 0.5px solid #d3d1c7; border-radius: 8px; background: #f8f8f5; color: #1a1a18; font-size: 14px; appearance: none; cursor: pointer; transition: border-color 0.15s, box-shadow 0.15s; }
    .field-select:focus { outline: none; border-color: #1D9E75; box-shadow: 0 0 0 3px #E1F5EE; }
    .select-icon { position: absolute; right: 12px; top: 50%; transform: translateY(-50%); pointer-events: none; font-size: 14px; color: #888780; }

    /* Metric cards */
    .metrics-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
    .metric-card { background: #f8f8f5; border: 0.5px solid #e2e2dd; border-radius: 12px; padding: 1rem; }
    .metric-icon-row { display: flex; align-items: center; gap: 8px; margin-bottom: 12px; }
    .metric-icon { width: 30px; height: 30px; border-radius: 8px; display: flex; align-items: center; justify-content: center; }
    .metric-icon.green { background: #E1F5EE; }
    .metric-icon.blue { background: #E6F1FB; }
    .metric-icon.green i { color: #0F6E56; font-size: 16px; }
    .metric-icon.blue i { color: #185FA5; font-size: 16px; }
    .metric-label { font-size: 12px; color: #5f5e5a; }
    .metric-input-wrap { position: relative; }
    .metric-input { width: 100%; padding: 6px 36px 6px 0; border: none; border-bottom: 1.5px solid #d3d1c7; background: transparent; color: #1a1a18; font-size: 24px; font-weight: 500; font-family: sans-serif; transition: border-color 0.15s; }
    .metric-input:focus { outline: none; border-bottom-color: #1D9E75; }
    .metric-input::placeholder { color: #d3d1c7; }
    .metric-unit { position: absolute; right: 0; bottom: 8px; font-size: 12px; color: #888780; font-weight: 500; }

    /* Info strip */
    .info-strip { display: flex; align-items: center; gap: 10px; background: #f8f8f5; border: 0.5px solid #e2e2dd; border-radius: 8px; padding: 10px 12px; }
    .info-strip i { font-size: 16px; color: #888780; flex-shrink: 0; }
    .info-strip span { font-size: 12px; color: #5f5e5a; }

    /* Button */
    .btn-simpan { width: 100%; padding: 13px; border-radius: 12px; background: #1D9E75; border: none; color: #fff; font-size: 14px; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; font-family: sans-serif; transition: background 0.15s, transform 0.1s; }
    .btn-simpan:hover { background: #0F6E56; }
    .btn-simpan:active { transform: scale(0.98); }
    .btn-simpan i { font-size: 18px; }

    /* Footer */
    .form-footer { padding: 12px 1.5rem; border-top: 0.5px solid #e2e2dd; background: #f8f8f5; display: flex; align-items: center; justify-content: center; gap: 6px; }
    .form-footer i { font-size: 14px; color: #888780; }
    .form-footer span { font-size: 11px; color: #888780; }
  </style>
</head>
<body>

<div class="form-wrap">

  <!-- Header -->
  <div class="form-header">
    <div class="header-icon">
      <i class="ti ti-report-medical"></i>
    </div>
    <div>
      <p class="header-title">Input pemeriksaan</p>
      <p class="header-sub">Catat perkembangan bulanan si kecil</p>
    </div>
  </div>

  <!-- Step indicator -->
  <div class="step-bar">
    <div class="step done">
      <div class="step-dot"><i class="ti ti-check" style="font-size:11px;"></i></div>
      <span>Pilih balita</span>
    </div>
    <div class="step-line"></div>
    <div class="step active">
      <div class="step-dot">2</div>
      <span>Data fisik</span>
    </div>
    <div class="step-line"></div>
    <div class="step">
      <div class="step-dot">3</div>
      <span>Simpan</span>
    </div>
  </div>

  <!-- Form body -->
  <div class="form-body">

    <!-- Pilih balita -->
    <div class="field-group">
      <label class="field-label">
        <i class="ti ti-user-circle"></i>
        Pilih balita
      </label>
      <div class="select-wrap">
        <select class="field-select">
          <option disabled selected>Cari nama balita...</option>
          <option>Andi Wijaya</option>
          <option>Siti Aminah</option>
        </select>
        <i class="ti ti-chevron-down select-icon"></i>
      </div>
    </div>

    <!-- Metrik berat & tinggi -->
    <div class="metrics-grid">
      <div class="metric-card">
        <div class="metric-icon-row">
          <div class="metric-icon green">
            <i class="ti ti-weight"></i>
          </div>
          <span class="metric-label">Berat badan</span>
        </div>
        <div class="metric-input-wrap">
          <input type="number" step="0.1" placeholder="0.0" class="metric-input">
          <span class="metric-unit">kg</span>
        </div>
      </div>

      <div class="metric-card">
        <div class="metric-icon-row">
          <div class="metric-icon blue">
            <i class="ti ti-ruler-measure"></i>
          </div>
          <span class="metric-label">Tinggi badan</span>
        </div>
        <div class="metric-input-wrap">
          <input type="number" step="0.1" placeholder="0.0" class="metric-input">
          <span class="metric-unit">cm</span>
        </div>
      </div>
    </div>

    <!-- Info KMS -->
    <div class="info-strip">
      <i class="ti ti-info-circle"></i>
      <span>Pastikan data sesuai yang tertera di KMS balita</span>
    </div>

    <!-- Tombol simpan -->
    <button class="btn-simpan" type="button">
      <i class="ti ti-device-floppy"></i>
      Simpan hasil pemeriksaan
    </button>

  </div>

  <!-- Footer -->
  <div class="form-footer">
    <i class="ti ti-lock"></i>
    <span>Data tersimpan aman &amp; terenkripsi</span>
  </div>

</div>

</body>
</html>