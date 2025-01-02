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
            @if ($flocculation_analysis != null) action="{{ route('flocculation.update', [$flocculation_analysis->id, $waterQuality->id]) }}"
        @else
            action="{{ route('flocculation.store', $waterQuality->id) }}" @endif
            method="POST" enctype="multipart/form-data">
            @csrf
            @if ($flocculation_analysis != null)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="mixing_time" class="form-label">Mixing Time</label>
                <input type="number" name="mixing_time" id="mixing_time" class="form-control"
                    @if ($flocculation_analysis != null) value="{{ old('mixing_time', $flocculation_analysis->mixing_time) }}"  @endif required>

                <label for="floc_size" class="form-label">Floc Size</label>
                <input type="number" name="floc_size" id="floc_size" class="form-control"
                    @if ($flocculation_analysis != null) value="{{ old('floc_size', $flocculation_analysis->floc_size) }}"  @endif required>
            </div>
            @if ($flocculation_analysis != null)
            <button type="submit" class="btn" style="background-color: #014A57; color: white">Ubah</button>

        @else
            <button type="submit" class="btn" style="background-color: #014A57; color: white">Simpan</button>
        @endif
            <a href="{{ route('analisis.show', $waterQuality->id) }}" class="btn btn-secondary">Kembali</a>


        </form>

        @if ($flocculation_analysis != null)
        <form action="{{ route('flocculation.destroy', [$flocculation_analysis->id, $waterQuality->id]) }}" method="post" style="margin-top: 0.5rem">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Hapus</button>
            <a href="{{ route('flocculation.pdf', [$flocculation_analysis->id, $waterQuality->id]) }}" class="btn btn-secondary">Download PDF</a>
        </form>                
    @endif

    </section>
@endsection
