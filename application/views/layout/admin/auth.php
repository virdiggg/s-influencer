<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex,nofollow" />
    <meta http-equiv="Cache-Control" content="max-age=86400" />
    <title><?= isset($title) ? $title : 'Login Page' ?> | <?= getConfig('app_name') ?></title>

    <link rel="icon" href="<?= base_url('assets/img/xyz.png') ?>" />
    <link rel="apple-touch-icon" href="<?= base_url('assets/img/xyz.png') ?>" />

    <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>" />
    <link rel="preload" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
    <noscript>
        <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" />
    </noscript>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="<?= base_url('admin/dashboard') ?>">
                    <img src="<?= base_url('assets/img/xyz.png') ?>" alt="xyz" class="img-fluid" />
                </a>
            </div>
            <div class="card-body">
                <?php if ($this->authenticated->isAuthenticated() === false) : ?>
                    <p class="login-box-msg">Sign in to start your session</p>
                    <p class="login-box-msg" id="message">&nbsp;</p>

                    <form method="POST" id="form-authentication">
                        <div class="input-group input-group-sm mb-3">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required />
                            <span class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </span>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="btn btn-success btn-block" id="btn-submit">Sign In</button>
                        </div>
                    </form>
                <?php else : ?>
                    <label>Go to</label> <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-block btn-outline-success">Dashboard</a>
                <?php endif; ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="row mt-3">
        <div class="col-12 text-center"></div>
        </div>
    </div>
    <!-- /.login-box -->

    <script type="text/javascript" src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>" integrity="sha384-DBJq/Y18IQJ1riVfkhcolvypPCF0HRFb9iPENNqi7hGVqU1UnHI1Rg7BoDq0rsGz"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>" async integrity="sha384-wPHSRWD7CzenRbkOw0nXYdiy6NVou2K3PabAcM2hjpUmTFJZ4h7x9Y5mMg7h4tEx"></script>
    <script type="text/javascript" src="<?= base_url('assets/dist/js/adminlte.min.js') ?>" async integrity="sha384-NP0RCTs/5tFIz7e6+PL2ZW3XrgIauqi4AgwPRyL/P3dNhV5dqGclf3xbeuFYsCND"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#form-authentication').submit(function(e) {
                e.preventDefault();

                let username = $('#username').val();
                let password = $('#password').val();
                let postData = new FormData(this);
                postData.append('username', username);
                postData.append('password', password);

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('auth/sign-in') ?>",
                    data: postData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "JSON",
                    beforeSend: function() {
                        $('#btn-submit').html('<i id="spinn" class="fa fa-spinner fa-spin fa-fw"></i><span class="sr-only"> LOADING...</span>')
                        $('#btn-submit').attr('disabled', '');
                        $('.form-control').attr('disabled', '');
                        $('#message').html('&nbsp;');
                    },
                    success: function(response) {
                        if (response.status === false) {
                            $('#btn-submit').html('Sign In');
                        }

                        $('#message').html(`<label class="text-success">Redirecting...</label>`);

                        setTimeout(function() {
                            window.location.href = response.url;
                            $('#btn-submit').removeAttr('disabled');
                            $('.form-control').removeAttr('disabled');
                        }, 1000);
                    },
                    error: function(response) {
                        $('#btn-submit').removeAttr('disabled');
                        $('.form-control').removeAttr('disabled');
                        $('#btn-submit').html('Sign In');
                        $('#password').val('');

                        let data = JSON.parse(response.responseText);
                        $('#message').html(`<label class="text-danger">${data.message}</label>`);
                    }
                });
            });
        });
    </script>
</body>

</html>