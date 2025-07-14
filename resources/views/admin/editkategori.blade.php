@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                    <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{ url('panel/editkategorisimpan/' . $key->id) }}"
                                        method="post" enctype="multipart/form-data">
                                        <?= csrf_field() ?>
                                        <div class="form-group">
                                            <label>Jenis Arsip</label>
                                            <input type="text" class="form-control" name="judulkategori"
                                                value="{{ $key->judulkategori }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary float-right m-1"
                                            name="tambah">Simpan</button>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
