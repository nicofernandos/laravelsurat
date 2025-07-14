@extends('admin.layout')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-3">
        <h3 class="mb-3">{{ $title }}</h3>
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                     {!! $qr !!}
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Kategori</th>
                        <td>{{ $surat->kategori->judulkategori ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>No Surat</th>
                        <td>{{ $surat->nosurat }}</td>
                    </tr>
                    <tr>
                        <th>Dari</th>
                        <td>{{ $surat->dari }}</td>
                    </tr>
                    <tr>
                        <th>Tujuan</th>
                        <td>{{ $surat->tujuan }}</td>
                    </tr>
                    <tr>
                        <th>Judul Surat</th>
                        <td>{{ $surat->judulsurat }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $surat->tanggal }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $surat->deskripsisurat }}</td>
                    </tr>
                    <tr>
                        <th>File</th>
                        <td>
                            <a href="{{ asset('storage/' . $surat->file) }}" target="_blank">Lihat File</a>
                        </td>
                    </tr>
                    <tr>
                        <th>Nama Penandatangan</th>
                        <td>{{ $surat->namattd }}</td>
                    </tr>
                    <tr>
                        <th>Foto Tanda Tangan</th>
                        <td>
                            <img src="{{ asset('storage/' . $surat->fotottd) }}" alt="Tanda Tangan" width="150">
                        </td>
                    </tr>
                </table>

                <a href="{{ url('panel/surat') }}" class="btn btn-secondary mt-3">Kembali</a>
                <a href="{{ url('panel/cetaksurat/' . $surat->idsurat) }}" class="btn btn-success mt-3" target="_blank">
                    Cetak Surat
                </a>

            </div>
        </div>
    </div>
</div>
@endsection
