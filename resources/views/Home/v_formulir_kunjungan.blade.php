<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <meta name="theme-color" content="#712cf9">
        <title>Sticky Footer Navbar Template · Bootstrap v5.2</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                font-size: 3.5rem;
                }
            }

            .b-example-divider {
                height: 3rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
                flex-shrink: 0;
                width: 1.5rem;
                height: 100vh;
            }

            .bi {
                vertical-align: -.125em;
                fill: currentColor;
            }

            /* HIDE RADIO */
            [type=radio] { 
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
            }

            /* IMAGE STYLES */
            [type=radio] + img {
            cursor: pointer;
            width: 40px;
            height:40px;
            background-image:none;
            }

            /* CHECKED STYLES */
            [type=radio]:checked + img {
            outline: 2px solid #f00;
            }
        </style>
    </head>
    <body class="d-flex flex-column h-100" style="background-color: aliceblue">
        @include('sweetalert::alert')
    <header class="p-3 mb-3 border-bottom" style="background-color:#055C9D">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="{{ asset('logo/logo.png') }}" alt="" width="50px;" style="margin-right: 20px;">
                </a>
                <h2 style="color:#fff">Sistem Informasi Buku Tamu BPTP BALI</h2>
            </div>
        </div>
    </header>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container" style="background-color:white; margin-top:25px;">
        <div class="content" style="width: 60%; margin:0 auto;">
            <div class="content-form" style="padding:20px 0">
                <h3 class="mt-5">Formulir Kunjungan</h3>
                <br />
                    {{-- <form method="post" action="{{ route('store_bt') }}"> --}}
                        <form method="post" action="/store_bt">
                        @csrf
                        <input type="hidden" value="{{ date('Y-m-d H:i:s'); }}" name="tanggal" class="form-control">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Telp.</label>
                            <div class="col-sm-10">
                            <input type="text" name="no_tlp" id="no_tlp" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nomor</label>
                            <div class="col-sm-10">
                            <input type="text" name="nomor" id="nomor" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Asal Instansi</label>
                            <div class="col-sm-10">
                            <input type="text" name="asal_instansi" id="asal_instansi" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                            <input type="text" name="alamat" id="alamat" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tujuan</label>
                            <div class="col-sm-5">
                                <select class="form-select" name="tujuan" id="tujuan" aria-label="Default select example" required>
                                    <option selected>Pilih Tujuan</option>
                                    <option value="Layanan Informasi & Konsultasi">Layanan Informasi & Konsultasi</option>
                                    <option value="Layanan UPBS">Layanan UPBS</option>
                                    <option value="Layanan Magang">Layanan Magang</option>
                                    <option value="Layanan Perpustakaan">Layanan Perpustakaan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tingkat Kepuasan</label>
                            <div class="col-sm-4">
                                <label>
                                    <input type="radio" name="tingkat_kepuasan" value="sad-icon.png" required>
                                <img src="{{ asset('icons/sad-icon.png'); }}" alt="Option 1" title="" style="margin-right: 10px">
                                </label>
        
                                <label>
                                    <input type="radio" name="tingkat_kepuasan" value="smile-icon.png" required>
                                    <img src="{{ asset('icons/smile-icon.png'); }}" alt="Option 2" title="">
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 row col-sm-2">
                            <input type="submit" id="submit" class="btn btn-success">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</main>

<footer class="footer mt-auto py-3" style="background-color: #055C9D">
    <div class="container">
        <span class="text-muted"></span>
    </div>
</footer>

<script src="{{ asset('cdn/bootstrap.bundle.min.js') }}" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>