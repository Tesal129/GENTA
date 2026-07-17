<!DOCTYPE html>
<html lang="id">
<head>
    <link rel="icon" href="{{ asset('logo.png') }}?v=3" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($edukasi) ? 'Edit' : 'Tambah' }} Konten Edukasi – GENTA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing:border-box; margin:0; padding:0; }
        :root { --g-bg:#F7FBFF; --g-bg2:#EEF9F4; --g-green:#0E9E72; --g-green-lite:#E6F7F1; --g-blue:#1565C0; --g-dark:#0A1628; --g-text:#1A2E3B; --g-muted:#7A9BB0; --g-border:rgba(21,101,192,.1); --g-white:#FFFFFF; --sidebar-w:240px; }
        body { font-family:'Lato',sans-serif; background:var(--g-bg); color:var(--g-text); display:flex; min-height:100vh; }
        .main { margin-left:var(--sidebar-w); flex:1; }
        .topbar { background:var(--g-white); border-bottom:1px solid var(--g-border); padding:16px 32px; display: flex; align-items: center; gap: 16px; }
        .btn-back { width: 36px; height: 36px; border-radius: 8px; background: var(--g-bg); display: flex; align-items: center; justify-content: center; color: var(--g-dark); text-decoration: none; border: 1px solid var(--g-border); transition: .2s; }
        .btn-back:hover { background: #e2e8f0; }
        .topbar h1 { font-size:20px; font-weight:900; color:var(--g-dark); }
        .content { padding:28px 32px; max-width: 800px; }
        
        .card { background: var(--g-white); border: 1px solid var(--g-border); border-radius: 16px; padding: 28px; box-shadow: 0 4px 12px rgba(0,0,0,.02); }
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 13px; font-weight: 700; color: var(--g-dark); margin-bottom: 8px; }
        .form-control { width: 100%; padding: 12px 16px; border: 1px solid var(--g-border); border-radius: 8px; font-family: inherit; font-size: 14px; color: var(--g-text); transition: .2s; background: var(--g-bg); }
        .form-control:focus { outline: none; border-color: var(--g-blue); background: #fff; box-shadow: 0 0 0 4px rgba(21,101,192,.1); }
        .form-text { display: block; font-size: 12px; color: var(--g-muted); margin-top: 6px; line-height: 1.5; }
        .btn-submit { background: var(--g-green); color: #fff; padding: 14px 24px; border: none; border-radius: 8px; font-family: inherit; font-size: 15px; font-weight: 700; cursor: pointer; transition: .2s; margin-top: 10px; width: 100%; }
        .btn-submit:hover { background: #0c8a63; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(14,158,114,.2); }
        
        .checkbox-wrapper { display: flex; align-items: flex-start; gap: 12px; padding: 16px; border: 1px solid #FFC107; background: rgba(255,193,7,.05); border-radius: 8px; margin-bottom: 24px; }
        .checkbox-wrapper input[type="checkbox"] { width: 20px; height: 20px; accent-color: #FFC107; cursor: pointer; margin-top: 2px; }
        .checkbox-text h4 { font-size: 14px; font-weight: 900; color: #b28600; margin-bottom: 4px; }
        .checkbox-text p { font-size: 12px; color: var(--g-muted); line-height: 1.5; }
        
        .alert-error { background: #fee2e2; color: #dc2626; padding: 12px 16px; border-radius: 8px; font-size: 14px; margin-bottom: 20px; }
        .alert-error ul { margin-left: 20px; margin-top: 4px; }
        
        .img-preview { width: 100%; max-width: 300px; height: auto; border-radius: 8px; margin-top: 12px; border: 1px solid var(--g-border); display: none; }
    </style>
</head>
<body>

@include('partials.admin-sidebar', ['active' => 'edukasi'])

<div class="main">
    <div class="topbar">
        <a href="{{ route('edukasi.index') }}" class="btn-back"><i class="bi bi-arrow-left"></i></a>
        <h1>{{ isset($edukasi) ? 'Edit' : 'Tambah Baru' }} Konten Edukasi</h1>
    </div>

    <div class="content">
        @if ($errors->any())
            <div class="alert-error">
                <strong>Whoops! Ada kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="{{ isset($edukasi) ? route('edukasi.update', $edukasi->id) : route('edukasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($edukasi))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label class="form-label">Judul Konten <span style="color:#dc3545">*</span></label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $edukasi->judul ?? '') }}" required placeholder="Contoh: MPASI Sehat untuk Balita">
                </div>

                <div class="form-group">
                    <label class="form-label">Kategori <span style="color:#dc3545">*</span></label>
                    <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $edukasi->kategori ?? '') }}" required placeholder="Contoh: Gizi, Imunisasi, Stimulasi">
                </div>

                <div class="form-group">
                    <label class="form-label">Ringkasan / Deskripsi Singkat <span style="color:#dc3545">*</span></label>
                    <textarea name="ringkasan" class="form-control" rows="3" required placeholder="Tuliskan deskripsi singkat tentang konten ini...">{{ old('ringkasan', $edukasi->ringkasan ?? '') }}</textarea>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Link Artikel / Video (Opsional)</label>
                    <input type="url" name="url_konten" class="form-control" value="{{ old('url_konten', $edukasi->url_konten ?? '') }}" placeholder="Contoh: https://youtube.com/...">
                    <span class="form-text">Jika ada link referensi atau video yang mau disisipkan.</span>
                </div>

                <div class="form-group">
                    <label class="form-label">Gambar Thumbnail (Opsional)</label>
                    <input type="file" name="gambar_thumbnail" id="gambarInput" class="form-control" accept="image/*">
                    <span class="form-text">Format: JPG, PNG, GIF (Maks. 2MB). Rekomendasi rasio 16:9.</span>
                    
                    @if(isset($edukasi) && $edukasi->gambar_thumbnail)
                        <img src="{{ Storage::url($edukasi->gambar_thumbnail) }}" class="img-preview" style="display:block;" id="imgPreview">
                        <span class="form-text" style="color:var(--g-blue)">*Biarkan kosong jika tidak ingin mengubah gambar.</span>
                    @else
                        <img src="" class="img-preview" id="imgPreview">
                    @endif
                </div>

                <div class="checkbox-wrapper">
                    <input type="hidden" name="is_featured" value="0">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $edukasi->is_featured ?? false) ? 'checked' : '' }}>
                    <div class="checkbox-text">
                        <label for="is_featured"><h4>Tampilkan di Landing Page (Bintang Utama)</h4></label>
                        <p>Jika dicentang, konten ini akan muncul besar di halaman utama website GENTA (hanya bisa ada 1 konten yang aktif). Konten lain yang sebelumnya dicentang akan otomatis terganti.</p>
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="bi bi-save"></i> {{ isset($edukasi) ? 'Simpan Perubahan' : 'Simpan Konten Baru' }}
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Image Preview Script
    const gambarInput = document.getElementById('gambarInput');
    const imgPreview = document.getElementById('imgPreview');

    gambarInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgPreview.src = e.target.result;
                imgPreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            imgPreview.src = '';
            imgPreview.style.display = 'none';
        }
    });
</script>
</body>
</html>
