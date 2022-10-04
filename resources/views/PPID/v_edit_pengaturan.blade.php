@extends('App.master')
@section('title')
    Edit Pengaturan
@endsection
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Profil</h4>
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
                    <a href="#">Edit</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Profil</a>
                </li>
            </ul>
        </div>
        <div class="row">						
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Data Profil</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <form method="post" enctype="multipart/form-data" action="{{ route('update_pengaturan') }}">
                            @csrf
                            <div class="form-group">
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-md-3 p-0">
                                        <input type="file" name="foto" class="form-control input-full @error('foto') is-invalid @enderror" accept="image/*">
                                        @error('nomor')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">NIP</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" name="nip" class="form-control input-full @error('nip') is-invalid @enderror" value="{{ old('nip',$data->nip) }}">
                                        @error('nip')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Nama</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" name="nama_petugas" class="form-control input-full @error('nama_petugas') is-invalid @enderror" value="{{ old('nama_petugas',$data->nama_petugas) }}">
                                        @error('nama_petugas')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Jabatan</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" name="jabatan" class="form-control input-full @error('jabatan') is-invalid @enderror" value="{{ old('jabatan',$data->jabatan) }}">
                                        @error('jabatan')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Username</label>
                                    <div class="col-md-6 p-0">
                                        <input type="text" name="username" class="form-control input-full @error('username') is-invalid @enderror" value="{{ old('username',$data->username) }}">
                                        @error('username')
                                            <small class="form-text text-muted">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 row ml-3">
                                    <label for="inlineinput" class="col-md-2 col-form-label">Password</label>
                                    <div class="col-md-6 p-0">
                                        <input type="password" name="password" class="form-control input-full @error('password') is-invalid @enderror">
                                        @error('password')
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