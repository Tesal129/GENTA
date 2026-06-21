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
            'nik_balita'    => 'nullable|string|max:16|unique:balita,nik_balita',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_ibu'      => 'nullable|string|max:45',
            'nama_ayah'     => 'nullable|string|max:45',
            'no_hp_ortu'    => 'nullable|string|max:15',
            'alamat'        => 'nullable|string',
        ], [
            'nama_balita.required'   => 'Nama balita wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'nik_balita.unique'      => 'NIK ini sudah terdaftar sebelumnya.',
        ]);

        Balita::create($request->all());

        return back()->with('success', 'Pendaftaran berhasil! Data balita sudah masuk ke sistem posyandu.');
    }
}