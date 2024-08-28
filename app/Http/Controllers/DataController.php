<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    public function index() {
        // Ambil token dari session
        $token = Session::get('bearer_token');

        if ($token) {
            // Ambil data dari API dengan Bearer Token
            $response = Http::withToken($token)->get('http://localhost:9000/api/environment');

            if ($response->successful()) {
                $data = $response->json();

                // Kirim data ke view
                return view('data.index', ['data' => $data]);
            } else {
                // Tampilkan pesan error jika API gagal
                return redirect()->back()->with('error', 'Gagal mengambil data dari API.');
            }
        } else {
            // Jika token tidak ada di session, arahkan ke halaman login atau tampilkan pesan error
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
    }

    public function add()
    {
        return view('data.data_add');
    }

    public function add_action(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'sensor_name' => 'required|string|max:255',
            'pollution_level' => 'required|numeric',
            'temperature' => 'required|numeric',
            'water_quality' => 'required|numeric',
        ]);

        // Format data yang akan dikirim
        $data = [
            'sensor_name' => $validated['sensor_name'],
            'pollution_level' => (float) $validated['pollution_level'],
            'temperature' => (float) $validated['temperature'],
            'water_quality' => (float) $validated['water_quality'],
        ];

         // Ambil token dari sesi
        $token = Session::get('bearer_token');

         // Kirim data ke API dengan Bearer Token
        $response = Http::withToken($token)
                    ->post('http://localhost:9000/api/environment', $data);

        // Kirim data ke API
        // $response = Http::withToken('YOUR_BEARER_TOKEN_HERE')
        //                 ->post('http://localhost:9000/api/environment', $data);

        // Debugging
        // dd([
        //     'status' => $response->status(),
        //     'body' => $response->body(),
        //     'json' => $response->json(),
        // ]);

        if ($response->successful()) {
            return redirect()->route('data')->with('success', 'Data sensor berhasil ditambahkan.');
        } else {
            return redirect()->route('data_add')->with('error', 'Gagal menambahkan data sensor. Status: ' . $response->status());
        }
    }

    public function edit($id)
    {
        $token = Session::get('bearer_token');

        // Ambil data dari API
        $response = Http::withToken($token)->get("http://localhost:9000/api/environment/{$id}");

        if ($response->failed()) {
            return redirect()->route('data')->with('error', 'Data tidak ditemukan.');
        }

        $data = $response->json();

        // Tampilkan form edit dengan data yang ada
        return view('data.edit', compact('data'));
    }

    // Menangani update data
    public function update(Request $request, $id)
    {
        $token = Session::get('bearer_token');

        // Validasi input
        $validated = $request->validate([
            'sensor_name' => 'required|string|max:255',
            'pollution_level' => 'required|numeric',
            'temperature' => 'required|numeric',
            'water_quality' => 'required|numeric',
        ]);

        // Format data yang akan dikirim
        $data = [
            'sensor_name' => $validated['sensor_name'],
            'pollution_level' => (float) $validated['pollution_level'],
            'temperature' => (float) $validated['temperature'],
            'water_quality' => (float) $validated['water_quality'],
        ];

        // Kirim permintaan update ke API
        $response = Http::withToken($token)->put("http://localhost:9000/api/environment/{$id}", $data);

        if ($response->failed()) {
            return redirect()->route('data_edit', $id)->with('error', 'Gagal memperbarui data sensor. Status: ' . $response->status());
        }

        return redirect()->route('data')->with('success', 'Data sensor berhasil diperbarui.');
    }

    public function delete($id)
    {
        // Ambil token Bearer dari sesi
        $token = Session::get('bearer_token');

        // Kirim permintaan DELETE ke API
        $response = Http::withToken($token)->delete('http://localhost:9000/api/environment/' . $id);

        if ($response->successful()) {
            // Redirect dengan pesan sukses jika berhasil
            return redirect()->route('data')->with('success', 'Data sensor berhasil dihapus.');
        } else {
            // Redirect dengan pesan error jika gagal
            return redirect()->route('data')->with('error', 'Gagal menghapus data sensor. Status: ' . $response->status());
        }
    }

}
