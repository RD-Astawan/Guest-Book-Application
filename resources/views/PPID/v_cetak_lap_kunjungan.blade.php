<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Kunjungan</title>
    <link rel="stylesheet" href="{{ asset('cdn/bootstrap.min.css') }}" 
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>
    .line-title{
        border:0;
        border-style:inset;
        border-top:1px solid #000;
    }
    body{
        background-color: white;

    }
</style>
</head>
<body onload="window.print()">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table style="width: 100%;">
                        <tr>
                            <td align="center">
                                <span style="line-height:1.6; font-weight: bold;">
                                    Data Kunjungan
                                </span>
                            </td>
                        </tr>
                    </table>
                    <hr class="line-title">
                    <p align="center">
                        Laporan Data Kunjungan
                    </p>
                    <p align="center">
                        Periode Tanggal {{ $tgl_awal }} s/d {{ $tgl_akhir }} 
                    </p>
                    <hr>

                    <table class="table table-bordered">
                        <tr>
                            <th style="text-align: center; width: 7%;">Nomor</th>
                            <th style="text-align: center;">Tanggal</th>
                            <th style="text-align: center;">Nama</th>
                            <th style="text-align: center;">Asal Instansi</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="text-align: center;">Telepon</th>
                            <th style="text-align: center;">Tujuan</th>
                            <th style="text-align: center;">Tingkat Kepuasan</th>
                            <th style="text-align: center;">Id Petugas</th>
                        </tr>
                        @php $no=1 @endphp
                        @foreach ($data_akhir as $row)
                    <tr>
                        <td style="text-align: center;">{{ $row->nomor }}</td>
                        <td style="text-align: center;">{{ $row->tanggal }}</td>
                        <td style="text-align: center;">{{ $row->nama }}</td>
                        <td style="text-align: center;">{{ $row->asal_instansi }}</td>
                        <td style="text-align: center;">{{ $row->alamat }}</td>
                        <td style="text-align: center;">{{ $row->no_tlp }}</td>
                        <td style="text-align: center;">{{ $row->tujuan }}</td>
                        <td style="text-align: center;">
                            <img src="{{ asset('icons/'.$row->tingkat_kepuasan) }}" width="25px" height="25px">
                        </td>
                        <td style="text-align: center;">{{ $row->id_petugas }}</td>
                    </tr>
                    @endforeach
                    </table> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>