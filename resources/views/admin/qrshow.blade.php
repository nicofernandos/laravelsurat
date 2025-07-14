@extends('admin.layout')
@section('content')
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">
                <h3>{{ $title }}</h3>
                <p>QR Code untuk surat <strong>{{ $surat->nosurat }} {{ $surat->qrcode }}</strong>:</p>
                {!! $qr !!}
                <p>
                    <a href="{{ url('panel/detailsurat/' . $surat->idsurat) }}" class="btn btn-primary mt-3">Lihat Detail Surat</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
