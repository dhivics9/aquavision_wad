@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
    <section class="table-container" style="margin: 15px auto; max-width: 90%; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
        <div class="header" style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
            <h2 style="margin-bottom: 20px;">Daftar Monitoring Air</h2>
            <div class="btn-group" style="display: flex; gap: 10px; margin-left: auto;">
            </div>
            <div class="btn-group" style="display: flex; gap: 10px; margin-left: auto;">
                <a href="{{ route('dashboard') }}" class="btn btn-outline-green" style="border-color: #28a745; color: #28a745; font-weight: bold; margin-right: auto;justify-content: left" onmouseover="this.style.backgroundColor='#28a745'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#28a745';">Kembali</a>
                <a href="{{ route('analisis.create') }}" class="btn" style="background-color: transparent; border: 2px solid #007bff; color: #007bff; font-weight: bold; font-size: 102%;" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#007bff';">Tambah Monitoring</a>
            </div>
        </div>
        <div class="table-responsive"></div>
            <table class="table table-striped table-hover"></table>
                <thead class="thead-dark" style="background-color: #343a40; color: #fff; text-align: center;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">pH Level</th>
                        <th scope="col">Turbidity</th>
                        <th scope="col">Temperature</th>
                        <th scope="col">Color</th>
                        <th scope="col">TDS</th>
                        <th scope="col">Hardness</th>
                        <th scope="col">Nitrate</th>
                        <th scope="col">Nitrite</th>
                        <th scope="col">Ammonia</th>
                        <th scope="col">Chloride</th>
                        <th scope="col">Sulfate</th>
                        <th scope="col">Fluoride</th>
                        <th scope="col">Iron</th>
                        <th scope="col">Manganese</th>
                        <th scope="col">Coliform Total</th>
                        <th scope="col">E. Coli</th>
                        <th scope="col">Collected At</th>
                        <th scope="col">Sensor ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Terakhir Diperbarui</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    @foreach($waterqualitys as $monitoring)
                    <tr style="cursor: pointer;" onmouseover="this.style.backgroundColor='#f1f1f1';" onmouseout="this.style.backgroundColor='';">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $monitoring->ph_level }}</td>
                        <td>{{ $monitoring->turbidity }}</td>
                        <td>{{ $monitoring->temperature }}</td>
                        <td>{{ $monitoring->color }}</td>
                        <td>{{ $monitoring->tds }}</td>
                        <td>{{ $monitoring->hardness }}</td>
                        <td>{{ $monitoring->nitrate }}</td>
                        <td>{{ $monitoring->nitrite }}</td>
                        <td>{{ $monitoring->ammonia }}</td>
                        <td>{{ $monitoring->chloride }}</td>
                        <td>{{ $monitoring->sulfate }}</td>
                        <td>{{ $monitoring->fluoride }}</td>
                        <td>{{ $monitoring->iron }}</td>
                        <td>{{ $monitoring->manganese }}</td>
                        <td>{{ $monitoring->coliform_total }}</td>
                        <td>{{ $monitoring->e_coli }}</td>
                        <td>{{ $monitoring->collected_at }}</td>
                        <td>{{ $monitoring->sensor_id }}</td>
                        <td>{{ $monitoring->user_id }}</td>
                        <td>
                            <div class="action-buttons" style="display: flex; gap: 5px;"></div>
                                <a href="{{ route('analisis.edit', $monitoring->id) }}" class="btn btn-warning btn-sm" style="background-color: transparent; border-color: #ffc107; color: #ffc107; padding: 5px 10px; font-weight: 500;" onmouseover="this.style.backgroundColor='#ffc107'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ffc107';">Edit</a>
                                <form action="{{ route('analisis.destroy', $monitoring->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" style="background-color: transparent; border-color: #dc3545; color: #dc3545; padding: 5px 10px; font-weight: 500;" onmouseover="this.style.backgroundColor='#dc3545'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#dc3545';">Hapus</button>
                                </form>
                                <a href="{{ route('analisis.show', $monitoring->id) }}" class="btn btn-primary btn-sm" style="background-color: transparent; border-color: #007bff; color: #007bff; padding: 5px 10px; font-weight: 500;" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#007bff';">Show</a>
                            </div>
                        </td>
                        <td>{{ $monitoring->updated_at ? $monitoring->updated_at->diffForHumans() : 'N/A'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination-container" style="display: flex; justify-content: center; margin-top: 20px; gap: 10px;">
              <a href="{{ $waterqualitys->previousPageUrl() }}" class="btn btn-secondary" style="background-color: transparent; border-color: #6c757d; color: #6c757d; width: 150px;font-weight: 500;" {{ $waterqualitys->onFirstPage() ? 'disabled' : '' }} onmouseover="this.style.backgroundColor='#6c757d'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#6c757d';">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
                  </svg>
                  Back
              </a>
              <a href="{{ $waterqualitys->nextPageUrl() }}" class="btn btn-primary" style="background-color: transparent; border-color: #007bff; color: #007bff; width: 150px; font-weight: 600;" {{ !$waterqualitys->hasMorePages() ? 'disabled' : '' }} onmouseover="this.style.backgroundColor='#007bff'; this.style.color='#fff';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#007bff';">
                  Next
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 1 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                  </svg>
              </a>
        </div>
        </div>
        <div>
                @if($waterqualitys->isEmpty())
                <div class="alert alert-warning" role="alert" style="text-align: center;margin: 15px auto; max-width: 90%; background: #fff; padding: 15px; border-radius: 10px; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
                    Data tidak ada
                </div>
                @endif
        </div>
    </section>
@endsection</svg></a></div>

