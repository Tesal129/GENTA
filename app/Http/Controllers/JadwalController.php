<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with('user')->orderBy('tanggal', 'asc')->paginate(10);
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        return view('jadwal.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:100',
            'tanggal'       => 'required|date',
            'lokasi'        => 'nullable|string|max:150',
            'tipe_kegiatan' => 'required|in:posyandu,imunisasi,penyuluhan',
            'keterangan'    => 'nullable|string',
        ], [
            'nama_kegiatan.required' => 'Nama kegiatan wajib diisi.',
            'tanggal.required'       => 'Tanggal wajib diisi.',
            'tipe_kegiatan.required' => 'Tipe kegiatan wajib dipilih.',
        ]);

        Jadwal::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal'       => $request->tanggal,
            'lokasi'        => $request->lokasi,
            'tipe_kegiatan' => $request->tipe_kegiatan,
            'keterangan'    => $request->keterangan,
            'user_id_user'  => auth()->user()->id_user,
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal kegiatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        return view('jadwal.form', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $request->validate([
            'nama_kegiatan' => 'required|string|max:100',
            'tanggal'       => 'required|date',
            'lokasi'        => 'nullable|string|max:150',
            'tipe_kegiatan' => 'required|in:posyandu,imunisasi,penyuluhan',
            'keterangan'    => 'nullable|string',
        ]);

        $jadwal->update($request->only([
            'nama_kegiatan', 'tanggal', 'lokasi', 'tipe_kegiatan', 'keterangan',
        ]));

        return redirect()->route('jadwal.index')->with('success', 'Jadwal kegiatan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Jadwal::findOrFail($id)->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal kegiatan berhasil dihapus.');
    }
}