<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <meta http-equiv="Cache-Control" content="max-age=86400" />
    <title><?= isset($title) ? $title : 'Dashboard' ?> | <?= getConfig('app_name') ?></title>

    <link rel="icon" href="<?= base_url('assets/img/xyz.png') ?>" />
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/xyz.png') ?>" />

    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>" />
    <link rel="preload" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
    <noscript>
        <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" />
    </noscript>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>" />
    <link rel="preload" href="<?= base_url('assets/css/custom.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
    <noscript>
        <link rel="stylesheet" href="<?= base_url('assets/css/custom.css'); ?>" />
    </noscript>
    <link rel="stylesheet" href="<?= base_url('assets/vendor/select2/css/select2.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>" />
    <?php if (isset($css) && count((array) $css) > 0):
        foreach((array) $css as $c): ?>
            <link rel="stylesheet" href="<?= base_url('assets/' . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $c)) ?>" />
        <?php endforeach;
    endif; ?>
    <script type="text/javascript">
        const initURL = "<?= base_url('/') ?>";
        function formatNumber(num) {
            if (num >= 1_000_000_000) return (num / 1_000_000_000).toFixed(1).replace(/\.0$/, '') + 'b';
            if (num >= 1_000_000) return (num / 1_000_000).toFixed(1).replace(/\.0$/, '') + 'm';
            if (num >= 1_000) return (num / 1_000).toFixed(1).replace(/\.0$/, '') + 'k';
            return num;
        }
    </script>
    <style>
        .dropdown-item-card {
            background: #fff !important;
            color: #212529 !important;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">