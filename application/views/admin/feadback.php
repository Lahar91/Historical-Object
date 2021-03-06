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
                        <th class="w-25">No Tiket</th>
                        <th>Status</th>
                        <th class="w-25">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($db_feadback as $key => $value) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value["id_feadback"] ?></td>
                            <td>
                                <?php if ($value["status"] == "New") { ?>
                                    <i class="fa-solid fa-envelope fa-lg"></i>
                                <?php } else if ($value["status"] == "Terima") { ?>
                                    <i class="fa-solid fa-envelope-circle-check fa-lg"></i>
                                <?php } else if ($value["status"] == "Tolak") { ?>
                                    <i class="fa-light fa-envelope-open fa-lg"></i>
                                <?php } ?>
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#view<?= $value["id_feadback"] ?>"><i class="fa fa-edit"></i></button>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

    <?php
    foreach ($db_feadback as $key => $value) {
        echo form_open_multipart('admin/Feadback/respon_feadback/' . $value["id_feadback"])
    ?>

        <div class="modal fade" id="view<?= $value["id_feadback"] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Feadback</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nomor Tiket <?= $value["id_feadback"] ?></label>
                            <input type="text" class="form-control" value="<?= $value["id_feadback"] ?>" name="id_feadback" hidden>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama <?= $value["username"] ?></label>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Keterangan</label>
                            <textarea class="form-control" id="ketarangan" rows="3"><?= $value["isi_feadback"] ?></textarea>
                            <input type="text" class="form-control" name="isi_feadback" rows="3" value="<?= $value["isi_feadback"] ?>" hidden>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <?php if ($value["status"] != "New") { ?>
                            <button type="button" class="btn btn-secondary ml-auto" data-dismiss="modal">Close</button>

                        <?php } else { ?>
                            <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button>
                            <input type="submit" name="status" class="btn btn-danger" value="Tolak">
                            <input type="submit" name="status" class="btn btn-primary" value="Terima">
                        <?php } ?>
                    </div>
                    <?php echo form_close() ?>


                </div>
            </div>
        </div>
    <?php } ?>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#ketarangan'), {

            toolbar: [''],


            ckfinder: {
                // Upload the images to the server using the CKFinder QuickUpload command.
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',
                // uploadUrl: 'base_url('admin/konten/upload_image2') ?>',
            }
        }).then(editor => {
            console.log(editor);
            editor.enableReadOnlyMode('#ketarangan');

        })
        .catch(error => {
            console.error(error);
        });

    function show() {
        document.getElementById('area1').style.display = 'block';
    }


    function hide() {
        document.getElementById('area1').style.display = 'none';
    }
</script>