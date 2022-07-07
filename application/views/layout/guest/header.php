<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar sticky-top navbar-expand-md navbar-light navbar-white ">
            <div class="container">
                <a href="<?= base_url() ?>" class="navbar-brand">
                    <img src="<?= base_url() ?>assets/image/logo/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.9">
                    <span class="brand-text font-weight-light">Historical Object</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <?php foreach ($db_kategori as $key => $value) { ?>
                                    <li><a href="<?= base_url('guest/kategori/' . $value->k_slug) ?>" class="dropdown-item"><?= $value->nama_kategori; ?></a></li>
                                    <li class="dropdown-divider"></li>
                                <?php } ?>
                            </ul>
                        </li>

                    </ul>

                    <!-- Right navbar links -->
                    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                        <!-- SEARCH FORM -->
                        <?= form_open_multipart('guest/cari') ?>

                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search" name="keyboard">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>

                            </div>

                        </div>
                        <?=
                        form_close();
                        ?>
                        <!-- END SEARCH FORM -->



                        <!-- button login -->
                        <a href="<?= base_url('Auth') ?>" class="btn btn-outline-success pl-3 pr-3 ml-3">Login</a>

                        <!-- button login -->


                    </ul>
                </div>


            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">