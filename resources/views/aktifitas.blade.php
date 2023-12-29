@extends('layouts.app')


@section('content')
<div class="container">
    <h2>Your Rentals</h2>

    @if ($userRentals->isEmpty())
    <p>You haven't rented any cars yet.</p>
    @else
    <table class="table">
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
            @foreach ($userRentals as $key => $rental)
            <tr>
                <td>{{ ++$key  }}</td>
                <td>{{ $rental->mobil->model }}</td>
                <td>{{ $rental->start_date }}</td>
                <td>{{ $rental->end_date }}</td>
                <td>{{ $rental->mobil->noplat }}</td>
                <td>{{ $rental->status }}</td>
                <th>{{ $rental->jumlah_hari }} hari</th>
                <td>Rp.{{ $rental->total_cost }}</td>
                <td>
                    {{ $rental->returned_at }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection