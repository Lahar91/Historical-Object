<div class="col-lg-12 ">

    <?php if ($this->session->userdata('lebarlayar') > '860') { ?>
        <div class="card card-primary card-outline mt-3">
            <div class="card-body mx-auto">
                <div>
                    <h3 class="text-center mb-5"><?= $tittle ?></h3>
                </div>

                <div class="row ml-5">
                    <?php foreach ($cari as $key) {
                    ?>
                        <div class="card-deck mx-auto mb-4">
                            <a href="<?= base_url('user/view/' . $key->artikel_slug) ?>" class="card " style="width: 18rem;">
                                <img class="card-img-top text-center" src="<?= base_url('assets/image/konten_img/') . $key->img_artikel ?>" style="min-width: 200px; max-height: 150px; min-height: 150px;" alt="Card image cap">
                                <div class="card-body ">
                                    <p class="card-text text-center ">
                                        <?= $key->nama_artikel ?>
                                    </p>
                                </div>
                            </a>

                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    <?php } else { ?>

        <div class="card card-primary card-outline mt-3">
            <div class="card-body mx-auto">
                <div>
                    <h3 class="text-center mb-5"><?= $tittle ?></h3>
                </div>

                <div class="row">
                    <?php foreach ($cari as $key) {
                    ?>
                        <div class="card-deck mx-auto mb-4">
                            <a href="<?= base_url('user/view/' . $key->artikel_slug) ?>" class="card " style="width: 8rem;">
                                <img class="card-img-top text-center" src="<?= base_url('assets/image/konten_img/') . $key->img_artikel ?>" style="min-width: 80%; max-height: 80px; min-height: 70%;" alt="Card image cap">
                                <div class="card-body ">
                                    <p class="card-text text-center ">
                                        <?= $key->nama_artikel ?>
                                    </p>
                                </div>
                            </a>

                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>