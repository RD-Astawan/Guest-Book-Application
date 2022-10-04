@extends('App.master')
@section('title')
    Beranda
@endsection

@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
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
                    <a href="#">Dashboard</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                   
                    <div class="card-body">
                        <h1>Welcome, {{ $data->nama_petugas }} !</h1>
                        <p>Selamat Datang di Sistem Informasi Buku Tamu Balai Pengkajian Teknologi Pertanian Bali</p>
                    </div>
                    <br />
                    <table style="margin: 10px auto 10px auto;">
                        <tr>
                            <td align="center" colspan="3"><img src="{{ asset('storage/'.$data->foto) }}" alt="" class="img-thumbnail" style="width: 40%; margin-bottom:20px;"></td>
                        </tr>
                        
                    </table>
                    <table align="center" style="margin-bottom:50px;">
                        <tr>
                            <td style="width:100px;" align="left"><h2><b>NIP</b></h2></td>
                            <td align="center" style="width:30px;"><h2><b>:</b></h2></td>
                            <td><h2><b>{{ $data->nip }}</b></h2></td>
                        </tr>
                        <tr>
                            <td style="width:100px;" align="left"><h2><b>Nama</b></h2></td>
                            <td align="center" style="width:30px;"><h2><b>:</b></h2></td>
                            <td><h2><b>{{ $data->nama_petugas }}</b></h2></td>
                        </tr>
                        <tr>
                            <td style="width:100px;" align="left"><h2><b>Jabatan</b></h2></td>
                            <td align="center" style="width:30px;"><h2><b>:</b></h2></td>
                            <td><h2><b>{{ $data->jabatan }}</b></h2></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection