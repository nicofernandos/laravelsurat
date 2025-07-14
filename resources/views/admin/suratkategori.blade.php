@extends('admin.layout')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-3">
        <h3>{{ $title }}</h3>
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary mb-3" href="{{ url('panel/tambahsurat') }}">Tambah Surat</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Surat</th>
                                <th>Dari</th>
                                <th>Tujuan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surats as $i => $s)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $s->judulsurat }}</td>
                                <td>{{ $s->dari }}</td>
                                <td>{{ $s->tujuan }}</td>
                                <td>{{ $s->tanggal }}</td>
                                <td>
                                    <a href="{{ url('panel/detailsurat/' . $s->idsurat) }}" class="btn btn-sm btn-secondary m-1">Lihat</a>
                                    <a href="{{ url('panel/editsurat/' . $s->idsurat) }}" class="btn btn-sm btn-info m-1">Edit</a>
                                    <a href="{{ url('panel/hapussurat/' . $s->idsurat) }}" class="btn btn-sm btn-danger bdel m-1">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                            @if(count($surats) == 0)
                            <tr><td colspan="6" class="text-center">Tidak ada surat dalam kategori ini.</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
