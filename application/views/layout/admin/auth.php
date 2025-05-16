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

    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>" />
    <link rel="preload" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'" />
    <noscript>
        <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" />
    </noscript>
    <script type="text/javascript" src="<?= base_url('assets/js/jquery-3.7.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/adminlte.min.js') ?>"></script>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-success">
            <div class="card-header text-center">
                <a href="<?= base_url('admin') ?>">
                    <img src="<?= base_url('assets/img/xyz.png') ?>" alt="xyz" class="img-fluid" />
                </a>
            </div>
            <div class="card-body">
                <?php if ($this->authenticated->isAuthenticated() === false) : ?>
                    <p class="login-box-msg">Sign in to start your session</p>
                    <p class="login-box-msg" id="message">&nbsp;</p>

                    <form method="POST" id="form-auth">
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
                            <button type="submit" class="btn btn-success btn-block" id="btn-auth">Sign In</button>
                        </div>
                    </form>
                <?php else : ?>
                    <label>Go to</label> <a href="<?= base_url('admin') ?>" class="btn btn-block btn-outline-success">Dashboard</a>
                <?php endif; ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <div class="row mt-3">
        <div class="col-12 text-center"></div>
    </div>
    <!-- /.login-box -->

    <script type="text/javascript">
        const initURL = "<?= base_url('/') ?>";
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('form-auth').addEventListener('submit', function(e) {
                e.preventDefault();

                let btn = document.getElementById('btn-auth');
                let message = document.getElementById('message');
                message.innerHTML = '';
                btn.disabled = true;

                fetch(initURL + 'auth/signIn', {
                        method: 'POST',
                        body: new FormData(this)
                    })
                    .then(response => response.json())
                    .then(response => {
                        if (response.status === false) {
                            message.innerHTML = `<label class="text-danger">${response.message}</label>`;
                        } else {
                            message.innerHTML = `<label class="text-success">Redirecting...</label>`;
                            setTimeout(function() {
                                window.location.replace(initURL + 'admin');
                            }, 1000);
                        }
                    })
                    .catch(error => {
                        // console.error('Error:', error);
                    })
                    .finally(() => {
                        btn.disabled = false;
                    });
            });
        });
    </script>
</body>

</html>