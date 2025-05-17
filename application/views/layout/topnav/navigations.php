<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?= base_url('/') ?>" class="navbar-brand">
            <img src="<?= base_url('assets/img/xyz.png') ?>" alt="xyz" class="brand-image" />
            <!-- <img src="<?= base_url('assets/img/xyz.png') ?>" alt="xyz" class="brand-image img-circle elevation-3" style="opacity: .8" /> -->
        </a>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <?php if ($this->session->has_userdata('username')) : ?>
                <li class="nav-item">
                    <a href="<?= base_url('auth/signOut') ?>" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
                <?php if (getSession('role') !== 'USER') : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('admin') ?>" class="nav-link">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                <?php endif; ?>
            <?php else: ?>
                <li class="nav-item">
                    <a href="#" class="navbar-brand authorized-only">
                        <span class="brand-text font-weight-light">Login</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>