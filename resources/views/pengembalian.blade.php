@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Return Car</h2>

    <form method="post" action="{{ route('rental.return', $rental->mobil_id) }}">
        @csrf

        <div class="form-group">
            <label for="return_date">Return Date:</label>
            <input type="date" class="form-control" name="return_date" required>
        </div>

        <!-- Tambahkan formulir atau informasi lain yang dibutuhkan untuk pengembalian -->

        <button type="submit" class="btn btn-primary">Return Car</button>
    </form>
</div>
@endsection