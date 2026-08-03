<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\Pemeriksaan;
use Carbon\Carbon;
use App\Helpers\WhoStandards;

class BalitaController extends Controller
{
    public function index()
    {
        $balitas = Balita::where('status_verifikasi', 'approved')->orderBy('nama_balita')->paginate(10);
        return view('balita.index', compact('balitas'));
    }

    public function create() {
        return view('balita.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_balita'   => 'required|string|max:45',
            'nik_balita'    => 'nullable|string|max:16|unique:balita,nik_balita',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_ibu'      => 'nullable|string|max:45',
            'nama_ayah'     => 'nullable|string|max:45',
            'alamat'        => 'nullable|string',
        ]);

        $data = $request->all();
        $data['status_verifikasi'] = 'approved';
        Balita::create($data);
        return redirect()->route('balita.index')->with('success', 'Data balita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $balita = Balita::findOrFail($id);
        return view('balita.show', compact('balita'));
    }

    public function edit($id) {
        $balita = Balita::findOrFail($id);
        return view('balita.form', compact('balita'));
    }

    public function update(Request $request, $id)
    {
        $balita = Balita::findOrFail($id);

        $request->validate([
            'nama_balita'   => 'required|string|max:45',
            'nik_balita'    => 'nullable|string|max:16|unique:balita,nik_balita,' . $id . ',id_balita',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_ibu'      => 'nullable|string|max:45',
            'nama_ayah'     => 'nullable|string|max:45',
            'alamat'        => 'nullable|string',
        ]);

        $balita->update($request->all());
        return redirect()->route('balita.index')->with('success', 'Data balita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Balita::findOrFail($id)->delete();
        return redirect()->route('balita.index')->with('success', 'Data balita berhasil dihapus.');
    }


public function grafik($id)
{
    $balita = Balita::findOrFail($id);

    $pemeriksaan = Pemeriksaan::where('Balita_id_balita', $id)
        ->orderBy('tanggal_periksa', 'asc')
        ->get();

    // Hitung umur (bulan) pada setiap titik pemeriksaan
    $tgl_lahir = Carbon::parse($balita->tanggal_lahir);
    
    $labels = [];
    $berat = [];
    $tinggi = [];

    foreach ($pemeriksaan as $p) {
        $tgl_periksa = Carbon::parse($p->tanggal_periksa);
        $umur_bulan = $tgl_lahir->diffInMonths($tgl_periksa);
        
        // Batasi maksimal 60 bulan sesuai standar WHO
        if ($umur_bulan <= 60) {
            $labels[] = $umur_bulan;
            $berat[]  = $p->berat_badan;
            $tinggi[] = $p->tinggi_badan;
        }
    }

    $whoWeight = WhoStandards::getWeightStandards($balita->jenis_kelamin);
    $whoHeight = WhoStandards::getHeightStandards($balita->jenis_kelamin);

    return view('balita.grafik', compact('balita', 'labels', 'berat', 'tinggi', 'whoWeight', 'whoHeight'));
}
}