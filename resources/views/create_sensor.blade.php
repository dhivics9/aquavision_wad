<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Sensor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Tambah Sensor</h1>
    <form action="{{ route('store_sensor') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="sensor_name" class="form-label">Nama Sensor</label>
            <input type="text" class="form-control" id="sensor_name" name="sensor_name" required>
        </div>
        <div class="mb-3">
            <label for="sensor_version" class="form-label">Tipe Sensor</label>
            <select class="form-control" id="sensor_type" name="sensor_version" required>
                <option value="">Pilih Tipe</option>
                <option value="v1.0">v1.0</option>
                <option value="v1.1">v1.1</option>
                <option value="v2.0">v2.0</option>
                <option value="v3.0">v3.0</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="sensor_location" class="form-label">Lokasi Sensor</label>
            <input type="text" class="form-control" id="sensor_location" name="sensor_location" required>
        </div>
        <div class="mb-3">
            <label for="sensor_status" class="form-label">Status Sensor</label>
            <select class="form-control" id="sensor_status" name="sensor_status">
                <option value="active">Aktif</option>
                <option value="inactive">Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Sensor</button>
    </form>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
