<?php error_reporting(0) ?>
<style>
    .hborder {
        margin-top: -5px;
    }

    .ckonten {
        border-bottom: 1px solid blue;
        margin-top: -5px;
    }
</style>


<div class="col-lg-12">

    <div class="card card-primary card-outline">
        <?php $slug = $this->uri->segment(3);
        ?>
        <H4 class="text-center mt-2 mb-1  "><?= str_replace('-', ' ', $slug) ?></H4>

        <div class="card-body mx-auto">
            <div class="row">

                <?php foreach ($db_konten as $key) {
                ?>
                    <div class="card-deck my-2 mx-auto">
                        <a href="<?= base_url('user/view/' . $key['artikel_slug']) ?>" class="card " style="max-width: 8rem; min-width: 8rem;">
                            <img class="card-img-top text-center" src="<?= base_url('assets/image/konten_img/') . $key['img_artikel'] ?>" style="min-width: 80%; max-height: 80px; min-height: 70%;" alt="Card image cap">
                            <div class="card-body ">
                                <p class="card-text text-center ">
                                    <?= $key['nama_artikel'] ?>
                                </p>
                            </div>
                        </a>

                    </div>
                <?php  } ?>
                <?= $this->pagination->create_links(); ?>

            </div>


        </div>
    </div>

</div>