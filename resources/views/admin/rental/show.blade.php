@extends('layouts.admin')
@section('halaman', 'Show Peminjaman')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="contact-client-single shadow-reset mg-t-30 contact-client-v2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-img-v2">
                            <h2>{{ $rental->user->nama }}</h2>
                        </div><br>
                        <div class="contact-client-address">
                            <p class="address-client-ct client-addres-v2">Alamat: {{ $rental->user->alamat }}</p>
                            <p>No. Telp: +62{{ $rental->user->notelp }}</p>
                            <p>tanggal sewa: {{ $rental->start_date }}</p>
                            <p>tanggal perkiraan selesai: {{ $rental->end_date }}</p>
                            <p class="post-title">Peminjaman : {{ $rental->mobil->model }} | harga : Rp.{{$rental->total_cost}}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="contact-client-single shadow-reset mg-t-30 contact-client-v2">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contact-client-address">
                            @if ($rental->status !== 'disewa')
                            <form action="{{ route('RentalAdmin.update', $rental->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit" class="btn btn-success btn-block" name="button">Verifikasi Peminjaman</button>
                            </form>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection