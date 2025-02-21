<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() 
    {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();
    
            // Pastikan role ada di database
            if (!$user->role) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Akun Anda tidak memiliki peran yang valid.');
            }
    
            // Arahkan berdasarkan role
            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'wali_santri' => redirect()->route('wali.dashboard'),
                default => redirect()->route('login')->with('error', 'Anda tidak memiliki akses yang valid.')
            };
        }
    
        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ])->onlyInput('email');
    }
    
    public function logout() {
        Auth::logout();
        return redirect()->route('login');    
    }
}
