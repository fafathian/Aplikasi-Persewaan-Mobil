@extends('layouts.admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Mobil</h4>
                    <form action="{{ route('mobil.update', $mobil->id) }}" method="post" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label>Merek</label>
                            <input class="form-control" name="merek" value="{{ $mobil->merek }}" placeholder="merek Mobil" id="merek" cols="30" rows="10" autocomplete="off">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>Model</label>
                            <input class="form-control" name="model" value="{{ $mobil->model }}" placeholder="model" id="model" cols="30" rows="10" autocomplete="off">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>No. Plat</label>
                            <input class="form-control" name="noplat" value="{{ $mobil->noplat }}" placeholder="noplat" id="noplat" cols="30" rows="10" autocomplete="off">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>Tarif Sewa</label>
                            <input class="form-control" name="tarif" value="{{ $mobil->tarif }}" placeholder="Tarif Sewa" id="tarif" cols="30" rows="10" autocomplete="off">
                            </input>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input class="form-control" name="status" value="{{ $mobil->status }}" placeholder="status Mobil" id="status" cols="30" rows="10" autocomplete="off">
                            </input>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary me-2">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection