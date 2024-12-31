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
        
        <h2>Data Monitoring Air</h2>
        <form action="{{ route('analisis.update', $monitoring->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
            <div class="mb-3">
                <label for="ph_level" class="form-label">PH Level</label>
                <input type="text" name="ph_level" id="ph_level" class="form-control" value="{{ $monitoring->ph_level }}" required>
            </div>
            <div class="mb-3"></div>
                <label for="turbidity" class="form-label">Turbidity</label>
                <input type="text" name="turbidity" id="turbidity" class="form-control" value="{{ $monitoring->turbidity }}" required>
            </div>
            <div class="mb-3"></div>
                <label for="temperature" class="form-label">Temperature</label>
                <input type="text" name="temperature" id="temperature" class="form-control" value="{{ $monitoring->temperature }}" required>
            </div>
            <div class="mb-3"></div>
                <label for="color" class="form-label">Color</label>
                <input type="text" name="color" id="color" class="form-control" value="{{ $monitoring->color }}" required>
            </div>
            <div class="mb-3">
                <label for="tds" class="form-label">TDS</label>
                <input type="text" name="tds" id="tds" class="form-control" value="{{ $monitoring->tds }}" required>
            </div>
            <div class="mb-3">
                <label for="hardness" class="form-label">Hardness</label>
                <input type="text" name="hardness" id="hardness" class="form-control" value="{{ $monitoring->hardness }}" required>
            </div>
            <div class="mb-3">
                <label for="nitrate" class="form-label">Nitrate</label>
                <input type="text" name="nitrate" id="nitrate" class="form-control" value="{{ $monitoring->nitrate }}" required>
            </div>
            <div class="mb-3">
                <label for="nitrite" class="form-label">Nitrite</label>
                <input type="text" name="nitrite" id="nitrite" class="form-control" value="{{ $monitoring->nitrite }}" required>
            </div>
            <div class="mb-3">
                <label for="ammonia" class="form-label">Ammonia</label>
                <input type="text" name="ammonia" id="ammonia" class="form-control" value="{{ $monitoring->ammonia }}" required>
            </div>
            <div class="mb-3">
                <label for="chloride" class="form-label">Chloride</label>
                <input type="text" name="chloride" id="chloride" class="form-control" value="{{ $monitoring->chloride }}" required>
            </div>
            <div class="mb-3">
                <label for="sulfate" class="form-label">Sulfate</label>
                <input type="text" name="sulfate" id="sulfate" class="form-control" value="{{ $monitoring->sulfate }}" required>
            </div>
            <div class="mb-3">
                <label for="fluoride" class="form-label">Fluoride</label>
                <input type="text" name="fluoride" id="fluoride" class="form-control" value="{{ $monitoring->fluoride }}" required>
            </div>
            <div class="mb-3">
                <label for="iron" class="form-label">Iron</label>
                <input type="text" name="iron" id="iron" class="form-control" value="{{ $monitoring->iron }}" required>
            </div>
            <div class="mb-3">
                <label for="manganese" class="form-label">Manganese</label>
                <input type="text" name="manganese" id="manganese" class="form-control" value="{{ $monitoring->manganese }}" required>
            </div>
            <div class="mb-3">
                <label for="coliform_total" class="form-label">Coliform Total</label>
                <input type="text" name="coliform_total" id="coliform_total" class="form-control" value="{{ $monitoring->coliform_total }}" required>
            </div>
            <div class="mb-3">
                <label for="e_coli" class="form-label">E. Coli</label>
                <input type="text" name="e_coli" id="e_coli" class="form-control" value="{{ $monitoring->e_coli }}" required>
            </div>
            <div class="mb-3">
                <label for="collected_at" class="form-label">Collected At</label>
                <input type="text" name="collected_at" id="collected_at" class="form-control" value="{{ $monitoring->collected_at }}" required>
            </div>
            <div class="mb-3">
                <label for="sensor_id" class="form-label">Sensor ID</label>
                <select name="sensor_id" id="sensor_id" class="form-control" required>
                    @foreach ($sensors as $sensor)
                        <option value="{{ $sensor->id }}" {{ old('sensor_id', $monitoring->sensor_id) == $sensor->id ? 'selected' : '' }}>
                        {{ $sensor->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="user_id" class="form-label">User ID</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id', $monitoring->user_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Perbarui</button>
            <a href="{{ route('analisis.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection