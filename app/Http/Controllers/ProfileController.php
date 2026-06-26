<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('pengaturan.index', ['user' => Auth::user()]);
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
            ->with('success', 'Pengaturan akun berhasil disimpan.');
    }
}
