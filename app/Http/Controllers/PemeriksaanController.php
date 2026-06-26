<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Pemeriksaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $pemeriksaans = Pemeriksaan::with(['balita', 'user'])
            ->orderByDesc('tanggal_periksa')
            ->paginate(10);

        return view('pemeriksaan.index', compact('pemeriksaans'));
    }

    public function create()
    {
        $balitas = Balita::orderBy('nama_balita')->get();

        return view('pemeriksaan.form', compact('balitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Balita_id_balita' => 'required|exists:balita,id_balita',
            'tanggal_periksa'  => 'required|date',
            'berat_badan'      => 'required|numeric|min:0',
            'tinggi_badan'     => 'required|numeric|min:0',
            'lingkar_kepala'   => 'nullable|numeric|min:0',
            'lingkar_lengan'   => 'nullable|numeric|min:0',
            'catatan'          => 'nullable|string',
        ], [
            'Balita_id_balita.required' => 'Balita wajib dipilih.',
            'tanggal_periksa.required'  => 'Tanggal pemeriksaan wajib diisi.',
            'berat_badan.required'      => 'Berat badan wajib diisi.',
            'tinggi_badan.required'     => 'Tinggi badan wajib diisi.',
        ]);

        $balita = Balita::findOrFail($request->Balita_id_balita);

        Pemeriksaan::create([
            'Balita_id_balita' => $request->Balita_id_balita,
            'User_id_user'     => Auth::user()->id_user,
            'tanggal_periksa'  => $request->tanggal_periksa,
            'berat_badan'      => $request->berat_badan,
            'tinggi_badan'     => $request->tinggi_badan,
            'lingkar_kepala'   => $request->lingkar_kepala,
            'lingkar_lengan'   => $request->lingkar_lengan,
            'status_gizi'      => $this->hitungStatusGizi(
                (float) $request->berat_badan,
                (float) $request->tinggi_badan,
                $balita->tanggal_lahir,
                $request->tanggal_periksa
            ),
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('pemeriksaan.index')
            ->with('success', 'Data pemeriksaan berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $pemeriksaan = Pemeriksaan::with(['balita', 'user'])->findOrFail($id);

        return view('pemeriksaan.show', compact('pemeriksaan'));
    }

    public function edit(string $id)
    {
        $pemeriksaan = Pemeriksaan::findOrFail($id);
        $balitas = Balita::orderBy('nama_balita')->get();

        return view('pemeriksaan.form', compact('pemeriksaan', 'balitas'));
    }

    public function update(Request $request, string $id)
    {
        $pemeriksaan = Pemeriksaan::findOrFail($id);

        $request->validate([
            'Balita_id_balita' => 'required|exists:balita,id_balita',
            'tanggal_periksa'  => 'required|date',
            'berat_badan'      => 'required|numeric|min:0',
            'tinggi_badan'     => 'required|numeric|min:0',
            'lingkar_kepala'   => 'nullable|numeric|min:0',
            'lingkar_lengan'   => 'nullable|numeric|min:0',
            'catatan'          => 'nullable|string',
        ]);

        $balita = Balita::findOrFail($request->Balita_id_balita);

        $pemeriksaan->update([
            'Balita_id_balita' => $request->Balita_id_balita,
            'tanggal_periksa'  => $request->tanggal_periksa,
            'berat_badan'      => $request->berat_badan,
            'tinggi_badan'     => $request->tinggi_badan,
            'lingkar_kepala'   => $request->lingkar_kepala,
            'lingkar_lengan'   => $request->lingkar_lengan,
            'status_gizi'      => $this->hitungStatusGizi(
                (float) $request->berat_badan,
                (float) $request->tinggi_badan,
                $balita->tanggal_lahir,
                $request->tanggal_periksa
            ),
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('pemeriksaan.index')
            ->with('success', 'Data pemeriksaan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        Pemeriksaan::findOrFail($id)->delete();

        return redirect()->route('pemeriksaan.index')
            ->with('success', 'Data pemeriksaan berhasil dihapus.');
    }

    private function hitungStatusGizi(float $berat, float $tinggi, string $tanggalLahir, string $tanggalPeriksa): string
    {
        $umurBulan = (int) Carbon::parse($tanggalLahir)->diffInMonths(Carbon::parse($tanggalPeriksa));
        $tinggiMeter = max($tinggi / 100, 0.01);
        $bmi = $berat / ($tinggiMeter * $tinggiMeter);
        $bbPerTb = $berat / max($tinggi, 1);

        if ($bbPerTb < 0.08) {
            return 'gizi_buruk';
        }

        if ($umurBulan >= 24 && $tinggi < (75 + ($umurBulan - 24) * 0.5)) {
            return 'stunting';
        }

        if ($bmi >= 18 || $bbPerTb > 0.2) {
            return 'obesitas';
        }

        return 'normal';
    }
}
