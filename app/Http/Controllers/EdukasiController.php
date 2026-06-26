<?php

namespace App\Http\Controllers;

class EdukasiController extends Controller
{
    public function index()
    {
        $konten = [
            [
                'judul'   => 'MPASI Sehat untuk Balita',
                'kategori'=> 'Gizi',
                'icon'    => 'bi-egg-fried',
                'ringkas' => 'Panduan pemberian makanan pendamping ASI yang seimbang untuk usia 6–24 bulan.',
            ],
            [
                'judul'   => 'Imunisasi Dasar Lengkap',
                'kategori'=> 'Imunisasi',
                'icon'    => 'bi-shield-check',
                'ringkas' => 'Jadwal dan manfaat imunisasi dasar yang wajib diberikan pada balita.',
            ],
            [
                'judul'   => 'Deteksi Dini Stunting',
                'kategori'=> 'Tumbuh Kembang',
                'icon'    => 'bi-graph-up-arrow',
                'ringkas' => 'Cara mengenali tanda stunting dan langkah pencegahannya sejak dini.',
            ],
            [
                'judul'   => 'ASI Eksklusif 6 Bulan',
                'kategori'=> 'Menyusui',
                'icon'    => 'bi-heart-pulse',
                'ringkas' => 'Manfaat ASI eksklusif dan tips praktis untuk ibu menyusui.',
            ],
            [
                'judul'   => 'Stimulasi Motorik Balita',
                'kategori'=> 'Stimulasi',
                'icon'    => 'bi-emoji-smile',
                'ringkas' => 'Aktivitas sederhana untuk mendukung perkembangan motorik halus dan kasar.',
            ],
            [
                'judul'   => 'Kebersihan Lingkungan Posyandu',
                'kategori'=> 'Kesehatan',
                'icon'    => 'bi-droplet',
                'ringkas' => 'Standar kebersihan dan sanitasi yang perlu dijaga saat kegiatan posyandu.',
            ],
        ];

        return view('edukasi.index', compact('konten'));
    }
}
