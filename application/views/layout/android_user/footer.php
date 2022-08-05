</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- Main Footer -->
<?php 
if(!empty($this->session->userdata('k_android'))) { ?>

<?php } else{ ?>
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>
<?php }?>
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->

<!-- /.control-sidebar -->



<!-- REQUIRED SCRIPTS -->

<!-- ckeditor -->
<script src="<?= base_url() ?>assets/plugins/ckeditor5/ckeditor.js"></script>
<script src="<?= base_url() ?>assets/plugins/ckfinder/ckfinder.js"></script>


<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- sweetalert -->
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>


</body>

</html>