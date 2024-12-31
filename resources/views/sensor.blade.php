@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-6">
            <div class="card p-4" style="background-color: #001E26; color: white; border-radius: 10px;">
                <style>
                    .text-custom {
                        color: black;
                    }
                </style>
                <div class="animation-container">
                    <svg xmlns="http://www.w3.org/2000/svg" class="animated-image" width="100" height="100" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M7 0a1.5 1.5 0 0 0-1.5 1.5v11a1.5 1.5 0 0 0 1.404 1.497c-.35.305-.872.678-1.628 1.056A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .224-.947c-.756-.378-1.278-.75-1.628-1.056A1.5 1.5 0 0 0 10.5 12.5v-11A1.5 1.5 0 0 0 9 0zm1 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m.5 1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M8 9a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1"/>
                    </svg>
                </div>
                <h5 class="mt-3">You can link other sensor to this account.</h5>
                <button type="button" class="btn btn-success" style="background-color: #01756B; border: none;" data-bs-toggle="modal" data-bs-target="#tambahSensorModal">
                    Add a sensor
                </button>

                <!-- POP UP FORM ADD SENSOR -->
                <div class="modal fade" id="tambahSensorModal" tabindex="-1" aria-labelledby="tambahSensorModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-custom" id="tambahSensorModalLabel">Tambah Sensor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('store_sensor') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 text-start">
                                        <label for="sensor_name" class="form-label text-custom">Nama Sensor</label>
                                        <input type="text" class="form-control" id="sensor_name" name="sensor_name" required>
                                    </div>
                                    <div class="mb-3 text-start">
                                        <label for="sensor_type" class="form-label text-custom">Tipe Sensor</label>
                                        <select class="form-control" id="sensor_type" name="sensor_type" required>
                                            <option value="">Pilih Tipe</option>
                                            <option value="v1.0">v1.0</option>
                                            <option value="v1.1">v1.1</option>
                                            <option value="v2.0">v2.0</option>
                                            <option value="v3.0">v3.0</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 text-start">
                                        <label for="sensor_location" class="form-label text-custom">Lokasi Sensor</label>
                                        <input type="text" class="form-control" id="sensor_location" name="sensor_location" required>
                                    </div>
                                    <div class="mb-3 text-start">
                                        <label for="sensor_status" class="form-label text-custom">Status Sensor</label>
                                        <select class="form-control" id="sensor_status" name="sensor_status" required onchange="updateLastActive()">
                                            <option value="" disabled selected>Pilih Status</option>
                                            <option value="active">active</option>
                                            <option value="inactive">inactive</option>
                                        </select>
                                    </div>
                                    <div class="text-start">
                                        <button type="submit" class="btn btn-primary">Add Sensor</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABEL SENSOR -->
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card p-3" style="border-radius: 10px;">
                @if(session('successSen'))
                    <div class="alert alert-success">
                        {{ session('successSen') }}
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Device Status</h6>
                        <p class="text-secondary mb-0" style="font-size: 14px;">Manage your sensors below.</p>
                    </div>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Sensor Name</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sensors as $sensor)
                            <tr>
                                <td>
                                    @if($sensor->sensor_status == 'active')
                                        <div class="spinner-grow text-success" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    @else
                                        <div class="spinner-grow text-danger" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                @endif</td>
                                <td>{{ $sensor->sensor_name }}</td>
                                <td>{{ $sensor->sensor_type }}</td>
                                <td>{{ $sensor->sensor_location }}</td>
                                <td>
                                    @if($sensor->sensor_status == 'active')
                                        <span class="text-success">{{ $sensor->sensor_status }}</span>
                                    @else
                                        <span class="text-danger">{{ $sensor->sensor_status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- BUTTON EDIT DAN DELETE -->
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editSensorModal" 
                                            data-id="{{ $sensor->id }}"
                                            data-name="{{ $sensor->sensor_name }}"
                                            data-type="{{ $sensor->sensor_type }}"
                                            data-location="{{ $sensor->sensor_location }}"
                                            data-status="{{ $sensor->sensor_status }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('sensor.destroy', $sensor->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No sensors added yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- POP UP FORM EDIT -->
<div class="modal fade" id="editSensorModal" tabindex="-1" aria-labelledby="editSensorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSensorModalLabel">Edit Sensor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSensorForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="edit_sensor_name" class="form-label text-custom">Nama Sensor</label>
                        <input type="text" class="form-control" id="edit_sensor_name" name="sensor_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_sensor_type" class="form-label text-custom">Tipe Sensor</label>
                        <select class="form-control" id="edit_sensor_type" name="sensor_type" required>
                            <option value="v1.0">v1.0</option>
                            <option value="v1.1">v1.1</option>
                            <option value="v2.0">v2.0</option>
                            <option value="v3.0">v3.0</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_sensor_location" class="form-label text-custom">Lokasi Sensor</label>
                        <input type="text" class="form-control" id="edit_sensor_location" name="sensor_location" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_sensor_status" class="form-label text-custom">Status Sensor</label>
                        <select class="form-control" id="edit_sensor_status" name="sensor_status" required onchange="updateLastActive()">
                            <option value="active">Aktif</option>
                            <option value="inactive">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    const editSensorModal = document.getElementById('editSensorModal');
    editSensorModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; 
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const type = button.getAttribute('data-type');
        const location = button.getAttribute('data-location');
        const status = button.getAttribute('data-status');
        const lastActive = button.getAttribute('data-last-active');
        
        const form = document.getElementById('editSensorForm');
        form.action = `/sensors/${id}`; 
        document.getElementById('edit_sensor_name').value = name;
        document.getElementById('edit_sensor_type').value = type;
        document.getElementById('edit_sensor_location').value = location;
        document.getElementById('edit_sensor_status').value = status;
    });
</script>

