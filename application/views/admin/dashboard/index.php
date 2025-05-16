<div class="card">
    <div class="card-header">
        <h3 class="card-title" id="show-logs-title"><?= isset($subtitle) ? $subtitle : 'Dashboard' ?></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-8 d-none d-md-block">
                <img src="<?= base_url('assets/img/xyz.png') ?>" alt="<?= getSession('username') ?>" class="img-fluid" />
            </div>
            <div class="col-12 col-md-4"></div>
        </div>
    </div>
</div>