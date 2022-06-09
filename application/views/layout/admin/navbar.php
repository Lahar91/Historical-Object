<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin/Dashboard') ?>" class="brand-link">
        <img src="<?= base_url() ?>assets/image/logo/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation" style="opacity: 0.9">
        <span class="brand-text font-weight-light">Historical Object</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="<?= base_url('admin/Dashboard') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'Dashboard') {
                                                                                        echo "active";
                                                                                    } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?= base_url('admin/Kategori') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'Kategori') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fa fa-clone"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/Konten') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'konten') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-newspaper" aria-hidden="true"></i>
                        <p>
                            Konten
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/Kuis') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'Kuis') {
                                                                                echo "active";
                                                                            } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Kuis
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/Profile') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'profile') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class=" nav-icon fa fa-user" aria-hidden="true"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/Laporan') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'Laporan') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/Feadback') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'Feadback') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>
                            Feadback
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('Auth/logout') ?>" class="nav-link" id="log_out">

                        <i class="nav-icon fas fa-sign"></i>
                        <p>
                            logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $tittle; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active"><?= $tittle ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->


    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">