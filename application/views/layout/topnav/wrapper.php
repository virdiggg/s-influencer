<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <meta http-equiv="Cache-Control" content="max-age=86400" />
    <meta http-equiv="Cache-Control" content="max-age=86400" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="<?= base_url('assets/img/xyz.png') ?>" />
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/xyz.png') ?>" />
    <title><?= $this->config->item('app_name') ?></title>

    <?php require_once(LAYOUT_PATH . 'topnav' . DIRECTORY_SEPARATOR . 'head.php'); ?>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php require_once(LAYOUT_PATH . 'topnav' . DIRECTORY_SEPARATOR . 'header-nav.php'); ?>

        <div class="content-wrapper">
            <?php if (isset($view)): $this->load->view($view); endif; ?>
        </div>
        <div id="simple-toast" class="simple-toast hidden"></div>

        <?php require_once(LAYOUT_PATH . 'topnav' . DIRECTORY_SEPARATOR . 'footer.php'); ?>
        <button id="installButton" style="display: none;">Install App</button>
    </div>

    <?php if (isset($js) && count($js) > 0) :
        foreach ((array) $js as $j) :
            require_once(SCRIPT_PATH . str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $j));
        endforeach;
    endif; ?>
</body>

</html>