@extends('admin/layout')
@section('content')
 <div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-3">{{ $title }}</h3>
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary mb-3" href="{{ url('panel/tambahsurat') }}">Tambah</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No Surat</th>
                                        <th>Judul Surat</th>
                                        <th>Kategori</th>
                                        <th>Tujuan</th>
                                        <th>Tanggal</th>
                                        <th>QR Code</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kunci as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->nosurat }}</td>
                                            <td>{{ $row->judulsurat }}</td>
                                            <td>{{ $row->kategori->judulkategori ?? '-' }}</td>
                                            <td>{{ $row->tujuan }}</td>
                                            <td>{{ $row->tanggal }}</td>
                                            <td>
                                                {!! \QrCode::size(100)->generate(url('panel/detailsurat/' . $row->idsurat)) !!}
                                            </td>
                                            <td>
                                                <a href="{{ url('panel/detailsurat/' . $row->idsurat) }}" class="btn btn-primary" style="background-color:red !important">Detail</a>
                                                <a class="btn btn-primary m-1"
                                                    href="{{ url('panel/editsurat/' . $row->idsurat) }}">Edit</a>
                                                 <a class="btn btn-danger bdel m-1"
                                                        href="{{ url('panel/hapussurat/'. $row->idsurat) }}">Hapus</a>
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
