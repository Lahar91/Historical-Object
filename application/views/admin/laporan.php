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
                     <button class="btn btn-primary btn-sm" data-toggle="modal" onclick="generateTable()">Print PDF</button>
                 </div>

            </div>

            <table class="table table-bordered text-center" id="konten">
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="w-25">Judul artikel</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th class="w-25">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($db_laporan as $key => $value) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= idconverttittle($value->id_artikel) ?></td>
                            <td><?= $value->keterangan ?></td>
                            <td><?= $value->status ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#view<?= $value->id_report ?>"><i class="fa fa-edit"></i></button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            
            <table class="table table-bordered text-center" id="kontenjs" hidden>
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="w-25">Judul artikel</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($db_laporan as $key => $value) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= idconverttittle($value->id_artikel) ?></td>
                            <td><?= $value->keterangan ?></td>
                            <td><?= $value->status ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

    <?php
    foreach ($db_laporan as $key => $value) {
        echo form_open_multipart('admin/Laporan/edit/' . $value->id_report)
    ?>

        <div class="modal fade" id="view<?= $value->id_report ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">nama artikel</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= idconverttittle($value->id_artikel) ?>" disabled>
                            <input type="text" class="form-control" id="id_artikel" value="<?= $value->id_artikel ?>" name="id_artikel" hidden>
                            <input type="text" name="id_artikel" value="<?= $value->id_artikel?>" hidden>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Keterangan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value="<?= $value->keterangan ?>" disabled><?= $value->keterangan ?></textarea>
                            <input type="text" class="form-control" id="ketarangan" name="ketarangan" rows="3" value="<?= $value->keterangan ?>" hidden>

                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="custom-select" name="cek">
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <?php echo form_close() ?>


                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    function generateTable() {
    var doc = new jsPDF('p', 'pt', 'a4');
    var y = 20;
    doc.setLineWidth(2);
    var width = doc.internal.pageSize.getWidth()
doc.text('Historical Object', width/2, y= y+20, { align: 'center' })
doc.text('Laporan', width/2, y= y+30, { align: 'center' })
    doc.autoTable({
        html: '#kontenjs',
        startY: 85,
        theme: 'grid',
    })
    doc.save('laporan.pdf');
}
</script>