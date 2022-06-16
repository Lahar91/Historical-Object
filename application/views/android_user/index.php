<div class="col-lg-12">

    <div class="card card-primary card-outline">
        <div class="card-body mx-auto">
            <div class="row">
                <?php var_dump($this->session->userdata('android')); ?>
                <?php foreach ($artikel as $key) {
                ?>
                    <div class="card-deck my-2 mx-auto">
                        <a href="<?= base_url('user/view/' . $key->artikel_slug) ?>" class="card " style="max-width: 8rem; min-width: 8rem;">
                            <img class="card-img-top text-center img-thumbnail d-block" src="<?= base_url('assets/image/konten_img/') . $key->img_artikel ?>" style="min-width: 80%; max-height: 80px; min-height: 70%;" alt="Card image cap">
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

</div>