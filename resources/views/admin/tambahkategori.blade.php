@extends('admin.layout')
@section('content')
 <div class="content-body">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-3">{{ $title }}</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('users')->level == 'Admin')
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ url('panel/tambahkategorisimpan') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <input type="text" class="form-control" name="judulkategori">
                                    </div>
                                    <button type="submit" class="btn btn-success pull-right" name="simpan">Simpan</button>
                                    <br><br>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection