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

        <h2>Tambah Data Monitoring Air</h2>
        <form action="{{ route('analisis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="ph_level" class="form-label">PH Level</label>
                <input type="number" name="ph_level" id="ph_level" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="turbidity" class="form-label">Turbidity</label>
                <input type="number" name="turbidity" id="turbidity" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="temperature" class="form-label">Temperature</label>
                <input type="number" name="temperature" id="temperature" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="number" name="color" id="color" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tds" class="form-label">TDS</label>
                <input type="number" name="tds" id="tds" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="hardness" class="form-label">Hardness</label>
                <input type="number" name="hardness" id="hardness" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nitrate" class="form-label">Nitrate</label>
                <input type="number" name="nitrate" id="nitrate" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nitrite" class="form-label">Nitrite</label>
                <input type="number" name="nitrite" id="nitrite" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="ammonia" class="form-label">Ammonia</label>
                <input type="number" name="ammonia" id="ammonia" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="chloride" class="form-label">Chloride</label>
                <input type="number" name="chloride" id="chloride" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="sulfate" class="form-label">Sulfate</label>
                <input type="number" name="sulfate" id="sulfate" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="fluoride" class="form-label">Fluoride</label>
                <input type="number" name="fluoride" id="fluoride" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="iron" class="form-label">Iron</label>
                <input type="number" name="iron" id="iron" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="manganese" class="form-label">Manganese</label>
                <input type="number" name="manganese" id="manganese" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="coliform_total" class="form-label">Coliform Total</label>
                <input type="number" name="coliform_total" id="coliform_total" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="e_coli" class="form-label">E. Coli</label>
                <input type="number" name="e_coli" id="e_coli" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="collected_at" class="form-label">Collected At</label>
                <input type="number" name="collected_at" id="collected_at" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="sensor_id" class="form-label">Sensor ID</label>
                <select name="sensor_id" id="sensor_id" class="form-control" required>
                <option value="">-- Pilih Sensor --</option>
                    @foreach ($sensors as $sensor)                            
                        <option value="{{ $sensor->id }}" {{ old('sensors_id') == $sensor->id ? 'selected' : '' }}>
                                {{ $sensor->sensor_name }}
                            </option>
                    @endforeach                    
                </select>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('analisis.store') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection</div>