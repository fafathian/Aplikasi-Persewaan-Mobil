@extends('layouts.admin')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="float-start">Tabel Mobil</h4>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('mobil.create')}}" class="btn btn-primary btn-rounded btn-fw float-end">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            No.
                                        </th>
                                        <th>
                                            Merek
                                        </th>
                                        <th>
                                            Model
                                        </th>
                                        <th>
                                            No. Plat Mobil
                                        </th>
                                        <th>
                                           Tarif Sewa
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mobil as $result => $d)
                                    <tr>
                                        <td>
                                            {{ $result + $mobil->firstitem() }}
                                        </td>
                                        <td>
                                            {{ $d->merek }}
                                        </td>
                                        <td>
                                            {{ $d->model }}
                                        </td>
                                        <td>
                                            {{ $d->noplat }}
                                        </td>
                                        <td>
                                            Rp.{{ $d->tarif }}
                                        </td>
                                        <td>
                                            {{ $d->status }}
                                        </td>
                                        <td>
                                            <form action="{{ route('mobil.destroy', $d->id) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <a href="{{ route('mobil.edit', $d->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm" name="button">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div aria-label="Page navigation example">
                            <ul class="pagination">
                                {!! $mobil->links() !!}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection