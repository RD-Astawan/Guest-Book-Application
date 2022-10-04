<div class="sidebar">		
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">            
            <ul class="nav">
                @if (Auth::guard('ppid')->check())
                <li class="nav-item {{ set_active('ppid_dashboard') }}">
                    <a href="{{ route('ppid_dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ set_active('data_kunjungan') }}">
                    <a href="{{ route('data_kunjungan') }}">
                        <i class="fas regular fa-file"></i>
                        <p>Data Kunjungan</p>
                    </a>
                </li>
                <li class="nav-item {{ set_active('data_layanan') }}">
                    <a href="{{ route('data_layanan') }}">
                        <i class="fas regular fa-file"></i>
                        <p>Data Layanan</p>
                    </a>
                </li>
                <li class="nav-item {{ set_active('index_grafik') }}">
                    <a href="{{ route('index_grafik') }}">
                        <i class="fas regular fa-file"></i>
                        <p>Grafik</p>
                    </a>
                </li>
                <li class="nav-item {{ set_active('index_lap_kunjungan') }} {{ set_active('index_lap_layanan') }}">
                    <a data-toggle="collapse" href="#forms">
                        <i class="fas fa-book-open"></i>
                        <p>Laporan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('index_lap_kunjungan') ? 'show' : '' }} {{ request()->is('index_lap_layanan') ? 'show' : '' }}" id="forms">
                        <ul class="nav nav-collapse">
                            <li class="{{ set_active('index_lap_kunjungan') }}">
                                <a href="{{ route('index_lap_kunjungan') }}">
                                    <span class="sub-item">Laporan Kunjungan</span>
                                </a>
                            </li>
                            <li class="{{ set_active('index_lap_layanan') }}">
                                <a href="{{ route('index_lap_layanan') }}">
                                    <span class="sub-item">Laporan Layanan</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ set_active('edit_pengaturan') }}">
                    <a href="{{ route('edit_pengaturan') }}">
                        <i class="fas fa-cogs"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
                @endif
                @if (Auth::guard('kspp')->check())
                {{-- Dashboard KSPP --}}
                <li class="nav-item {{ set_active('kspp_dashboard') }}">
                    <a href="{{ route('kspp_dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ set_active('index_lap_kunjungan_kspp') }}">
                    <a href="{{ route('index_lap_kunjungan_kspp') }}">
                        <i class="fas regular fa-file"></i>
                        <p>Laporan Kunjungan</p>
                    </a>
                </li>
                <li class="nav-item {{ set_active('index_lap_layanan_kspp') }}">
                    <a href="{{ route('index_lap_layanan_kspp') }}">
                        <i class="fas regular fa-file"></i>
                        <p>Laporan Layanan</p>
                    </a>
                </li>
                <li class="nav-item {{ set_active('edit_pengaturan_kspp') }}">
                    <a href="{{ route('edit_pengaturan_kspp') }}">
                        <i class="fas fa-cogs"></i>
                        <p>Pengaturan</p>
                    </a>
                </li>
                @endif
                {{-- Menu Together --}}
                <li class="nav-item">
                    <a href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>