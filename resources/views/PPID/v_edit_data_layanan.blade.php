@extends('App.master')
@section('title')
    Edit Data Layanan
@endsection
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Layanan</h4>
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
                    <a href="#">Layanan</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Data Layanan</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <form method="post" enctype="multipart/form-data" action="/data_layanan/update/{{ $data->id }}">
                            @csrf
                            <div class="form-group">
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-sm-2 col-form-label">Nomor</label>
                                    <div class="col-md-2 p-0">
                                        <input type="text" name="nomor" class="form-control input-full @error('nomor') is-invalid @enderror" value="{{ old('nomor', $data->nomor) }}">
                                        @error('nomor')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Tanggal</label>
                                    <div class="col-md-6 p-0">
                                        <input type="date" name="tanggal" class="form-control input-full @error('tanggal') is-invalid @enderror" value="{{ old('tanggal',$data->tanggal) }}">
                                        @error('tanggal')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Nama</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" name="nama" class="form-control input-full @error('nama') is-invalid @enderror" value="{{ old('nama',$data->nama) }}">
                                        @error('nama')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Asal Instansi</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" name="asal_instansi" class="form-control input-full @error('asal_instansi') is-invalid @enderror" value="{{ old('asal_instansi',$data->asal_instansi) }}">
                                        @error('asal_instansi')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Tujuan</label>
                                    <div class="col-md-4 p-0">
                                        <select class="form-select form-control input-full @error('tujuan') is-invalid @enderror" name="tujuan" id="tujuan" aria-label="Default select example" style="padding: .25rem .5rem !important; height:36px;">
                                            <option value="" selected>Pilih Tujuan</option>
                                            <option value="Layanan Informasi & Konsultasi" {{ old('tujuan') == 'Layanan Informasi & Konsultasi' ? 'selected' : '' }} {{ $data->tujuan == 'Layanan Informasi & Konsultasi' ? 'selected' : '' }}>Layanan Informasi & Konsultasi</option>
                                            <option value="Layanan UPBS" {{ old('tujuan') == 'Layanan UPBS' ? 'selected' : '' }} {{ $data->tujuan == 'Layanan UPBS' ? 'selected' : '' }}>Layanan UPBS</option>
                                            <option value="Layanan Magang" {{ old('tujuan') == 'Layanan Magang' ? 'selected' : '' }} {{ $data->tujuan == 'Layanan Magang' ? 'selected' : '' }}>Layanan Magang</option>
                                            <option value="Layanan Perpustakaan" {{ old('tujuan') == 'Layanan Perpustakaan' ? 'selected' : '' }} {{ $data->tujuan == 'Layanan Perpustakaan' ? 'selected' : '' }}>Layanan Perpustakaan</option>
                                        </select>
                                        @error('tujuan')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Status</label>
                                    <div class="col-md-2 p-0">
                                        <select class="form-select form-control input-full @error('status') is-invalid @enderror" name="status" id="status" aria-label="Default select example" style="padding: .25rem .5rem !important; height:36px;">
                                            <option value="" selected>Pilih Status</option>
                                            <option value="Tercapai" {{ old('status') == 'Tercapai' ? 'selected' : '' }} {{ $data->status == 'Tercapai' ? 'selected' : '' }}>Tercapai</option>
                                            <option value="Tidak tercapai" {{ old('status') == 'Tidak tercapai' ? 'selected' : '' }} {{ $data->status == 'Tidak tercapai' ? 'selected' : '' }}>Tidak Tercapai</option>
                                        </select>
                                        @error('status')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                
                                <hr>
                                <div class="mb-3 row ml-3">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-6 p-0">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection