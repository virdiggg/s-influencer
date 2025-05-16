<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link text-sm">
        <img src="<?= base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="<?= sess('username') ?>" class="brand-image img-circle elevation-3" style="opacity: .8" />
        <span class="brand-text font-weight-light"><?= sess('full_name') ?: sess('username') ?: sess('app_name_min') ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <?php foreach($navs as $nav): ?>
                    <?php if ($this->authenticated->can($nav['permission'])): ?>
                        <li class="nav-item <?= isset($nav['childrens']) ? (isActive(base_url($nav['endpoint'])) !== false ? 'menu-is-opening menu-open' : '') : '' ?>">
                            <a href="<?= isset($nav['childrens']) ? '#' : base_url($nav['endpoint']) ?>" class="nav-link <?= isMenuActive(base_url($nav['endpoint'])) ?>">
                                <i class="nav-icon <?= $nav['icon'] ?>"></i>
                                <p><?= $nav['name'] ?> <?= isset($nav['childrens']) ? '<i class="right fas fa-angle-left"></i>' : '' ?></p>
                            </a>
                            <?php if (isset($nav['childrens'])): ?>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($nav['childrens'] as $child): ?>
                                        <?php if ($this->authenticated->can($child['permission'])): ?>
                                            <li class="nav-item">
                                                <a href="<?= base_url($child['endpoint']) ?>" class="nav-link <?= isMenuActive(base_url($child['endpoint'])) ?>">
                                                    <i class="nav-icon <?= $child['icon'] ?>"></i>
                                                    <p><?= $child['name'] ?></p>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
                <li class="nav-item">
                    <a href="<?= base_url('auth/password/change') ?>" class="nav-link <?= isMenuActive(base_url('auth/password/change')) ?>">
                        <i class="nav-icon fas fas fa-lock"></i>
                        <p>Ubah Password</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/sign-out') ?>" class="nav-link">
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