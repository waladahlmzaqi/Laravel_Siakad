

<div class="main-sidebar position-fixed">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="" style="color:#6777ef;">SIAKAD</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a style="color:#6777ef;" href="">SKD</a>
        </div>
        <ul class="sidebar-menu">
            @if(Auth::check())
                    @if(Auth::user()->role == 'admin')
                        <li class="menu-header">DASHBOARD</li>
                        <li class="nav-item @if (Request::is('dashboard')) active @endif">
                            <a href="/dashboard" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="menu-header">MASTER</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Data Umum</span></a>
                            <ul class="dropdown-menu">
                              <li class="active"><a class="nav-link" href="{{ route('siswa.index') }}">Data Siswa</a></li>
                              <li><a class="nav-link" href="{{ route('guru.index') }}">Data Guru</a></li>
                              <li><a class="nav-link" href="">Data Karyawan</a></li>
                              <li><a class="nav-link" href="">Data Kelas</a></li>
                              <li><a class="nav-link" href="/mapel">Data Mapel</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Penilaian</span></a>
                            <ul class="dropdown-menu">
                              <li class="active"><a class="nav-link" href="">Kategori Penilaian</a></li>
                              <li><a class="nav-link" href="">Entri Penilaian</a></li>
                              <li><a class="nav-link" href="">KKM</a></li>
                              <li><a class="nav-link" href="">List Nilai Siswa</a></li>
                              <li><a class="nav-link" href="">Setting Penilaian</a></li>
                              <li><a class="nav-link" href="">Laporan Rekap Nilai</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('')}}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Administrasi Guru</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('')}}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Kompetensi Dasar</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('')}}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>View Tahunan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('')}}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Cetak Raport</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('')}}" class="nav-link">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Cetak KKM</span>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->role == '')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('hubin')}}">Halaman Hubin</a>
                    </li>
                    @endif

                    @if(Auth::user()->role == 'siswa')
                    <li class="nav-item @if (Request::is('siswa')) active @endif">
                        <a class="nav-link" href="{{url('siswa')}}">Halaman Siswa</a>
                    </li>
                    @endif
            @endif
    </aside>
</div>
