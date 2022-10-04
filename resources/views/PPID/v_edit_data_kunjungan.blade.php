@extends('App.master')
@section('title')
    Edit Data Kunjungan
@endsection
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Data Servis</h4>
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
                    <a href="#">Servis</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Data Kunjungan</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <form method="post" enctype="multipart/form-data" action="/data_kunjungan/update/{{ $data->id }}">
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
                                        <input type="date" name="tanggal" class="form-control input-full @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $data->tanggal) }}">
                                        @error('tanggal')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Nama</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" name="nama" class="form-control input-full @error('nama') is-invalid @enderror" value="{{ old('nama', $data->nama) }}">
                                        @error('nama')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Asal Instansi</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" name="asal_instansi" class="form-control input-full @error('asal_instansi') is-invalid @enderror" value="{{ old('asal_instansi', $data->asal_instansi) }}">
                                        @error('asal_instansi')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Alamat</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" name="alamat" class="form-control input-full @error('alamat') is-invalid @enderror" value="{{ old('alamat', $data->alamat) }}">
                                        @error('alamat')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Telepon</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" name="no_tlp" class="form-control input-full @error('no_tlp') is-invalid @enderror" value="{{ old('no_tlp', $data->no_tlp) }}">
                                        @error('no_tlp')
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
                                    <label for="inlineinput" class="col-md-2 col-form-label">Tingkat Kepuasan</label>
                                    <div class="col-md-6 p-0">
                                        <label>
                                            <input type="radio" name="tingkat_kepuasan" class="@error('tingkat_kepuasan') is-invalid @enderror" value="sad-icon.png" {{ ($data->tingkat_kepuasan=="sad-icon.png")? "checked" : "" }}>
                                        <img src="{{ asset('icons/sad-icon.png'); }}" alt="Option 1" title="" style="margin-right: 10px">
                                        </label>
                
                                        <label>
                                            <input type="radio" name="tingkat_kepuasan" class="@error('tingkat_kepuasan') is-invalid @enderror" value="smile-icon.png" {{ ($data->tingkat_kepuasan=="smile-icon.png")? "checked" : "" }}>
                                            <img src="{{ asset('icons/smile-icon.png'); }}" alt="Option 2" title="">
                                        </label>
                                        @error('tingkat_kepuasan')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Id Petugas</label>
                                    <div class="col-md-4 p-0">
                                        <select class="form-control input-square @error('id_petugas') is-invalid @enderror" id="id_petugas" name="id_petugas" onchange="selectIdPetugas()" style="padding: .25rem .5rem !important; height:36px;">
                                            <option value="">-- Pilih Id Petugas --</option>
                                            @foreach ($id_petugas as $row)
                                            <option value="{{ $row->id_petugas }}">{{ $row->id_petugas }} - {{ $row->nama_petugas }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_petugas')
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