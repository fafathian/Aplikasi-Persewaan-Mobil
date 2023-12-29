@extends('layouts.admin')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pengemmablian Mobil</h4>
                    <form action="{{ route('RentalAdmin.return', $rental->mobil_id) }}" method="post" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="return_date">Return Date:</label>
                            <input type="date" class="form-control" cols="30" rows="10" name="return_date" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary me-2">Return Car</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection