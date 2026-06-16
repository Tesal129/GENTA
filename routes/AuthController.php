<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id_user, 'user_role' => $user->role, 'user_name' => $user->nama_kader]);
            return redirect('/dashboard');
        }

        return back()->withErrors(['username' => 'Username atau password salah.'])->withInput();
    }

    public function logout() {
        session()->flush();
        return redirect('/login')->with('success', 'Berhasil keluar.');
    }

    public function dashboard() {
        return view('admin.dashboard');
    }
}