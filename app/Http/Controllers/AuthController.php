<?php

namespace App\Http\Controllers;

use App\Models\Balita;
use App\Models\Jadwal;
use App\Models\Pemeriksaan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ── Tampilkan form login ──────────────────────────────────────────────
    public function showLogin()
    {
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

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            \App\Models\LoginLog::create([
                'user_id' => Auth::id(),
                'ip_address' => $request->ip(),
                'device' => $request->header('User-Agent'),
                'login_at' => now(),
            ]);

            if (Auth::user()->role === 'user' || Auth::user()->role === 'User Biasa') {
                return redirect()->intended(route('landing'))
                                 ->with('success', 'Selamat datang!');
            }

            return redirect()->intended(route('dashboard'))
                             ->with('success', 'Selamat datang, ' . Auth::user()->nama_kader . '!');
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors(['username' => 'Username atau password salah.']);
    }

    // ── Tampilkan form register kader ───────────────────────────────────────
    public function showRegisterKader()
    {
        return view('auth.register-kader');
    }

    // ── Proses register kader ───────────────────────────────────────────────
    public function registerKader(Request $request)
    {
        $request->validate([
            'nama_kader' => 'required|string|max:100',
            'username'   => 'required|string|max:50|unique:user,username',
            'role'       => 'required|string',
            'kode_admin' => 'nullable|string',
            'password'   => 'required|string|min:6|confirmed',
        ], [
            'nama_kader.required' => 'Nama lengkap wajib diisi.',
            'username.required'   => 'Username wajib diisi.',
            'username.unique'     => 'Username sudah digunakan, coba yang lain.',
            'role.required'       => 'Peran/Role wajib dipilih.',
            'password.required'   => 'Password wajib diisi.',
            'password.min'        => 'Password minimal 6 karakter.',
            'password.confirmed'  => 'Konfirmasi password tidak cocok.',
        ]);

        $role = $request->role;
        if ($role !== 'user' && $role !== 'User Biasa') {
            if ($request->kode_admin !== 'ADMIN-GENTA') {
                return back()->withErrors(['kode_admin' => 'Kode verifikasi admin salah atau kosong.'])->withInput();
            }
        } else {
            $role = 'user';
        }

        $user = User::create([
            'nama_kader' => $request->nama_kader,
            'username'   => $request->username,
            'password'   => Hash::make($request->password),
            'role'       => $role,
        ]);

        Auth::login($user);

        if ($role === 'user') {
            return redirect()->route('landing')
                             ->with('success', 'Akun berhasil dibuat. Selamat datang!');
        }

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

    // ── Dashboard ────────────────────────────────────────────────────────
    public function dashboard()
    {
        $totalBalita = Balita::count();

        $totalPemeriksaan = Pemeriksaan::whereMonth('tanggal_periksa', now()->month)
            ->whereYear('tanggal_periksa', now()->year)
            ->count();

        $jadwalBulanIni = Jadwal::whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->count();

        $balitaStunting = Pemeriksaan::whereIn('status_gizi', ['stunting', 'gizi_buruk'])
            ->select('Balita_id_balita')
            ->distinct()
            ->get()
            ->count();

        $balitaTerbaru = Balita::orderByDesc('id_balita')
            ->limit(5)
            ->get()
            ->map(function (Balita $balita) {
                $balita->umur_bulan = (int) Carbon::parse($balita->tanggal_lahir)->diffInMonths(now());
                $balita->status_gizi_terakhir = Pemeriksaan::where('Balita_id_balita', $balita->id_balita)
                    ->orderByDesc('tanggal_periksa')
                    ->value('status_gizi');

                return $balita;
            });

        $jadwalMendatang = Jadwal::where('tanggal', '>=', now()->toDateString())
            ->orderBy('tanggal')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBalita',
            'totalPemeriksaan',
            'jadwalBulanIni',
            'balitaStunting',
            'balitaTerbaru',
            'jadwalMendatang'
        ));
    }
}