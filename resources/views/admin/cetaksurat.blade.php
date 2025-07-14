<!DOCTYPE html>
<html>

<head>
    <title>{{ strtoupper($row->namajenissurat) }}</title>
    <style type="text/css">
        table {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }

        @page {
            size: auto;
            margin: 0;
        }
    </style>
</head>

<body>
    <br><br><br>
    <center>
        <table width="400px">
            <tr>
                <td><img src="{{ asset('foto/logoe.jpg') }}" width="50" height="90"></td>
                <td>
                    <center>
                        <font size="4">PEMERINTAH KABUPATEN <br>KELURAHAN <br>HARURU</font><br>
                        <font size="2">Jl. Sudirman - Kode Pos <br>Email : kelurahanharuru@gmail.com</font><br>
                    </center>
                </td>
            </tr>
        </table>
        ______________________________________________________________________
        <br><br>
        <center>
            <font size="4"><u><b>{{ strtoupper($row->kategori->judulkategori) }}</b></u></font>
        </center>
        <center>
            <font size="4"><b>Nomor : {{ $row->nosurat }}</b></font>
        </center>
        <br>
        <br>

        <table width="555">
            <tr class="text2">
                <td width="150">Judul Surat</td>
                <td>: {{ $row->judulsurat }}</td>
            </tr>
            <tr>
                <td width="150">Kategori Surat</td>
                <td>: {{ $row->kategori->judulkategori }}</td>
            </tr>
            <tr class="text2">
                <td width="150">Dari</td>
                <td>: {{ $row->dari }}</td>
            </tr>
            <tr>
                <td width="150">Tujuan</td>
                <td>: {{ $row->tujuan }}</td>
            </tr>
            <tr>
                <td width="150">Tanggal Surat</td>
                <td>: {{ tanggal($row->tanggal) }}</td>
            </tr>
        </table>
        <br>

        <table width="625">
            <tr>
                <td>
                    <font size="2">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       {!! $row->deskripsisurat !!}
                    </font>
                </td>
            </tr>
        </table>
        <br>

        <table width="625">
            <tr>
                <td width="400"><br><br></td>
            </tr>
        </table>

        <table width="625">
            <tr>
                <td width="430"><br><br><br><br></td>
                <td>
                    <center>
                        <b>{{ tanggal(now()) }}</b>
                        <br>
                        <img src="{{ asset('storage/' . $row->fotottd) }}" alt="Tanda Tangan" width="150"><br>
                        <b>{{ $row->namattd }}</b><br>
                        ...................................
                    </center>
                </td>
            </tr>
        </table>

    </center>

    <script>
        window.print();
    </script>
</body>

</html>
