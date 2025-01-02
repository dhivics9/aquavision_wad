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
            @if ($coagulation_analysis != null) action="{{ route('coagulation.update', [$coagulation_analysis->id, $waterQuality->id]) }}"
        @else
            action="{{ route('coagulation.store', $waterQuality->id) }}" @endif
            method="POST" enctype="multipart/form-data">
            @csrf
            @if ($coagulation_analysis != null)
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="chemical_dosage" class="form-label">Chemical Dosage</label>
                <input type="number" name="chemical_dosage" id="chemical_dosage" class="form-control"
                    @if ($coagulation_analysis != null) value="{{ old('chemical_dosage', $coagulation_analysis->chemical_dosage) }}"  @endif required>
            </div>
            @if ($coagulation_analysis != null)
                <button type="submit" class="btn" style="background-color: #014A57; color: white">Ubah</button>

            @else
                <button type="submit" class="btn" style="background-color: #014A57; color: white">Simpan</button>
            @endif
            <a href="{{ route('analisis.show', $waterQuality->id) }}" class="btn btn-secondary">Kembali</a>


        </form>

        @if ($coagulation_analysis != null)
            <form action="{{ route('coagulation.destroy', [$coagulation_analysis->id, $waterQuality->id]) }}" method="post" style="margin-top: 0.5rem">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Hapus</button>
                <a href="{{ route('coagulation.pdf', [$coagulation_analysis->id, $waterQuality->id]) }}" class="btn btn-secondary">Download PDF</a>
            </form>                
        @endif

    </section>
@endsection
