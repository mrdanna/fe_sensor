<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.index');
    }

    public function login(Request $request)
    {
        // Kirim request login ke API untuk mendapatkan token
        $response = Http::post('http://localhost:9000/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        //dd($response->json());

        if ($response->successful()) {
            // Ambil token dari response
            $token = $response->json()['access_token'];

            // Simpan token ke session
            Session::put('bearer_token', $token);

            // Redirect ke dashboard
            return redirect()->route('dashboard');
        } else {
            // Jika gagal, tampilkan pesan error
            return back()->withErrors(['error' => 'Invalid credentials or failed to login']);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
