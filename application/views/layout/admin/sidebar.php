<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link text-sm">
        <img src="<?= base_url('assets/img/xyz.png') ?>" alt="<?= getSession('username') ?>" class="brand-image img-circle elevation-3" style="opacity: .8" />
        <span class="brand-text font-weight-light"><?= getSession('full_name') ?: getSession('username') ?: getConfig('app_name_min') ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= isMenuActive(base_url('admin/dashboard')) ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/requests') ?>" class="nav-link <?= isMenuActive(base_url('admin/requests')) ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Influencer Request</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/master/influencers') ?>" class="nav-link <?= isMenuActive(base_url('admin/master/influencers')) ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Master Influencer</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/signOut') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Sign Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>