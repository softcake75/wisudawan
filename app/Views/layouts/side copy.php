<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <!-- <a href="#" class="d-block">Alexander Pierce</a> -->
        
          <a href="#" class="d-block"><?= session()->get('nama') . ' - Role: ' . session()->get('role') ?></a>
        
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <?php if (session()->get('role') == '1'): ?>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/boking') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Booking</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/payment') ?>" class="nav-link">
            <i class="nav-icon far fa-credit-card"></i>
            <p>
              Payment
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/boking') ?>" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Data Booking
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('admin/user') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              User
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-award"></i>
            <p>
              Master Lapangan
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('admin/kategori') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Lapangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('admin/lapangan') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lapangan</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Lainnya</li>
        <li class="nav-item">
          <a href="<?= base_url('admin/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-ellipsis-h"></i>
            <p>Logout</p>
          </a>
        </li>
        <?php endif; ?>
        

        <?php if (session()->get('role') == '2'): ?>
        <li class="nav-item">
          <a href="<?= base_url('user/boking') ?>" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Data Booking
            </p>
          </a>
        </li>
        
        <!-- <li class="nav-item">
          <a href="<?= base_url('user/bayar') ?>" class="nav-link">
            <i class="nav-icon far fa-credit-card"></i>
            <p>
              Konfirmasi Pembayaran
            </p>
          </a>
        </li> -->

        <li class="nav-item">
          <a href="<?= base_url('user/user') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              User
              <!-- <span class="right badge badge-danger">New</span> -->
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
        <?php endif; ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>