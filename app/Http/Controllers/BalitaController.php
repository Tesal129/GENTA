<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\Pemeriksaan;

class BalitaController extends Controller
{
    public function index()
    {
        $balitas = Balita::orderBy('nama_balita')->paginate(10);
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

        Balita::create($request->all());
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
    
    $pemeriksaan = Pemeriksaan::where('balita_id', $id)
        ->orderBy('tanggal', 'asc')
        ->get();

    $labels = $pemeriksaan->pluck('tanggal')->map(fn($t) => \Carbon\Carbon::parse($t)->format('d M Y'));
    $berat = $pemeriksaan->pluck('berat_badan');
    $tinggi = $pemeriksaan->pluck('tinggi_badan');

    return view('balita.grafik', compact('balita', 'labels', 'berat', 'tinggi'));
    }
}