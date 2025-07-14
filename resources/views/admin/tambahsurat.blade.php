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
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ url('panel/tambahsuratsimpan') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>QR Code</label><br>
                                        <div>{!! $qr !!}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="idkategori" class="form-label">Kategori</label>
                                        <select id="idkategori" name="idkategori" class="form-control" required>
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($value as $row)
                                                <option value="{{ $row->id }}">{{ $row->judulkategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>No Surat</label>
                                        <input type="text" class="form-control" name="nosurat" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Dari</label>
                                        <input type="text" class="form-control" name="dari" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Tujuan</label>
                                        <input type="text" class="form-control" name="tujuan" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Judul Surat</label>
                                        <input type="text" class="form-control" name="judulsurat" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Tanggal Surat</label>
                                        <input type="date" class="form-control" name="tanggal" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi Surat</label>
                                        <textarea id="deskripsisurat" class="form-control" name="deskripsisurat" rows="3" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>File Surat (PDF/DOCX)</label>
                                        <input type="file" class="form-control" name="file" accept=".pdf,.doc,.docx" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Nama Penandatangan</label>
                                        <input type="text" class="form-control" name="namattd" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Foto Tanda Tangan</label>
                                        <input type="file" class="form-control" name="fotottd" accept="image/*" required>
                                    </div>

                                    <button type="submit" class="btn btn-success pull-right" name="simpan">Simpan</button>
                                    <br><br>
                                </form>
                                    <script src="https://cdn.ckeditor.com/4.25.1/standard/ckeditor.js"></script>
                                    <script>
                                        CKEDITOR.replace('deskripsisurat');
                                    </script>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div
@endsection

