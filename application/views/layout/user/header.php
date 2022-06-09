<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white sticky-top">
            <div class="container">
                <?php $img_user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); ?>

                <a href="<?= base_url('user/home') ?>" class="navbar-brand">
                    <img src="<?= base_url() ?>assets/image/logo/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.9">
                    <span class="brand-text font-weight-light">Historical Object</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php if ($this->session->userdata('lebarlayar') > '860' && $this->session->userdata('lebarlayar') != null) { ?>

                    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= base_url('user/home') ?>" class="nav-link">Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                    <?php foreach ($db_kategori as $key => $value) { ?>
                                        <li><a href="<?= base_url('user/kategori/' . $value->k_slug) ?>" class="dropdown-item"><?= $value->nama_kategori; ?></a></li>
                                        <li class="dropdown-divider"></li>

                                    <?php } ?>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('user/kuis') ?>" class="nav-link">Kuis</a>
                            </li>
                        </ul>

                        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                            <!-- SEARCH FORM -->
                            <?= form_open_multipart('user/konten/cari') ?>

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

                            <!-- button register-->

                            <a href="" data-widget="control-sidebar" data-slide="true" href="#" role="button" class="ml-3">
                                <img src="<?= base_url() ?>assets/image/user/<?= $img_user['img']; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.9; width:35px;">

                                <span class="brand-text font-weight-light"><?=
                                                                            $this->session->userdata('nama_users');
                                                                            ?></span></a>
                            </a>


                        </ul>
                    </div>
                <?php } else { ?>

                    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= base_url('user/home') ?>" class="nav-link">Home</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Kategori</a>
                                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                    <?php foreach ($db_kategori as $key => $value) { ?>
                                        <li><a href="<?= base_url('user/kategori/' . $value->k_slug) ?>" class="dropdown-item"><?= $value->nama_kategori; ?></a></li>
                                        <li class="dropdown-divider"></li>

                                    <?php } ?>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('user/kuis') ?>" class="nav-link">Kuis</a>
                            </li>

                            <li class="nav-item ">
                                <a href="<?= base_url('user/profile') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'profile') {
                                                                                                echo "active";
                                                                                            } ?>">
                                    Profile
                                </a>
                            </li>



                            <li class="nav-item">
                                <a href="<?= base_url('Auth/logout') ?>" class="nav-link" id="log_out">

                                    logout
                                </a>
                            </li>
                        </ul>

                        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                            <!-- SEARCH FORM -->
                            <?= form_open_multipart('user/konten/cari') ?>

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

                            <!-- button register-->

                            <a href="" data-widget="control-sidebar" data-slide="true" href="#" role="button" class="ml-3">
                                <img src="<?= base_url() ?>assets/image/user/<?= $img_user['img']; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.9; width:35px;">

                                <span class="brand-text font-weight-light"><?=
                                                                            $this->session->userdata('nama_users');
                                                                            ?></span></a>
                            </a>


                        </ul>
                    </div>
                <?php } ?>


                <!-- Right navbar links -->

            </div>
        </nav>

        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">