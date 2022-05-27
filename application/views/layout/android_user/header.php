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

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->


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
                    </ul>
                </div>



                <!-- Right navbar links -->

            </div>
        </nav>

        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mt-5">


            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">