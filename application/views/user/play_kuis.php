<style>
    .buttons {
        padding: inherit;
        border-radius: inherit;
    }

    .buttons input {
        appearance: none;
        cursor: pointer;
        border-radius: 10px;
        border: 10px;
        padding: 5px 10px;
        background: transparent;
        color: black;
        font-size: 18px;
        font-family: sans-serif;
        transition: all 0.1s;
        width: 50%;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.4);
    }

    .buttons input:checked {
        background: #c926bb;
        color: whitesmoke;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
        text-shadow: 0 1px 0px #808080;
    }

    .buttons input::before {
        content: attr(label);
        text-align: center;
    }

    img {
        margin: 0;
    }
</style>

<div class="col-lg-12 mt-5">
    <div class="card card-primary mt-5">
        <div class="card-body">
            <?php if ($this->session->userdata('show')) { ?>
                <a href="<?= base_url('user/kuis') ?>" class="btn btn-outline-primary" id="kembali">Kembali</a>
                <script>
                </script>
            <?php } ?>

            <?php

            $query = $this->db->query("SELECT * FROM kuis  ORDER BY RAND() LIMIT 5 ");
            $no = 1;

            while ($row = $query->unbuffered_row('array')) :

            ?>
                <form id="form_jawab_<?= $no; ?>" method="POST" action="<?= base_url('user/kuis/hasil') ?>">

                    <input type="hidden" id="id" name="id_kuis" value="<?= $row["id_kuis"] ?>">
                    <input hidden id="id" name="form_jawab" value="form_jawab_<?= $no; ?>">


                    <div class="con-soal">
                        <div class="card  w-100">
                            <div class="card-header">
                                <div class="card-body">
                                    <div class="col-lg-12 pb-5 pt-5">

                                        <p> <?= $no; ?> . <?= $row["soal_kuis"] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="buttons mb-3">
                                    <input label="<?= $row["Pilihan_A"] ?>" type="radio" name="jawab" id="jawaban_<?= $no; ?>" value="<?= $row["Pilihan_A"] ?>">
                                </div>
                            </div>

                            <div class="col-lg-12  mb-3">

                                <div class="buttons">
                                    <input label="<?= $row["Pilihan_B"] ?>" type="radio" name="jawab" id="jawaban_<?= $no; ?>" value="<?= $row["Pilihan_B"] ?>">
                                </div>
                            </div>

                            <div class="col-lg-12  mb-3">

                                <div class="buttons">
                                    <input label="<?= $row["Pilihan_C"] ?>" type="radio" name="jawab" id="jawaban_<?= $no; ?>" value="<?= $row["Pilihan_C"] ?>">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12  offset-6 mt-2 mb-2">
                            <button id="btn_pilih_<?= $no; ?>" type="submit" class="btn btn-outline-primary">Pilih</button>
                        </div>
                    </div>
                </form>


                <script>
                    $("#form_jawab_<?= $no; ?>").submit(function() {

                        var next = '<?= $no + 1; ?>';
                        if (!$("#jawaban_<?= $no; ?>:checked").val()) {
                            swal({
                                title: "Hello.. !",
                                text: "Pilih dulu jawabannya bro..!!",
                                imageUrl: '<?= base_url() ?>assets/image/logo/warn.png'
                            });
                            return false;
                        } else {
                            $.ajax({
                                type: 'POST',
                                url: $(this).attr('action'),
                                data: $(this).serialize(),
                                success: function(data) {
                                    var myarr = data.split('/');
                                    if (myarr[0] == 'jawaban anda benar, anda dapat 20 point') {
                                        Swal.fire({
                                            title: "Benar !",
                                            text: 'jawaban anda benar, anda dapat 20 point',
                                            imageUrl: '<?= base_url() ?>assets/image/logo/up.png'
                                        });
                                    } else {
                                        Swal.fire({
                                            title: "Salah !",
                                            text: 'jawaban anda salah ',
                                            imageUrl: '<?= base_url() ?>assets/image/logo/down.png'
                                        });
                                    }
                                    $('#nilai').text(myarr[1]);
                                    $('#form_jawab_<?= $no; ?>').hide();
                                    $('#form_jawab_' + next).show();
                                }
                            });
                            return false;

                        };


                    });
                </script>


                <?php $no++; ?>


            <?php endwhile;


            for ($i = 2; $i <= 5; $i++) {  ?>
                <script>
                    $("#form_jawab_<?= $i; ?>").hide()
                </script>
            <?php } ?>







        </div>
    </div>
</div>