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
                    <input type="text" class="form-control" id="inputEmail3" name="judul">
                </div>
            </div>

            <div class="ckconten">
                <textarea cols="100" rows="50" id="editor1" name="deskripsi"><?= $db_konten->deskripsi ?></textarea>

            </div>
            <div class="form-group col-md-2 mt-3">


                <label>Select</label>
                <select class="form-control" name="kategori">
                    <option selected="0" value="<?= $db_konten->id_kategori ?>"> <?= convidtostring($db_konten->id_kategori) ?></option>
                    <option>---PILIH KATEGORI ---</option>
                    <?php
                    foreach ($db_kategori as $key) :
                    ?>
                        <option value="<?php echo $key->id_kategori; ?>">
                            <?php echo $key->nama_kategori; ?>
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
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace('editor1', {
            height: 300,
            filebrowserUploadUrl: '<?= base_url('admin/konten/upload_image') ?>',
            filebrowserUploadMethod: "form",
        });
        // CKEDITOR.instances['editor1'].getData()
        CKEDITOR.instances['editor1'].getData()
    </script>

</div>