<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\AreaParkir;
use App\Models\Kendaraan;
use App\Models\TarifParkir;
use App\Models\TransaksiParkir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            ActivityLog::create([
                'user_id' => Auth::id(),
                'aktivitas' => 'login',
                'module' => 'auth',
                'deskripsi' => 'User login ke sistem',
            ]);
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        ActivityLog::create([
            'user_id' => Auth::id(),
            'aktivitas' => 'logout',
            'module' => 'auth',
            'deskripsi' => 'User logout dari sistem',
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
