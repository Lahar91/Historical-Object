<div class="col-lg-12 ">

    <div class="card card-primary card-outline ">
        <div class="card-body mx-auto">
            <div class="row ml-5">
                <?php foreach ($db_konten as $key) {
                ?>
                    <div class="card-deck mr-3 mb-4">
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
</div>