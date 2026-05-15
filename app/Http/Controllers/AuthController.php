<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ── Tampilkan form login ──────────────────────────────────────────────
    public function showLogin()
    {
        // Kalau sudah login, langsung ke dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.login');
    }

    // ── Proses login ──────────────────────────────────────────────────────
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Coba login pakai username
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'))
                             ->with('success', 'Selamat datang, ' . Auth::user()->nama_kader . '!');
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'Username atau password salah.']);
    }

    // ── Tampilkan form register ───────────────────────────────────────────
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.register');
    }

    // ── Proses register ───────────────────────────────────────────────────
    public function register(Request $request)
    {
        $request->validate([
            'nama_kader' => 'required|string|max:100',
            'username'   => 'required|string|max:50|unique:users,username',
            'password'   => 'required|string|min:6|confirmed',
        ], [
            'nama_kader.required' => 'Nama kader wajib diisi.',
            'username.required'   => 'Username wajib diisi.',
            'username.unique'     => 'Username sudah digunakan, coba yang lain.',
            'password.required'   => 'Password wajib diisi.',
            'password.min'        => 'Password minimal 6 karakter.',
            'password.confirmed'  => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'nama_kader' => $request->nama_kader,
            'username'   => $request->username,
            'password'   => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')
                         ->with('success', 'Akun berhasil dibuat. Selamat datang, ' . $user->nama_kader . '!');
    }

    // ── Logout ────────────────────────────────────────────────────────────
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing')
                         ->with('success', 'Kamu berhasil keluar.');
    }
}