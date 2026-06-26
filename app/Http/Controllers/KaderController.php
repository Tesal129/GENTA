<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KaderController extends Controller
{
    public function index()
    {
        $kaders = User::orderBy('nama_kader')->paginate(10);

        return view('kader.index', compact('kaders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kader' => 'required|string|max:45',
            'username'   => 'required|string|max:45|unique:user,username',
            'password'   => 'required|string|min:6',
            'no_hp'      => 'nullable|string|max:15',
            'role'       => 'required|in:kader,admin',
        ], [
            'nama_kader.required' => 'Nama kader wajib diisi.',
            'username.required'   => 'Username wajib diisi.',
            'username.unique'     => 'Username sudah digunakan.',
            'password.required'   => 'Password wajib diisi.',
            'password.min'        => 'Password minimal 6 karakter.',
        ]);

        User::create([
            'nama_kader' => $request->nama_kader,
            'username'   => $request->username,
            'password'   => Hash::make($request->password),
            'no_hp'      => $request->no_hp,
            'role'       => $request->role,
        ]);

        return redirect()->route('kader.index')
            ->with('success', 'Akun kader berhasil ditambahkan.');
    }

    public function destroy(string $id)
    {
        $kader = User::findOrFail($id);

        if ((int) $kader->id_user === (int) Auth::id()) {
            return redirect()->route('kader.index')
                ->with('error', 'Tidak bisa menghapus akun yang sedang login.');
        }

        $kader->delete();

        return redirect()->route('kader.index')
            ->with('success', 'Akun kader berhasil dihapus.');
    }
}
