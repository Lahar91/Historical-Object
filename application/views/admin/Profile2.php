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

<?php
// pecah string 
$name = $this->session->userdata('nama_users');
$PecahStr = explode(" ", $name);
$awal = $PecahStr[0];

// hapus kalimat yang tidak di inginkan
$belakang = removePrevText($name, $awal);
// mengambil data user
$get = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

echo form_open_multipart('admin/Profile/edit') ?>
<div class="row justify-content-lg-center">
    <div class="col-lg-2">
        <div class="card card-primary">
            <div class=" card-header">
                <div class="card-tittle"></div>
            </div>
            <div class="card-body">

                <div class="text-center">
                    <img src="<?= base_url() ?>assets/image/user/<?= $get['img'] ?>" alt="" class="img-thumbnail d-block" id="gambar_load">

                </div>
                <div class="text-center mt-3">
                    <label class="custom-file-upload btn-outline-success ">
                        <input type="file" class="form-control" id="preview_gambar" name="img">
                        Upload
                    </label>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-tittle"></div>
            </div>

            <div class="card-body">


                <div class="col-lg-8">
                    <label class="mt-3"> Informasi Akun</label>

                    <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-6 col-form-label">Nama Depan</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Depan" name="nama_d" value="<?= $PecahStr[0] ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-6 col-form-label">Nama Belakang</label>
                                <div class="col-sm-6">

                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Nama Belakang" name="nama_b" value="<?= $belakang ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-6 col-form-label">Email</label>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control" id="inputPassword3" placeholder="Email" name="email" value="<?= $this->session->userdata('email') ?>" readonly>
                                </div>
                            </div>


                        </div>
                        <label class="mt-3"> Ganti Password</label>

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-6 col-form-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputEmail3" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-6 col-form-label">Password Baru</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password Baru" name="new_password">
                                </div>
                            </div>

                            <div class=" form-group row">
                                <label for="inputPassword3" class="col-sm-6 col-form-label">Confirmasi Password baru</label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Confirmasi Password baru" name="confrim_password">
                                </div>
                            </div>

                        </div>


                </div>

                <div class=" text-right ">
                    <button type="submit" class="btn  btn-outline-primary btn-lg">Simpan</button>
                </div>
            </div>

        </div>

    </div>
</div>
<?php echo form_close(); ?>


<script>
    function bacaGambar(input) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#gambar_load').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }

    $("#preview_gambar").change(function() {
        bacaGambar(this);
    });
</script>


<?php if ($this->session->flashdata('Ggagal')) : ?>
    <script>
        swal.fire({
            title: "Gagal",
            text: "Password baru yang anda masukan tidak sama",
            button: false,
            timer: 5000,
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('GagalPassword')) : ?>
    <script>
        swal.fire({
            title: "Gagal",
            text: "data Gagal di rubah",
            button: false,
            timer: 5000,
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('pesan')) : ?>
    <script>
        swal.fire({
            title: "Berhasil",
            text: "Data Berhasil di Ubah",
            button: false,
            timer: 5000,
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('Spassword')) : ?>
    <script>
        swal.fire({
            title: "Berhasil",
            text: "data Berhasil dirubah",
            button: false,
            timer: 5000,
        });
    </script>
<?php endif; ?>