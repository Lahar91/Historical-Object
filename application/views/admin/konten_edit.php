<style>
    input[type="file"] {
        display: none;
    }

    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }

    .card img {
        width: 1280px;
        min-width: auto;
        min-height: 200px;
        max-height: 280px;
        height: auto;
    }
</style>

<div class="col-lg-12">
    <div class="card card-primary">
        <div class="card-header">
            <title></title>
        </div>
        <div class="card-body">
            <?=
            form_open_multipart('admin/konten/saveedit/' . $db_konten->id_artikel);
            ?>
            <div class="form-group row text-center">
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" name="judul" value="<?= $db_konten->nama_artikel ?>">
                </div>
            </div>

            <div class="ckconten">
                <h4>Deskripsi</h4>

                <textarea cols="100" rows="50" id="editor1" name="deskripsi"><?= $db_konten->deskripsi ?></textarea>

            </div>

            <br>
            <br>
            <div class="row">

                <div class="col-lg-6">
                    <h4>Waktu di temukan</h4>

                    <textarea cols="500" rows="100" id="editor2" name="waktu"><?= $db_konten->waktu ?></textarea>


                </div>
                <div class="col-lg-6">
                    <h4>Kondisi saat kini</h4>

                    <textarea cols="500" rows="100" id="editor3" name="kondisi"><?= $db_konten->kondisi ?></textarea>


                </div>
            </div>

            <div class="form-group col-md-2 mt-3">


                <label>Kategori</label>
                <select class="form-control" name="kategori">
                    <option selected="selected" value="<?= $db_konten->id_kategori ?>"> <?= convidtostring($db_konten->id_kategori) ?></option>
                    <option>---PILIH KATEGORI ---</option>
                    <?php
                    foreach ($db_kategori as $key) :
                    ?>
                        <option value="<?= $key->id_kategori; ?>">
                            <?= $key->nama_kategori; ?>
                        </option>
                    <?php endforeach; ?>

                </select>


            </div>
            <div class="mt-3">
                <label class="custom-file-upload btn-outline-success ">
                    <input type="file" class="form-control" id="preview_gambar" name="img">
                    Upload
                </label>
                <small style="color: red;">Gambar thumbnail | Max Ukuran 500 kb| extension JPG, PNG, JPEG </small>

            </div>

            <div class=" text-right mt-3">
                <button type="submit" id="getDataBtn" class="btn  btn-outline-primary btn-lg">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>

    </div>


    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'), {

                toolbar: {
                    items: [
                        'heading', '|',
                        'fontfamily', 'fontsize', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'blockQuote', '|',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                },


                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',
                    // uploadUrl: 'base_url('admin/konten/upload_image2') ?>',
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor2'), {

                toolbar: {
                    items: [
                        'heading', '|',
                        'fontfamily', 'fontsize', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'blockQuote', '|',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                },


                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',
                    // uploadUrl: 'base_url('admin/konten/upload_image2') ?>',
                }
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#editor3'), {

                toolbar: {
                    items: [
                        'heading', '|',
                        'fontfamily', 'fontsize', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'blockQuote', '|',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                },


                ckfinder: {
                    // Upload the images to the server using the CKFinder QuickUpload command.
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&responseType=json',
                    // uploadUrl: 'base_url('admin/konten/upload_image2') ?>',
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</div>