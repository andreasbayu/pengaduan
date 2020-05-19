<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/dashboard/')}}">
	  <div class="sidebar-brand-icon rotate-n-15">
		<i class="fas fa-laugh-wink"></i>
	  </div>
	  <div class="sidebar-brand-text mx-3">Lapor <sup>IN</sup></div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Nav Item - Dashboard -->
	<li class="nav-item @yield('activedb')">
	  <a class="nav-link" href="{{ url('admin/dashboard/')}}">
		<i class="fas fa-fw fa-tachometer-alt"></i>
		<span>Dashboard</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
	  Interface
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
	  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
		<i class="fas fa-fw fa-cog"></i>
		<span>Akun</span>
	  </a>
	  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
		  <h6 class="collapse-header">Akun:</h6>
		  <a class="collapse-item" href="#">Edit Profil</a>
		  <a class="collapse-item" href="{{ url('/admin/logout')}}">Keluar</a>
		</div>
	  </div>
	</li>

	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
	  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
		<i class="fas fa-fw fa-wrench"></i>
		<span>Pengaturan</span>
	  </a>
	  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
		<div class="bg-white py-2 collapse-inner rounded">
		  <h6 class="collapse-header">Pengaturan : </h6>
		  <a class="collapse-item @yield('activedkt')" href="{{ url ('admin/kategori_pelaporan')}}">Kategori</a>
		  <a class="collapse-item @yield('activedms')" href="{{ url('admin/daftar_masyarakat')}}">Masyarakat</a>
		  <a class="collapse-item" href="#">Petugas</a>
		  <a class="collapse-item" href="#">Other</a>
		</div>
	  </div>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
	  Table
	</div>

	<!-- Nav Item - Tables -->
	<li class="nav-item @yield('activedl')">
	  <a class="nav-link" href="{{ url('admin/daftar_laporan')}}">
		<i class="fas fa-fw fa-table"></i>
		<span>Tanggapi Pengaduan</span></a>
	</li>
    <!-- Nav Item Table Ditanggapi -->
    <li class="nav-item @yield('activedt')">
        <a class="nav-link" href="{{ url('admin/daftar_laporan_ditanggapi')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Pengaduan Ditanggapi</span></a>
      </li>
	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
	  <button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

  </ul>
  <!-- End of Sidebar -->
