@extends('App.master')
@section('title')
    Data Kunjungan
@endsection

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Kunjungan</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Data</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Kunjungan</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Kunjungan</h4>
                            <div class="ml-auto">
                                <h2>
                                    <a href="{{ route('add_data_kunjungan') }}" class="btn btn-primary mr-2" readonly>
                                        Tambah Data
                                    </a>
                                    <a href="{{ route('set_lap_kunjungan') }}" class="btn btn-info float-right">
                                        Cetak Laporan
                                    </a>
                                </h2>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 7%;">No</th>
                                        <th style="text-align: center;">Tanggal</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Asal Instansi</th>
                                        <th style="text-align: center;">Alamat Telepon</th>
                                        <th style="text-align: center;">Tujuan</th>
                                        <th style="text-align: center;">Tingkat Kepuasan</th>
                                        <th style="text-align: center;">Id Petugas</th>
                                        <th style="width: 14%; text-align:center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                    <tr>
                                            <td style="text-align: center;">{{ $row->nomor }}</td>
                                            <td style="text-align: center;">{{ $row->tanggal }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td style="text-align: center;">{{ $row->asal_instansi }}</td>
                                            <td style="text-align: center;">{{ $row->alamat }}</td>
                                            <td style="text-align: center;">{{ $row->tujuan }}</td>
                                            <td style="text-align: center;">
                                                <img src="{{ asset('icons/'.$row->tingkat_kepuasan) }}" width="25px" height="25px"></td>
                                            <td style="text-align: center;">{{ $row->id_petugas }}</td>
                                            <td>
                                                <a href="/data_kunjungan/edit/{{ $row->id }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="#modalHapusDt_kunjungan{{ $row->id }}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
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
@foreach ($data as $u)
<div class="modal fade" id="modalHapusDt_kunjungan{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Servis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" enctype="multipart/form-data" action="/data_kunjungan/destroy/{{ $u->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h4>Apakah Anda Ingin Menghapus Data Ini?</h4>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"> Batal</i></button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-trash"> Hapus</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection