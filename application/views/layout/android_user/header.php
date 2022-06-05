<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white sticky-top">
            <div class="container ">

                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand mx-auto">
                    <!-- SEARCH FORM -->
                    <?= form_open_multipart('user/konten/cari') ?>

                    <div class="input-group input-group-md">
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

                </ul>

            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper mt-1">


            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">