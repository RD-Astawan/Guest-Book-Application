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
                    <a href="#">layanan</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12" style="">
                <div class="card">
                    <div class="card-body">
                        <div class="row" align="center">
                            <form class="form-inline col-md-8" action="{{ route('cetak_lap_layanan') }}" method="GET" style="margin:100px auto;" target="_blank">
                                <div class="form-group">
                                <label>Tanggal</label>
                                    <input type="date" name="tgl_awal" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" required>
                                </div>
                                <label>s / d</label>
                                <div class="form-group">
                                    <input type="date" name="tgl_akhir" class="form-control mx-sm-3" aria-describedby="passwordHelpInline" required>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary">Cetak</button>
                            </form>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection