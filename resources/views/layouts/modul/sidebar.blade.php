<aside class="main-sidebar sidebar-dark-primary elevation-4">
  {{-- Brand Logo --}}

  <a href="index3.html" class="brand-link">
    <img src="{{ asset('img/AdminLTELogo.png') }}" alt="POS" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Penjualan</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Penjualan.id</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="navbar-toggler-icon fa fa-dashboard">
              <p>Dasbor</p>
            </i>
          </a>
        </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-server"></i>
          <p>
            Manajemen Produk
            <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('kategori.index') }}" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Kategori</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('produk.index') }}" class="nav-link">
              <i class="fa fa-circle-o nav-icon"></i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('role.index') }}" class="nav-link">
              <i class="fa fa-gears"></i>
              <p>Role</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
              <i class="fa fa-users"></i>
              <p>Pengguna</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('user.role_permission') }}" class="nav-link">
              <i class="fa fa-warning"></i>
              <p>Role Permission</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item has-treeview">
       <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
          <i class="nav-icon fa fa-sign-out"></i>
          <p>
            {{ __('Logout') }}
          </p>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            
        </form>
      </li>
      </ul>
    </nav>
  </div>
</aside>