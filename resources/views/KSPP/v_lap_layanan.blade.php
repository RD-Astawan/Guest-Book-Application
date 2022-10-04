@extends('App.master')
@section('title')
    Laporan Layanan
@endsection

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Laporan Layanan</h4>
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
                    <a href="#">Laporan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Layanan</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Data Laporan Layanan</h4>
                            <div class="ml-auto">
                                <h2>Status Verifikasi :
                                <button onclick="selectBtn()" id="btn_3" class="btn btn-success mr-2" {{ $check == $check3 ? 'disabled' : '' }}><i class="fas fa-check"></i></button>
                                <button onclick="selectBtn2()" id="btn_4" class="btn btn-danger float-right" {{ $check2 == $check3 ? 'disabled' : '' }}><i class="fas fa-expand-arrows-alt"></i></button>
                            </h2>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatables" class="display table table-bordered table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th style="text-align: center; width: 7%;">Nomor</th>
                                        <th style="text-align: center;">Tanggal</th>
                                        <th style="text-align: center;">Nama</th>
                                        <th style="text-align: center;">Asal Instansi</th>
                                        <th style="text-align: center;">Tujuan Layanan</th>
                                        <th style="text-align: center;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                    <tr>
                                        <td style="text-align: center;">{{ $row->nomor }}</td>
                                        <td style="text-align: center;">{{ $row->tanggal }}</td>
                                        <td style="text-align: center;">{{ $row->nama }}</td>
                                        <td style="text-align: center;">{{ $row->asal_instansi }}</td>
                                        <td style="text-align: center;">{{ $row->tujuan }}</td>
                                        <td style="text-align: center;">{{ $row->status }}</td>
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