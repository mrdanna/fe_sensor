@extends('dashboard.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

        <!-- Menampilkan total data dengan ikon dan gambar sensor -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4 mb-4 flex items-center space-x-4">
            <div class="flex-shrink-0">
                <!-- Ikon MDI -->
                <i class="mdi mdi-test-tube text-4xl text-blue-600"></i>
            </div>
            <div>
                <h5 class="text-lg font-bold">Total Data Sensor</h5>
                <p class="text-gray-600 mt-2">Jumlah Data: {{ $totalData }}</p>
            </div>
        </div>
    </div>
</main>
@endsection
