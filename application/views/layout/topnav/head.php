<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
<link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>" />
<link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>" />
<link rel="stylesheet" href="<?= base_url('assets/vendor/icheck-bootstrap/icheck-bootstrap.min.css') ?>" />
<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-slider/css/bootstrap-slider.min.css') ?>" />
<link rel="stylesheet" href="<?= base_url('assets/vendor/select2/css/select2.min.css') ?>" />
<link rel="stylesheet" href="<?= base_url('assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>" />
<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>" />

<link rel="preload" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<noscript>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" />
</noscript>

<link rel="preload" href="<?= base_url('assets/vendor/sweetalert2/sweetalert2.min.css') ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
<noscript>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/sweetalert2/sweetalert2.min.css') ?>" />
</noscript>

<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/adminlte.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/custom.js') ?>" async></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/select2/js/select2.full.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap-slider/bootstrap-slider.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js') ?>" async></script>

<script type="text/javascript">
    const initURL = "<?= base_url('/') ?>";
    const isLoggedIn = <?= $this->session->userdata('username') ? 'true' : 'false' ?>;
    function formatNumber(num) {
        if (num >= 1_000_000_000) return (num / 1_000_000_000).toFixed(1).replace(/\.0$/, '') + 'b';
        if (num >= 1_000_000) return (num / 1_000_000).toFixed(1).replace(/\.0$/, '') + 'm';
        if (num >= 1_000) return (num / 1_000).toFixed(1).replace(/\.0$/, '') + 'k';
        return num;
    }
</script>