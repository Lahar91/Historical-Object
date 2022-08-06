<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.11/jspdf.plugin.autotable.min.js"></script>

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
                <div class="ml-2">
                     <button class="btn btn-primary btn-sm" data-toggle="modal" onclick="generateTable()">Print PDF</button>
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
                                <a href="<?= base_url('admin/konten/edit/' . $key->artikel_slug) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="#" onclick="konfirmasi('<?= $key->id_artikel ?>')" class="btn btn-warning btn-sm"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <table class="table table-bordered text-center" id="kontenjs" hidden>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Kategori</th>

                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($db_konten as $key) {

                    ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $key->nama_artikel ?></td>
                            <td><?= convidtostring($key->id_kategori) ?></td>
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

<script>
    function generateTable() {
    var doc = new jsPDF('p', 'pt', 'a4');
    var y = 20;
    doc.setLineWidth(2);
    var width = doc.internal.pageSize.getWidth()
doc.text('Historical Object', width/2, y= y+20, { align: 'center' })
doc.text('Artikel', width/2, y= y+30, { align: 'center' })
    doc.autoTable({
        html: '#kontenjs',
        startY: 85,
        theme: 'grid',
        columnStyles: {
            0: {
                halign: 'right',
                tableWidth: 100,
                },
            1: {
                tableWidth: 100,
               },
            2: {
                halign: 'right',
                tableWidth: 100,
               },
            3: {
                halign: 'right',
                tableWidth: 100,
               }
        },
    })
    doc.save('Artikel.pdf');
}
</script>