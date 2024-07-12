<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= session()->get('nama') . ' - Role: ' . session()->get('role') ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        
        <li class="nav-item">
          <a href="<?= base_url('user') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('prodi') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Program Studi
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('kategori') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Kategori Wisudawan
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('slider') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Slider
            </p>
          </a>
        </li>

        <li class="nav-header">Lainnya</li>
        <li class="nav-item">
          <a href="<?= base_url('user/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-ellipsis-h"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
