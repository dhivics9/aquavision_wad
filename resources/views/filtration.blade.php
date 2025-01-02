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

        <form
            @if ($filtration_analysis != null) action="{{ route('filtration.update', [$filtration_analysis->id, $waterQuality->id]) }}"
        @else
            action="{{ route('filtration.store', $waterQuality->id) }}" @endif
            method="POST" enctype="multipart/form-data">
            @csrf
            @if ($filtration_analysis != null)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="filter_type" class="form-label">Filter Type</label>
                <input type="text" name="filter_type" id="filter_type" class="form-control"
                    @if ($filtration_analysis != null) value="{{ old('filter_type', $filtration_analysis->filter_type) }}" @endif
                    required>
                <label for="filter_efficiency" class="form-label">Filter Efficiency</label>
                <input type="number" name="filter_efficiency" id="filter_efficiency" class="form-control"
                    @if ($filtration_analysis != null) value="{{ old('filter_efficiency', $filtration_analysis->filter_efficiency) }}" @endif
                    step="0.01" required>
            </div>
            @if ($filtration_analysis != null)
                <button type="submit" class="btn" style="background-color: #014A57; color: white">Ubah</button>

            @else
                <button type="submit" class="btn" style="background-color: #014A57; color: white">Simpan</button>
            @endif
            <a href="{{ route('analisis.show', $waterQuality->id) }}" class="btn btn-secondary">Kembali</a>

        </form>

        @if ($filtration_analysis != null)
            <form action="{{ route('filtration.destroy', [$filtration_analysis->id, $waterQuality->id]) }}"
                method="post" style="margin-top: 0.5rem">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
                <a href="{{ route('filtration.pdf', [$filtration_analysis->id, $waterQuality->id]) }}" class="btn btn-secondary">Download PDF</a>
            </form>
        @endif

    </section>
@endsection
