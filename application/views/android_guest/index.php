<?php error_reporting(0) ?>
<style>
    @media (max-width: 1920px) {
        ul li img {
            width: 20rem;
            height: 9rem;
        }
    }

    @media (max-width: 1350px) {
        ul li img {
            width: 20rem;
            height: 9rem;
        }
    }

    @media (max-width: 1200px) {
        ul li img {
            width: 16rem;
            height: 9rem;
        }
    }

    @media (max-width: 1024px) {
        ul li img {
            width: 11rem;
            height: 8rem;
        }
    }

    @media (max-width: 860px) {
        ul li img {
            width: 7rem;
            height: 7rem;
        }
    }

    @media (max-width: 600px) {
        ul li img {
            width: 5.6rem;
            height: 7rem;
        }
    }

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
        <div class="card-body mx-auto">
            <div class="row">

                <?php foreach ($artikel as $key) {
                ?>
                    <div class="card-deck my-2 mx-auto">
                        <a href="<?= base_url('guest/view/' . $key['artikel_slug']) ?>" class="card " style="max-width: 8rem; min-width: 8rem;">
                            <img class="card-img-top text-center img-thumbnail d-block" src="<?= base_url('assets/image/konten_img/') . $key['img_artikel'] ?>" style="min-width: 80%; max-height: 80px; min-height: 70%;" alt="Card image cap">
                            <div class="card-body ">
                                <p class="card-text text-center ">
                                    <?= $key['nama_artikel'] ?>
                                </p>
                            </div>
                        </a>

                    </div>
                <?php  } ?>

            </div>


        </div>
    </div>

</div>