@extends('layouts.admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Mobil</h4>
                    <form action="{{ route('mobil.store') }}" method="post" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Merek</label>
                            <input class="form-control" name="merek" placeholder="Merek Mobil" id="merek" cols="30" rows="10" autocomplete="off">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input class="form-control" name="model" placeholder="Model Mobil" id="model" cols="30" rows="10" autocomplete="off">
                                            </input>
                        </div>
                        <div class="form-group">
                            <label>No. Plat</label>
                            <input class="form-control" name="noplat" placeholder="No. Plat Mobil" id="noplat" cols="30" rows="10" autocomplete="off">
                                            </input>
                        </div>
                        <div class="form-group">
                            <label>Tarif Sewa</label>
                            <input class="form-control" name="tarif" placeholder="Tarif Sewa" id="tarif" cols="30" rows="10" autocomplete="off">
                                            </input>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary me-2">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection