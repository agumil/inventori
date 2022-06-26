    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= "{$_SESSION['firstname']} {$_SESSION['lastname']}"; ?></a>
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
          <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="<?= site_url('user'); ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage Users
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-boxes"></i>
              <p>
                Goods
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('inventory'); ?>" class="nav-link">
                  <i class="fas fa-box-open nav-icon"></i>
                  <p>Inventory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('incominggood'); ?>" class="nav-link">
                  <i class="fas fa-truck nav-icon"></i>
                  <p>Incoming Goods</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('outgoinggood'); ?>" class="nav-link">
                  <i class="fas fa-truck-loading nav-icon"></i>
                  <p>Outgoing Goods</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Product's Base
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('brand'); ?>" class="nav-link">
                  <i class="fas fa-copyright nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('material'); ?>" class="nav-link">
                  <i class="fas fa-mortar-pestle nav-icon"></i>
                  <p>Materials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('color'); ?>" class="nav-link">
                  <i class="fas fa-palette nav-icon"></i>
                  <p>Colors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('measurement'); ?>" class="nav-link">
                  <i class="fas fa-ruler-combined nav-icon"></i>
                  <p>Measurements</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>