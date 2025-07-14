@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-primary mb-3" href="{{ url('panel/tambahkategori') }}">Tambah</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Kategori</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                
                                            @foreach ($kunci as $row)
                                                <tr>
                                                    <td> {{ $row->id }}</td>
                                                    <td>{{ $row->judulkategori }}</td>
                                                    <td>
                                                        <a class="btn btn-primary m-1"
                                                        href="{{ url('panel/editkategori/'. $row->id) }}">Edit</a>
                                                        <a class="btn btn-danger bdel m-1"
                                                        href="{{ url('panel/hapuskategori/'. $row->id) }}">Hapus</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
