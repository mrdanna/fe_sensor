@extends('dashboard.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-2 mt-0">Master Data Sensor</h1>
        <div class="row">
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-center">Data Sensor</h5>
                    </div>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <!-- Tambahkan tombol Tambah Data Sensor -->
                        <a href="{{ route('data_add') }}" class="btn btn-primary">Tambah Data Sensor</a>
                    </div>
                    <!-- Tampilkan pesan sukses -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!-- Tampilkan pesan error -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Sensor</th>
                                        <th>Level Polusi</th>
                                        <th>Suhu</th>
                                        <th>Kualitas Air</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $sensor)
                                        <tr>
                                            <td style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td style="text-align: center;">{{ $sensor['sensor_name'] }}</td>
                                            <td style="text-align: center;">{{ $sensor['pollution_level'] }}</td>
                                            <td style="text-align: center;">{{ $sensor['temperature'] }} °C</td>
                                            <td style="text-align: center;">{{ $sensor['water_quality'] }} %</td>
                                            <td style="text-align: center;">
                                                <div class="btn-group" role="group" aria-label="Aksi">
                                                    <form method="get" action="{{ route('data_edit', $sensor['id']) }}" class="d-inline">
                                                        <button type="submit" title="Edit" style="border: none; background: none;">
                                                            <i data-feather="edit"></i>
                                                        </button>
                                                    </form>
                                                    <form method="post" action="{{ route('data_delete', $sensor['id']) }}" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" title="Hapus" style="border: none; background: none;"
                                                            onclick="return confirm('Apakah Anda yakin akan menghapus data sensor ini?');">
                                                            <i data-feather="trash-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
