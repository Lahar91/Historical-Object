<div class="col-lg-12 mt-5">
    <div class="card card-primary mt-5">
        <div class="card-header">
        </div>
        <div class=" text-center">

        </div>

        <div class="text-center">
            <h4 class="tittle-c mt-2"><?= $db_konten->nama_artikel ?></h4>

            <textarea name="" id="editor1" style="border:none;">
            <?= $db_konten->deskripsi ?>
            </textarea>
        </div>
        <div class="card-body">

            <div class="float-right">
                <a type="button" c class="btn btn-outline-danger" data-toggle="modal" data-target="#report<?= $db_konten->id_artikel ?>" alt="Lapor">
                    <i class="fas fa-exclamation-triangle">
                    </i> Report</a>
            </div>
        </div>


    </div>
    <!-- model report-->
    <div class="modal fade" id="report<?= $db_konten->id_artikel ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Report Artikel <?= $db_konten->nama_artikel ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open('user/konten/report/' . $db_konten->id_artikel); ?>



                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1" id="radio1" value="gambar atau ilustrasi tidak sesuai" onclick="hide()">
                            <label class="form-check-label">gambar atau ilustrasi tidak sesuai</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1" id="radio1" value="sejarah yg dicantumkan kurang akurat" onclick="hide()">
                            <label class="form-check-label">sejarah yg dicantumkan kurang akurat</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1" value="Lain-Lain" id="radio2" value="lain" onclick="show()">
                            <label class=" form-check-label">Lain - Lain</label>
                        </div>

                        <div class="form-group">
                            <textarea id="area1" name="area1" class="form-control" rows="3" placeholder="Enter ..." style="display: none;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Report</button>
                </div>
            </div>
            <?php echo form_close(); ?>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'), {

                toolbar: [''],


                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',
                    // uploadUrl: 'base_url('admin/konten/upload_image2') ?>',
                }
            }).then(editor => {
                console.log(editor);
                editor.enableReadOnlyMode('#editor1');

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

</div>