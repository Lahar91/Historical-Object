<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-tittle"></div>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="ml-2">
                    <a href="<?= base_url('admin/konten/add') ?>" class="btn btn-primary btn-sm">Tambah</a>
                </div>


            </div>

            <table class="table table-bordered text-center" id="konten">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="w-25">Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>

                        <th class="w-25">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($db_konten as $key) {

                    ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><img src="<?= base_url('assets/image/konten_img/') . $key->img_artikel ?>" width="100px"></td>
                            <td><?= $key->nama_artikel ?></td>
                            <td><?= convidtostring($key->id_kategori) ?></td>


                            <td>
                                <a href="<?= base_url('admin/konten/edit/' . $key->id_artikel) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="#" onclick="konfirmasi('<?= $key->id_artikel ?>')" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

<script>
    function konfirmasi(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                Swal.fire({
                    title: 'Terhapus!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    showConfirmButton: false
                });
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/konten/delete') ?>", //url function delete in controller
                    data: {
                        id: id //id get from button delete
                    },
                    success: function(data) { //when success will reload page after 3 second
                        window.setTimeout(function() {
                            location.reload();
                        }, 1500);
                    }
                });
            }
        })
    }
</script>