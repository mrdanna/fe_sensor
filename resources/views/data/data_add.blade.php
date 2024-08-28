@extends('dashboard.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-2 mt-0">Input Data Sensor Baru</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-center">Form Input Data Sensor</h5>
                    </div>
                    <div class="card-body">
                        <!-- Menampilkan pesan sukses atau error -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Form untuk input data sensor -->
                        <form action="{{ route('data_add_action') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="sensor_name">Nama Sensor:</label>
                                <input type="text" class="form-control" id="sensor_name" name="sensor_name" required>
                            </div>
                            <div class="form-group">
                                <label for="pollution_level">Level Polusi:</label>
                                <input type="number" class="form-control" id="pollution_level" name="pollution_level" required>
                            </div>
                            <div class="form-group">
                                <label for="temperature">Suhu:</label>
                                <input type="number" class="form-control" id="temperature" name="temperature" required>
                            </div>
                            <div class="form-group">
                                <label for="water_quality">Kualitas Air:</label>
                                <input type="number" class="form-control" id="water_quality" name="water_quality" required>
                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="{{ route('data') }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
