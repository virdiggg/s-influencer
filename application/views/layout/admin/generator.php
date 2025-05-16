<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <meta http-equiv="Cache-Control" content="max-age=86400" />
    <title><?= isset($title) ? $title : 'Dashboard' ?> | <?= sess('app_name') ?></title>

</head>

<body>
    <div>
        <?php
            echo $html;
        ?>
    </div>

</body>

</html>