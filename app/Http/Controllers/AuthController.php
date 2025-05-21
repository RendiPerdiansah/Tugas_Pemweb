<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginPage() {
        if (auth()->check()) {
            $user = auth()->user();
            return redirect()->to($this->redirectByLevel($user->level));
        }
        return view('v_login');
    }

    public function registerPage() {
        return view('v_register');
    }

    public function login(Request $request) {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            return redirect()->to($this->redirectByLevel($user->level));
        }
        return back()->withErrors(['email' => 'Login gagal.']);
    }

    public function register(Request $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level,
        ]);
        return redirect('/')->with('success', 'Register berhasil.');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    private function redirectByLevel($level) {
        return match($level) {
            1 => '/admin',
            2 => '/user',
            3 => '/mahasiswa',
            4 => '/dosen',
            default => '/',
        };
    }
}
