<style>
    .ck-editor__editable_inline {
        min-height: 300px;

    }
</style>
<div class="col-lg-12">
    <div class="col-lg-12 bg-primary">
        <h3 class="text-center">Feadback</h3>
    </div>
    <div class="row mt-5">
        <div class="col-lg-3">
            <div class="card card-primary">
                <div class="card-body">
                    <h4 class="text-justify">
                        Menu ini di gunakan sebagai sarana user jika memiliki saran terhadap aplikasi Historical Object yang nantinya akan berpengaruh terhadap fitur - fitur terbaru. silahkan mengisi kolom berikut
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <?php echo form_open_multipart("user/feadback/insert_feadback") ?>
            <div class="card card-primary">
                <div class="card-body">
                    <textarea name="isi_feadback" id="isi" cols="80" rows="100" class="ck-blurred ck-editor__editable ck-rounded-corners ck-editor__editable_inline"></textarea>
                </div>
                <button class="btn btn-primary mx-4 my-2" type="submit">Kirim</button>

            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#isi'), {

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