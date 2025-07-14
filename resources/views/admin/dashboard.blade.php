@extends('admin/layout')
@section('content')
    <div class="content-body">
        <div class="container-fluid mt-3">
            <h3>{{ $title }}</h3>
            <h5 class="mb-3">Laravel Surat</h5>
            <div class="row">
                @foreach ($kategori as $row)
                <div class="col-md-6">
                    <a href="{{ url('panel/suratkategori/' . $row->id) }}">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">{{ $row->judulkategori }}</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white">{{ $row->surat_count ?? 0 }}</h2>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="icon-list"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
