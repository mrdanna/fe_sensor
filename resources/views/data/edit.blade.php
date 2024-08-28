@extends('dashboard.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-2 mt-0">Edit Data Sensor</h1>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0 text-center">Form Edit Data Sensor</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('data_update', $data['id']) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Kolom pertama -->
                                    <div class="col-md-6" style="border-right: 1px solid #ccc;">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sensor Name:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="sensor_name" name="sensor_name" value="{{ old('sensor_name', $data['sensor_name']) }}" required />
                                            </div>
                                            <br><br>

                                            <label class="col-sm-3 col-form-label">Pollution Level:</label>
                                            <div class="col-sm-9">
                                                <input type="number" step="0.1" class="form-control" id="pollution_level" name="pollution_level" value="{{ old('pollution_level', $data['pollution_level']) }}" required />
                                            </div>
                                            <br><br>
                                        </div>
                                    </div>

                                    <!-- Kolom kedua -->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Temperature:</label>
                                            <div class="col-sm-9">
                                                <input type="number" step="0.1" class="form-control" id="temperature" name="temperature" value="{{ old('temperature', $data['temperature']) }}" required />
                                            </div>
                                            <br><br>

                                            <label class="col-sm-3 col-form-label">Water Quality:</label>
                                            <div class="col-sm-9">
                                                <input type="number" step="0.1" class="form-control" id="water_quality" name="water_quality" value="{{ old('water_quality', $data['water_quality']) }}" required />
                                            </div>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                                <br><hr>

                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="{{ route('data') }}" class="btn btn-danger">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
