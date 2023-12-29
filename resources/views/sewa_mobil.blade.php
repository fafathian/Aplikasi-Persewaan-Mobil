@extends('layouts.app')

@section('content')
<div class="d-flex flex-column bd-highlight mb-3 mx-auto col-8">
    <h2 class="p-2 bd-highlight justify-content-center">Rent a Car</h2>

    <form method="post" action="{{ route('rental.store') }}">
        @csrf
        <div class="form-group ">
            <label for="start_date">Start Date: </label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <div class="form-group">
            <label for="mobil_id">Select Car:</label>
            <select name="mobil_id" required>
                @foreach ($availableCars as $mobil)
                <option value="{{ $mobil->id }}">{{ $mobil->model }}- Rp.{{ $mobil->tarif }}/day</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection