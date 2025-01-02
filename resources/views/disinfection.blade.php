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
            @if ($disinfection_analysis != null) action="{{ route('disinfection.update', [$disinfection_analysis->id, $waterQuality->id]) }}"
        @else
            action="{{ route('disinfection.store', $waterQuality->id) }}" @endif
            method="POST" enctype="multipart/form-data">
            @csrf
            @if ($disinfection_analysis != null)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="disinfectant_type" class="form-label">Disinfectant type</label>
                <input type="text" name="disinfectant_type" id="disinfectant_type" class="form-control"
                    @if ($disinfection_analysis != null) value="{{ old('disinfectant_type', $disinfection_analysis->disinfectant_type) }}" @endif
                    required>
                <label for="contact_time" class="form-label">Contact Time</label>
                <input type="number" name="contact_time" id="contact_time" class="form-control"
                    @if ($disinfection_analysis != null) value="{{ old('contact_time', $disinfection_analysis->contact_time) }}" @endif
                    step="0.01" required>
                <label for="residual_chlorine_level" class="form-label">Residual Chlorine Level</label>
                <input type="number" name="residual_chlorine_level" id="residual_chlorine_level" class="form-control"
                    @if ($disinfection_analysis != null) value="{{ old('residual_chlorine_level', $disinfection_analysis->residual_chlorine_level) }}" @endif
                    step="0.01" required>
            </div>
            @if ($disinfection_analysis != null)
                <button type="submit" class="btn" style="background-color: #014A57; color: white">Ubah</button>

            @else
                <button type="submit" class="btn" style="background-color: #014A57; color: white">Simpan</button>
            @endif
            <a href="{{ route('analisis.show', $waterQuality->id) }}" class="btn btn-secondary">Kembali</a>

        </form>

        @if ($disinfection_analysis != null)
            <form action="{{ route('disinfection.destroy', [$disinfection_analysis->id, $waterQuality->id]) }}"
                method="post" style="margin-top: 0.5rem">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
                <a href="{{ route('disinfection.pdf', [$disinfection_analysis->id, $waterQuality->id]) }}" class="btn btn-secondary">Download PDF</a>
            </form>
        @endif

    </section>
@endsection
