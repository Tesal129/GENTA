# GENTA - Sistem Informasi Manajemen Posyandu

GENTA adalah sebuah aplikasi berbasis web yang dirancang untuk membantu kader Posyandu dalam mengelola data balita, jadwal imunisasi, pencatatan pemeriksaan (berat & tinggi badan), pemantauan status gizi (stunting, gizi buruk, obesitas), serta penyediaan konten edukasi bagi orang tua.

Aplikasi ini dibangun menggunakan framework **Laravel** dan didesain dengan antarmuka yang modern, responsif, serta mudah digunakan oleh para kader.

## ✨ Fitur Utama

- **Dashboard Informatif**: Ringkasan data balita terdaftar, jadwal bulan ini, balita yang perlu perhatian khusus, dan metrik lainnya.
- **Manajemen Data Balita**: Pencatatan data lengkap balita termasuk nama, usia, NIK, dan jenis kelamin.
- **Pencatatan Pemeriksaan**: Fitur untuk mencatat hasil pemeriksaan rutin (berat badan, tinggi badan) dan otomatis menghitung status gizi balita.
- **Grafik Pertumbuhan**: Visualisasi grafik riwayat berat dan tinggi badan balita dari waktu ke waktu.
- **Jadwal Kegiatan**: Pengelolaan jadwal kegiatan Posyandu bulanan (imunisasi, penyuluhan, dsb).
- **Statistik & Laporan**: Laporan tumbuh kembang anak untuk diekspor atau dicetak.
- **Manajemen Kader (Admin)**: Pengelolaan akun kader Posyandu.
- **Konten Edukasi**: Artikel dan materi seputar kesehatan anak dan pola asuh.

## 🚀 Teknologi yang Digunakan

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: HTML5, CSS3, JavaScript (Vanilla), Bootstrap Icons
- **Database**: MySQL / PostgreSQL (tergantung konfigurasi environment)
- **Deployment**: Mendukung platform modern seperti Railway, Vercel, dll.

## 🛠️ Cara Instalasi (Local Development)

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi GENTA di komputer lokal kamu:

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/genta.git
   cd genta
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
   Sesuaikan konfigurasi database di dalam file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_kamu
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Migrasi Database & Seeder**
   Pastikan kamu sudah membuat database kosong sesuai nama di `.env`, lalu jalankan:
   ```bash
   php artisan migrate --seed
   ```

6. **Jalankan Server Lokal**
   ```bash
   php artisan serve
   ```
   Aplikasi bisa diakses melalui `http://localhost:8000`.

## 🌐 Catatan Deployment (Railway)

Jika melakukan deployment ke platform reverse proxy seperti Railway, pastikan *environment variables* berikut diset agar aset dan form berjalan di HTTPS dengan aman:

```env
APP_ENV=production
APP_URL=https://genta-production.up.railway.app
```

> **Catatan**: Aplikasi sudah dikonfigurasi untuk `TrustProxies` dan memaksakan (*force*) HTTPS jika `APP_ENV=production`.

## 🎓 Tentang Proyek

Proyek ini dibuat untuk memenuhi persyaratan **Proyek 1 D4 Teknik Informatika ULBI (Universitas Logistik dan Bisnis Internasional)**.

**Anggota Kelompok:**
- Abieza Febrian Mahardika (714250049)
- Tesal Slamet Mulyanardi (714250018)

---

## 📄 Lisensi

Proyek ini bersifat *open-source* dan didistribusikan di bawah Lisensi [MIT](https://opensource.org/licenses/MIT).
