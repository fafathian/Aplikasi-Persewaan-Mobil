@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-sm-3 items-center">
        <form class="form" method="get" action="{{ route('search') }}">
            <div class="form-group w-100 mb-3">
                <label for="search" class="d-block mr-2">Pencarian</label>
                <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
            </div>
        </form>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        @foreach ($mobil as $result => $d)
        <div class="col-sm-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('img/avanza.png' ) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$d->merek}}</h5>
                    <p class="card-text">Mobil : {{$d->model}}.</p>
                    <p class="card-text">Biaya sewa : Rp{{$d->tarif}}/hari.</p>
                    <p class="card-text">Ketersediaan : {{ucfirst(trans($d->status))}}.</p>
                    <a href="{{route('rental.create')}}" class="btn btn-primary">Mari Sewa</a>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection