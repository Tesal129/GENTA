<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use Illuminate\Support\Facades\Storage;

class VerifikasiController extends Controller
{
    public function index()
    {
        $balitas = Balita::where('status_verifikasi', 'pending')->orderBy('id_balita', 'desc')->get();
        return view('admin.verifikasi.index', compact('balitas'));
    }

    public function approve($id)
    {
        $balita = Balita::findOrFail($id);
        $balita->status_verifikasi = 'approved';
        $balita->save();

        return back()->with('success', 'Pendaftaran balita atas nama ' . $balita->nama_balita . ' berhasil disetujui.');
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:255'
        ]);

        $balita = Balita::findOrFail($id);
        $balita->status_verifikasi = 'rejected';
        $balita->alasan_penolakan = $request->alasan_penolakan;
        $balita->save();

        return back()->with('success', 'Pendaftaran balita atas nama ' . $balita->nama_balita . ' telah ditolak.');
    }

    public function showKk($filename)
    {
        $path = 'kk/' . $filename;
        
        if (!Storage::exists($path)) {
            abort(404);
        }

        return response()->file(storage_path('app/private/' . $path));
    }
}
