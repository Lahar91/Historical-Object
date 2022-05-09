<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('admin/Dashboard') ?>" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- Sidebar user panel (optional) -->



            <div class="user-panel mt-3 mb-3 ml-auto d-flex ">
                <div class="image">
                    <?php $img_user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                    ?>
                    <img src="<?= base_url() ?>assets/image/user/<?= $img_user['img'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation" style="opacity: 0.5">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?= $this->session->userdata('nama_users'); ?></a>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->