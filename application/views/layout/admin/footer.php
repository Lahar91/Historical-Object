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
        <h5>Title</h5>
        <p>Sidebar content</p>
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

    <?php
    $ctahun = explode("-", date("d-m-Y"));

    ?>
    <strong>Copyright &copy; 2021 - <?= $ctahun[2]; ?> <a href=#">Historical Object</a>.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<script>
    $(document).ready(function() {
        $('#log_out').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Yakin ingin Logout?',
                imageWidth: 150,
                imageAlt: 'Custom image',
                showCancelButton: true,
                cancelButtonColor: '#d33',
                confirmButtonColor: 'rgb(28, 173, 28)',
                confirmButtonText: 'Keluar',
                cancelButtonText: 'Batal',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger mr-3',
                reverseButtons: true,
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    document.location.href = href;
                }
            })
        })
    })
</script>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
</body>

</html>