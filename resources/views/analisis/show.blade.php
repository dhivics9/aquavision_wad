@extends('layouts.app')
@section('content')

    <section class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(function() {
                        let alert = document.querySelector('.alert');
                        if (alert) {
                            alert.style.transition = 'opacity 0.5s ease';
                            alert.style.opacity = '0';
                            setTimeout(function() {
                                alert.remove();
                            }, 500);
                        }
                    }, 2000);
                });
            </script>
        @endif

        @if (session('successWater'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('successWater') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('analisis.update', $waterQuality->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="ph_level" class="form-label">PH Level</label>
                <input type="number" name="ph_level" id="ph_level" class="form-control" value="{{ old('ph_level', $waterQuality->ph_level) }}" required>
            </div>
            <div class="mb-3">
                <label for="turbidity" class="form-label">Turbidity</label>
                <input type="number" name="turbidity" id="turbidity" class="form-control" value="{{ $waterQuality->turbidity }}" required>
            </div>
            <div class="mb-3">
                <label for="temperature" class="form-label">Temperature</label>
                <input type="number" name="temperature" id="temperature" class="form-control" value="{{ $waterQuality->temperature }}" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="number" name="color" id="color" class="form-control" value="{{ $waterQuality->color }}" required>
            </div>
            <div class="mb-3">
                <label for="tds" class="form-label">TDS</label>
                <input type="number" name="tds" id="tds" class="form-control" value="{{ $waterQuality->tds }}" required>
            </div>
            <div class="mb-3">
                <label for="hardness" class="form-label">Hardness</label>
                <input type="number" name="hardness" id="hardness" class="form-control" value="{{ $waterQuality->hardness }}" required>
            </div>
            <div class="mb-3">
                <label for="nitrate" class="form-label">Nitrate</label>
                <input type="number" name="nitrate" id="nitrate" class="form-control" value="{{ $waterQuality->nitrate }}" required>
            </div>
            <div class="mb-3">
                <label for="nitrite" class="form-label">Nitrite</label>
                <input type="number" name="nitrite" id="nitrite" class="form-control" value="{{ $waterQuality->nitrite }}" required>
            </div>
            <div class="mb-3">
                <label for="ammonia" class="form-label">Ammonia</label>
                <input type="number" name="ammonia" id="ammonia" class="form-control" value="{{ $waterQuality->ammonia }}" required>
            </div>
            <div class="mb-3">
                <label for="chloride" class="form-label">Chloride</label>
                <input type="number" name="chloride" id="chloride" class="form-control" value="{{ $waterQuality->chloride }}" required>
            </div>
            <div class="mb-3">
                <label for="sulfate" class="form-label">Sulfate</label>
                <input type="number" name="sulfate" id="sulfate" class="form-control" value="{{ $waterQuality->sulfate }}" required>
            </div>
            <div class="mb-3">
                <label for="fluoride" class="form-label">Fluoride</label>
                <input type="number" name="fluoride" id="fluoride" class="form-control" value="{{ $waterQuality->fluoride }}" required>
            </div>
            <div class="mb-3">
                <label for="iron" class="form-label">Iron</label>
                <input type="number" name="iron" id="iron" class="form-control" value="{{ $waterQuality->iron }}" required>
            </div>
            <div class="mb-3">
                <label for="manganese" class="form-label">Manganese</label>
                <input type="number" name="manganese" id="manganese" class="form-control" value="{{ $waterQuality->manganese }}" required>
            </div>
            <div class="mb-3">
                <label for="coliform_total" class="form-label">Coliform Total</label>
                <input type="number" name="coliform_total" id="coliform_total" class="form-control" value="{{ $waterQuality->coliform_total }}" required>
            </div>
            <div class="mb-3">
                <label for="e_coli" class="form-label">E. Coli</label>
                <input type="number" name="e_coli" id="e_coli" class="form-control" value="{{ $waterQuality->e_coli }}" required>
            </div>
            <div class="mb-3">
                <label for="sensor_id" class="form-label">Sensor ID</label>
                <select name="sensors_id" id="sensors_id" class="form-control" required disabled>
                <option value="">-- Pilih Sensor --</option>
                    @foreach ($sensors as $sensor)                            
                        <option value="{{ $sensor->id }}" {{ (old('sensors_id') == $sensor->id || $waterQuality->sensors_id == $sensor->id) ? 'selected' : '' }}>
                            {{ $sensor->sensor_name }}
                        </option>
                    @endforeach                    
                </select>
            </div>
            <button type="submit" class="btn" style="background-color: #014A57; color: white">Ubah</button>
            <a href="{{ route('analisis.index') }}" class="btn btn-secondary">Kembali</a>

            @if ($users->subscription !== null)
                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#actionModal">Tambah Analisa</a>
                <a href="{{ route('analisis.pdf', $waterQuality->id) }}" class="btn btn-secondary">Download PDF</a>
            @endif
        </form>
    </section>

    <div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="actionModalLabel">Tambah Analisis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('coagulation.create', $waterQuality->id) }}" class="btn btn-primary" type="button">Coagulation</a>
                        <a href="{{ route('disinfection.create', $waterQuality->id) }}" class="btn btn-primary" type="button">Disinfection</a>
                        <a href="{{ route('filtration.create', $waterQuality->id) }}" class="btn btn-primary" type="button">Filtration</a>
                        <a href="{{ route('sedimentation.create', $waterQuality->id) }}" class="btn btn-primary" type="button">Sedimentation</a>
                        <a href="{{ route('flocculation.create', $waterQuality->id) }}" class="btn btn-primary" type="button">Flocculation</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection