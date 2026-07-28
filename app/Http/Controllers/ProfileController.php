<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $loginLogs = \App\Models\LoginLog::where('user_id', $user->id_user)
            ->orderByDesc('login_at')
            ->limit(5)
            ->get();

        $bulan = (int) $request->query('bulan', now()->month);
        $tahun = (int) $request->query('tahun', now()->year);

        $riwayatBulan = \App\Models\Pemeriksaan::select(
                \Illuminate\Support\Facades\DB::raw('YEAR(tanggal_periksa) as tahun'),
                \Illuminate\Support\Facades\DB::raw('MONTH(tanggal_periksa) as bulan')
            )
            ->groupBy('tahun', 'bulan')
            ->orderByDesc('tahun')
            ->orderByDesc('bulan')
            ->get();

        return view('pengaturan.index', compact('user', 'loginLogs', 'bulan', 'tahun', 'riwayatBulan'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama_kader'          => 'required|string|max:45',
            'no_hp'               => 'nullable|string|max:15',
            'password'            => 'nullable|string|min:6|confirmed',
            'password_lama'       => 'required_with:password|string',
        ], [
            'nama_kader.required' => 'Nama kader wajib diisi.',
            'password.min'        => 'Password baru minimal 6 karakter.',
            'password.confirmed'  => 'Konfirmasi password tidak cocok.',
        ]);

        if ($request->filled('password')) {
            if (! Hash::check($request->password_lama, $user->password)) {
                return back()->withErrors(['password_lama' => 'Password lama tidak sesuai.']);
            }

            $user->password = Hash::make($request->password);
        }

        $user->nama_kader = $request->nama_kader;
        $user->no_hp = $request->no_hp;

        $user->save();

        return redirect()->route('pengaturan.index')
            ->with('success', 'Profil kader berhasil diperbarui.');
    }

    public function updatePreferensi(Request $request)
    {
        $user = Auth::user();

        // Save preferences
        $user->dark_mode = $request->has('dark_mode');
        
        $user->notification_settings = [
            'notif_jadwal' => $request->has('notif_jadwal'),
            'notif_pemeriksaan' => $request->has('notif_pemeriksaan'),
        ];

        $user->save();

        return redirect()->route('pengaturan.index')
            ->with('success', 'Pengaturan berhasil disimpan.');
    }
}
