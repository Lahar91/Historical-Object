<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <div class="card-tittle"></div>
        </div>

        <div class="card-body">
            <div class="row mb-3">


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
                            <input type="text" class="form-control" id="id_artikel" value="<?= $value->id_artikel ?>" name="jenis" hidden>

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