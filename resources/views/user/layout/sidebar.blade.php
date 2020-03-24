<!-- LEFT SIDEBAR -->
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="{{ url ('user/home')}}" class="@yield('activeh')"><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
                <li><a href="{{ url ('user/report')}}" class="@yield('activel')"><i class="lnr lnr-upload"></i> <span>Laporakan Keluahan</span></a></li>
                <li><a href="{{ url ('user/laporan_terkirim')}}" class="@yield('activelk')"><i class="lnr lnr-history"></i> <span>Laporan Terkirim</span></a></li>
                <li><a href="{{ url ('user/laporan_dihapus')}}" class="@yield('activetr')"><i class="lnr lnr-trash"></i> <span>Laporan Dihapus</span></a></li>
                {{-- <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li><a href="page-profile.html" class="">Profile</a></li>
                            <li><a href="page-login.html" class="">Login</a></li>
                            <li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
                        </ul>
                    </div>
                </li> --}}
                <li><a href="{{ url('user/laporan_ditanggapi')}}" class="@yield('activeld')"><i class="lnr lnr-checkmark-circle"></i> <span>Laporan Ditanggapi</span></a></li>
                <li><a href="{{ url('user/profile')}}" class="@yield('activep')"><i class="lnr lnr-user"></i> <span>Profil</span></a></li>
                <li><a href="{{ url('user/logout')}}" class=""><i class="lnr lnr-exit"></i> <span>Keluar</span></a></li>
            </ul>
        </nav>
    </div>
</div>
<!-- END LEFT SIDEBAR -->
