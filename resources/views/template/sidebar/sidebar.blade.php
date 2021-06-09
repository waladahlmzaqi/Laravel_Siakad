

<div class="main-sidebar position-fixed">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="" style="color:#273c75;">SIAKAD</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a style="color:#273c75;" href="">SKD</a>
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
                        <li class="nav-item dropdown @if (Request::is('mapel','guru','kelas','siswa')) active @endif">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-server"></i><span>Data Umum</span></a>
                            <ul class="dropdown-menu">
                                <li class="@if (Request::is('mapel')) active @endif"><a class="nav-link" href="/mapel"><i class="far fa-address-book"></i><span>Data Mapel</span></a></li>
                                <li class="@if (Request::is('guru')) active @endif"><a class="nav-link" href="/guru"><i class="fas fa-chalkboard-teacher"></i><span>Data Guru</span></a></li>
                                <li class="@if (Request::is('kelas')) active @endif"><a class="nav-link" href="/kelas"><i class="far fa-address-card"></i><span>Data Kelas</span></a></li>
                                <li class="@if (Request::is('siswa')) active @endif"><a class="nav-link" href="/siswa"><i class="fas fa-user-alt"></i><span>Data Siswa</span></a></li>
                            </ul>
                        </li>

                        <li class="menu-header">TRASH</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-recycle"></i><span>Trash Data</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="/mapel"><i class="far fa-trash-alt"></i><span>Trash Mapel</span></a></li>
                                <li><a class="nav-link" href="{{ route('guru.index') }}"><i class="far fa-trash-alt"></i><span>Trash Guru</span></a></li>
                                <li><a class="nav-link" href="/kelas"><i class="far fa-trash-alt"></i><span>Trash Kelas</span></a></li>
                                <li><a class="nav-link" href="/siswa"><i class="far fa-trash-alt"></i></i><span>Trash Siswa</span></a></li>
                            </ul>
                        </li>

                        <li class="menu-header">PENILAIAN</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Penilaian</span></a>
                            <ul class="dropdown-menu">
                              <li><a class="nav-link" href="">Kategori Penilaian</a></li>
                              <li><a class="nav-link" href="">Entri Penilaian</a></li>
                              <li><a class="nav-link" href="">Input KKM</a></li>
                              <li><a class="nav-link" href="">List Nilai Siswa</a></li>
                              <li><a class="nav-link" href="">Setting Penilaian</a></li>
                              <li><a class="nav-link" href="">Cetak Raport</a></li>
                              <li><a class="nav-link" href="">Laporan Rekap Nilai</a></li>
                            </ul>
                        </li>

                        <li class="menu-header">ADMINISTRATOR</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Administrator</span></a>
                            <ul class="dropdown-menu">
                              <li><a class="nav-link" href="">Administrator Guru</a></li>
                              <li><a class="nav-link" href="">Kompetensi Dasar</a></li>
                              <li><a class="nav-link" href="">View Tahunan</a></li>
                              <li><a class="nav-link" href="">Cetak KKM</a></li>
                            </ul>
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
