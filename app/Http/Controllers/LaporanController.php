<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = (int) $request->query('bulan', now()->month);
        $tahun = (int) $request->query('tahun', now()->year);

        $data = $this->getData($bulan, $tahun);

        // Daftar bulan-tahun yang ada datanya, buat panel riwayat
        $riwayatBulan = Pemeriksaan::select(
                DB::raw('YEAR(tanggal_periksa) as tahun'),
                DB::raw('MONTH(tanggal_periksa) as bulan')
            )
            ->groupBy('tahun', 'bulan')
            ->orderByDesc('tahun')
            ->orderByDesc('bulan')
            ->get();

        return view('laporan.index', array_merge($data, [
            'riwayatBulan' => $riwayatBulan,
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]));
    }

    public function pdf(Request $request)
    {
        $bulan = (int) $request->query('bulan', now()->month);
        $tahun = (int) $request->query('tahun', now()->year);

        $data = $this->getData($bulan, $tahun);
        $data['namaBulan'] = Carbon::create()->month($bulan)->translatedFormat('F');
        $data['tahun'] = $tahun;

        $pdf = Pdf::loadView('laporan.pdf', $data)->setPaper('a4', 'portrait');

        return $pdf->download('laporan-' . strtolower($data['namaBulan']) . '-' . $tahun . '.pdf');
    }

    private function getData($bulan, $tahun)
    {
        $totalBalita = Balita::count();

        $totalPemeriksaan = Pemeriksaan::whereMonth('tanggal_periksa', $bulan)
            ->whereYear('tanggal_periksa', $tahun)
            ->count();

        $statusGizi = Pemeriksaan::select('status_gizi', DB::raw('count(*) as total'))
            ->whereNotNull('status_gizi')
            ->whereMonth('tanggal_periksa', $bulan)
            ->whereYear('tanggal_periksa', $tahun)
            ->groupBy('status_gizi')
            ->pluck('total', 'status_gizi');

        $pemeriksaanPerBulan = Pemeriksaan::select(
            DB::raw('MONTH(tanggal_periksa) as bulan'),
            DB::raw('count(*) as total')
        )
            ->whereYear('tanggal_periksa', $tahun)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $kegiatanPerTipe = Jadwal::select('tipe_kegiatan', DB::raw('count(*) as total'))
            ->groupBy('tipe_kegiatan')
            ->pluck('total', 'tipe_kegiatan');

        $pemeriksaanTerbaru = Pemeriksaan::with('balita')
            ->whereMonth('tanggal_periksa', $bulan)
            ->whereYear('tanggal_periksa', $tahun)
            ->orderByDesc('tanggal_periksa')
            ->limit(10)
            ->get();

        return compact(
            'totalBalita',
            'totalPemeriksaan',
            'statusGizi',
            'pemeriksaanPerBulan',
            'kegiatanPerTipe',
            'pemeriksaanTerbaru'
        );
    }
}