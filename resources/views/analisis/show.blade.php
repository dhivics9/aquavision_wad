@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8"></div>
                <section style="background-color: #ffffff; padding: 10px 15px 15px 15px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                    <h2 style="color: #343a40; margin-bottom: 20px; text-align: center;">Data Monitoring Air</h2>
                    <form action="{{ route('analisis.update', $monitoring->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="ph_level" class="form-label" style="color: #495057;">Ph Level</label>
                            <input type="text" name="ph_level" id="ph_level" class="form-control" value="{{ $monitoring->ph_level }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="turbidity" class="form-label" style="color: #495057;">Turbidity</label>
                            <input type="text" name="turbidity" id="turbidity" class="form-control" value="{{ $monitoring->turbidity }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="temperature" class="form-label" style="color: #495057;">Temperature</label>
                            <input type="text" name="temperature" id="temperature" class="form-control" value="{{ $monitoring->temperature }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="color" class="form-label" style="color: #495057;">Color</label>
                            <input type="text" name="color" id="color" class="form-control" value="{{ $monitoring->color }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="tds" class="form-label" style="color: #495057;">TDS</label>
                            <input type="text" name="tds" id="tds" class="form-control" value="{{ $monitoring->tds }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="hardness" class="form-label" style="color: #495057;">Hardness</label>
                            <input type="text" name="hardness" id="hardness" class="form-control" value="{{ $monitoring->hardness }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="nitrate" class="form-label" style="color: #495057;">Nitrate</label>
                            <input type="text" name="nitrate" id="nitrate" class="form-control" value="{{ $monitoring->nitrate }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="nitrite" class="form-label" style="color: #495057;">Nitrite</label>
                            <input type="text" name="nitrite" id="nitrite" class="form-control" value="{{ $monitoring->nitrite }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="ammonia" class="form-label" style="color: #495057;">Ammonia</label>
                            <input type="text" name="ammonia" id="ammonia" class="form-control" value="{{ $monitoring->ammonia }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="chloride" class="form-label" style="color: #495057;">Chloride</label>
                            <input type="text" name="chloride" id="chloride" class="form-control" value="{{ $monitoring->chloride }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="sulfate" class="form-label" style="color: #495057;">Sulfate</label>
                            <input type="text" name="sulfate" id="sulfate" class="form-control" value="{{ $monitoring->sulfate }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="fluoride" class="form-label" style="color: #495057;">Fluoride</label>
                            <input type="text" name="fluoride" id="fluoride" class="form-control" value="{{ $monitoring->fluoride }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="iron" class="form-label" style="color: #495057;">Iron</label>
                            <input type="text" name="iron" id="iron" class="form-control" value="{{ $monitoring->iron }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="manganese" class="form-label" style="color: #495057;">Manganese</label>
                            <input type="text" name="manganese" id="manganese" class="form-control" value="{{ $monitoring->manganese }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="coliform_total" class="form-label" style="color: #495057;">Coliform Total</label>
                            <input type="text" name="coliform_total" id="coliform_total" class="form-control" value="{{ $monitoring->coliform_total }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="e_coli" class="form-label" style="color: #495057;">E. Coli</label>
                            <input type="text" name="e_coli" id="e_coli" class="form-control" value="{{ $monitoring->e_coli }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="collected_at" class="form-label" style="color: #495057;">Collected At</label>
                            <input type="text" name="collected_at" id="collected_at" class="form-control" value="{{ $monitoring->collected_at }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="sensor_id" class="form-label" style="color: #495057;">Sensor ID</label>
                            <input type="text" name="sensor_id" id="sensor_id" class="form-control" value="{{ $monitoring->sensor_id }}" required disabled>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label" style="color: #495057;">User ID</label>
                            <input type="text" name="user_id" id="user_id" class="form-control" value="{{ $monitoring->user_id }}" required disabled>
                        </div>
                        <div class="text-center mt-4">
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('monitoring.index') }}" class="btn btn-secondary" style="background-color: #6c757d; border-color: #6c757d;">Kembali</a>
                            </div>
                        </div></div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection