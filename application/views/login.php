<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Historical Object | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/image/logo/Logo.png" type="image/x-icon">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- sweetalert -->
    <script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<body class="hold-transition login-page">
    <?php
    if (!isset($_SESSION['lebarlayar'])) {
        echo "<script language=\"JavaScript\">document.location=\"?r=1&width=\"+screen.width+\"&Height=\"+screen.height;</script>";
        // $tampilan['lebarlayar'] = echo "<script>screen.width</scprit>";
        // $tampilan['tinggilayar'] = echo "<script>screen.height</scprit>";
        // $this->session->set_userdata($tampilan);
        if (isset($_GET['width']) && isset($_GET['Height'])) {
            $tampilan['lebarlayar'] = $_GET['width'];
            $tampilan['tinggilayar'] = $_GET['Height'];

            $this->session->set_userdata($tampilan);
            $_SESSION['lebarlayar'] = $_GET['width'];
            $_SESSION['tinggilayar'] = $_GET['Height'];
        }
    } ?>
    <div class="login-box">
        <div class="login-logo" style="margin-top: -150px;">
            <div>
                <img src="<?= base_url() ?>assets/image/logo/Logo.png" alt="AdminLTE Logo" width="220" style="opacity: .8">
            </div>
            <a href="<?= base_url() ?>index2.html"><b>Historical</b> Object</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Login</p>
                <?php echo form_open('auth/login') ?>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <!-- /.col -->

                <div class="text-right mt-3">
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
                <!-- /.col -->
                <?php echo form_close() ?>

                <p class="mb-0 mt-3 text-center">
                    <a href="<?= base_url() ?>register" class="text-center">Register</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

</body>
<?php if ($this->session->flashdata('errorlogin')) : ?>
    <script>
        Swal.fire(
            'Pemberitahuan!',
            'Username atau password salah!',
            'info'
        )
    </script>
<?php endif; ?>
<?php $this->session->unset_userdata('errorlogin');; ?>

<?php if ($this->session->flashdata('ilegal_login')) : ?>
    <script>
        Swal.fire(
            'Pemberitahuan!',
            'admin tidak bisa login di dalam applikasi android',
            'info'
        )
    </script>
<?php endif; ?>
<?php $this->session->unset_userdata('ilegal_login'); ?>

</html>