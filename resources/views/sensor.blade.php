@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-6">
            <div class="card p-4" style="background-color: #001E26; color: white; border-radius: 10px;">
                <div class="animation-container">
                    <svg xmlns="http://www.w3.org/2000/svg" class="animated-image" width="100" height="100" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M7 0a1.5 1.5 0 0 0-1.5 1.5v11a1.5 1.5 0 0 0 1.404 1.497c-.35.305-.872.678-1.628 1.056A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .224-.947c-.756-.378-1.278-.75-1.628-1.056A1.5 1.5 0 0 0 10.5 12.5v-11A1.5 1.5 0 0 0 9 0zm1 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m0 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1m.5 1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M8 9a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1"/>
                    </svg>
                </div>
                <h5 class="mt-3">You can link other sensor to this account.</h5>
                <a href="{{route('create_sensor')}}" class="btn btn-success mt-3" style="background-color: #01756B; border: none;">Add a sensor</a>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card p-3" style="border-radius: 10px;">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="mb-0">Device Status</h6>
                        <p class="text-secondary mb-0" style="font-size: 14px;">Manage your sensors below.</p>
                    </div>
                </div>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Sensor Name</th>
                            <th>Type</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Last Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($sensors as $sensor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sensor->sensor_name }}</td>
                                <td>{{ $sensor->sensor_type }}</td>
                                <td>{{ $sensor->sensor_location }}</td>
                                <td>{{ $sensor->sensor_status }}</td>
                                <td>{{ $sensor->last_active }}</td>
                                <td>
                                    <a href="{{ route('sensor.edit', $sensor->id) }}" class="btn btn-warning btn-sm">Edit</a>
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

@endsection