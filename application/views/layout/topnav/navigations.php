<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?= base_url('/') ?>" class="navbar-brand">
            <span class="brand-text font-weight-light"><?= $this->config->item('app_name') ?></span>
        </a>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <?php if ($this->session->has_userdata('username')) : ?>
                <li class="nav-item">
                    <a href="<?= base_url('auth/signOut') ?>" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
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