@extends('layouts.admin')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tabel Peminjaman</h4>
                    
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Car</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Plat Mobil</th>
                                    <th>Status</th>
                                    <th>Hari Sewa</th>
                                    <th>Total Cost</th>
                                    <th>Returned at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($rental as $key => $data)
                                <tr>
                                    <td>{{ ++$key  }}</td>
                                    <td>{{ $data->mobil->model }}</td>
                                    <td>{{ $data->start_date }}</td>
                                    <td>{{ $data->end_date }}</td>
                                    <td>{{ $data->mobil->noplat }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>{{ $data->jumlah_hari }} Hari</td>
                                    <td>Rp.{{ $data->total_cost }}</td>
                                    <td>
                                        @if (!$data->returned_at)
                                        <a href="{{ route('RentalAdmin.returnForm', $data->mobil_id) }}" class="btn btn-warning">Return</a>
                                        @else
                                        {{ $data->returned_at }}
                                        @endif
                                    </td>
                                    <td><a href="{{ route('RentalAdmin.show', $data->id) }}" class="btn btn-primary btn-sm">Show</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection