<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil token dari session
        $token = Session::get('bearer_token');

        // Ambil data dari API dengan Bearer Token
        $response = Http::withToken($token)->get('http://localhost:9000/api/environment');

        // Cek apakah response berhasil
        if ($response->successful()) {
            $data = $response->json();
        } else {
            $data = []; // Jika gagal, set data menjadi array kosong
        }

        // Hitung jumlah data
        $totalData = count($data);

        // Kirim data dan total data ke view
        return view('dashboard.index', [
            'data' => $data,
            'totalData' => $totalData
        ]);
    }

}
