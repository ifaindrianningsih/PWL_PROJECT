<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('template')}}/index.html" class="brand-link">
      <img src="{{asset('template')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-SPP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ url('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item "> 
            <a href="#" class="nav-link "> 
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Kelola Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('siswa')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('kelas.index')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('walmur')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Wali Murid</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('tagihan')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tagihan</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Data Transaksional -->
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Transaksional
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('spp')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembayaran SPP</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('tabungan')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tabungan Siswa</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Cetak PDF -->
          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Pelaporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('cetak-spp')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Kwitansi SPP</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('cetak-tab')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cetak Nota Tabungan</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('laporan-spp')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Pembayaran SPP</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Setting -->
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="{{ url('pengguna')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          
          <!-- Logout -->
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <i class="far fa-circle nav-icon"></i>
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>