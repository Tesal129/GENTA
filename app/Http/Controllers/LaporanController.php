<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Pemeriksaan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $totalBalita = Balita::count();
        $totalPemeriksaan = Pemeriksaan::count();

        $statusGizi = Pemeriksaan::select('status_gizi', DB::raw('count(*) as total'))
            ->whereNotNull('status_gizi')
            ->groupBy('status_gizi')
            ->pluck('total', 'status_gizi');

        $pemeriksaanPerBulan = Pemeriksaan::select(
            DB::raw('MONTH(tanggal_periksa) as bulan'),
            DB::raw('count(*) as total')
        )
            ->whereYear('tanggal_periksa', now()->year)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $kegiatanPerTipe = Jadwal::select('tipe_kegiatan', DB::raw('count(*) as total'))
            ->groupBy('tipe_kegiatan')
            ->pluck('total', 'tipe_kegiatan');

        $pemeriksaanTerbaru = Pemeriksaan::with('balita')
            ->orderByDesc('tanggal_periksa')
            ->limit(10)
            ->get();

        return view('laporan.index', compact(
            'totalBalita',
            'totalPemeriksaan',
            'statusGizi',
            'pemeriksaanPerBulan',
            'kegiatanPerTipe',
            'pemeriksaanTerbaru'
        ));
    }
}
