</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5><?=
            $this->session->userdata('nama_users');
            ?></h5>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                <li class="nav-item ">
                    <a href="<?= base_url('user/profile') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'profile') {
                                                                                    echo "active";
                                                                                } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="<?= base_url('Auth/logout') ?>" class="nav-link" id="log_out">

                        <i class="nav-icon fas fa-sign"></i>
                        <p class="">
                            logout
                        </p>
                    </a>
                </li>




            </ul>
        </nav>

    </div>
</aside>
<!-- /.control-sidebar -->



<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->



</body>

</html>