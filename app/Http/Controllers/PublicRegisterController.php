<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;

class PublicRegisterController extends Controller
{
    public function show()
    {
        return view('public-register.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_balita'   => 'required|string|max:45',
            'nik_balita'    => 'required|string|max:16|unique:balita,nik_balita',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_ibu'      => 'required|string|max:45',
            'nama_ayah'     => 'nullable|string|max:45',
            'no_hp_ortu'    => 'required|string|max:15',
            'alamat'        => 'required|string',
            'foto_kk'       => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ], [
            'nama_balita.required'   => 'Nama balita wajib diisi.',
            'nik_balita.required'    => 'NIK Balita wajib diisi untuk keperluan cek status.',
            'nik_balita.unique'      => 'NIK ini sudah terdaftar sebelumnya.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'nama_ibu.required'      => 'Nama ibu wajib diisi.',
            'no_hp_ortu.required'    => 'Nomor HP orang tua wajib diisi.',
            'alamat.required'        => 'Alamat wajib diisi.',
            'foto_kk.required'       => 'Foto KK wajib diunggah sebagai bukti validitas.',
            'foto_kk.image'          => 'File yang diunggah harus berupa gambar.',
            'foto_kk.max'            => 'Ukuran foto KK maksimal 5MB.',
        ]);

        $data = $request->except('foto_kk');

        if ($request->hasFile('foto_kk')) {
            $file = $request->file('foto_kk');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('private/kk', $filename);
            $data['foto_kk'] = $filename;
        }

        $data['status_verifikasi'] = 'pending';

        Balita::create($data);

        return back()->with('success', 'Pendaftaran berhasil diajukan! Silakan gunakan fitur Cek Status menggunakan NIK Balita secara berkala.');
    }

    public function cekStatus(Request $request)
    {
        $request->validate([
            'nik_balita' => 'required|string|max:16'
        ], [
            'nik_balita.required' => 'NIK Balita wajib diisi untuk mengecek status.'
        ]);

        $balita = Balita::where('nik_balita', $request->nik_balita)->first();

        if (!$balita) {
            return back()->with('cek_error', 'Data pendaftaran dengan NIK tersebut tidak ditemukan.')->withFragment('cek-status');
        }

        return back()->with('cek_status', [
            'nama' => $balita->nama_balita,
            'status' => $balita->status_verifikasi,
            'alasan' => $balita->alasan_penolakan
        ])->withFragment('cek-status');
    }
}