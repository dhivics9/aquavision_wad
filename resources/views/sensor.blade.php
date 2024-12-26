@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h3 style="color: #014A57">Total Sensor</h3>
                        <p class="text-secondary">{{ $sensor }}</p>
                    </div>
                    <div class="col-md-4">
                        <!-- <h3 class="text-success">Total Laporan</h3>
                            <p class="text-secondary">200</p> -->
                    </div>
                </div>
                <!-- <div class="row mt-3">
                        <div class="col-md-12">
                            <canvas id="myChart" width="400" height="200"></canvas>
                        </div>
                    </div> -->

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Data Sensor</h3>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-3">
                            <a href="{{ route('login') }}" style="background-color: #014A57;margin-top: 1rem;" class="btn btn-primary d-flex gap-2">
                                <div class=""><span class="material-symbols-rounded fs-6">add</span></div> Tambah Sensor
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sensor</th>
                                    <th>Nilai Sensor</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection