@extends('layouts.app')
@section('content')

<div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
    <a href="{{ route('analisis.create') }}" class="btn btn-primary d-flex gap-2">
        <div class=""><span class="material-symbols-rounded fs-6">add</span></div> Tambah Data Air
    </a>
</div>

@if (session('successWater'))
<div class="alert alert-success">
    {{ session('successWater') }}
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
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Sensor</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Tempreatur Air</th>
                    <th scope="col">PH Level</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($waterQualities as $waterQuality)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    @php
                        $sensor = $sensors->firstWhere('id', $waterQuality->sensors_id);
                    @endphp
                    @if ($sensor)
                        <td>{{ $sensor->sensor_name }}</td>
                        <td>{{ $sensor->sensor_location }}</td>
                    @endif
                    
                    <td>{{ $waterQuality->updated_at }}</td>
                    <td>{{ $waterQuality->temperature }}</td>
                    <td>{{ $waterQuality->ph_level }}</td>
                    <td>
                        <a href="{{ route('analisis.show', $waterQuality->id) }}" class="btn btn-info">Detail</a>
                        <form action="{{ route('analisis.destroy', $waterQuality->id) }}" method="post"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $waterQualities->links('pagination.custom') }}
        </div>
    </div>
</div>
@endsection