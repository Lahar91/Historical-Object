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

<div class="col-lg-12 mt-3">


    <?php if ($this->session->userdata('lebarlayar') > '860') { ?>

        <div class="card card-primary card-outline">
            <H4 class="text-center mt-2 mb-1 hboder ckonten">Rekomendasi</H4>

            <div class="card-body">
                <section class="splide" aria-label="Splide Basic HTML Example">
                    <div class="splide__track mr-5 ml-5">
                        <ul class="splide__list mr-5 ml-5">
                            <?php

                            $query = $this->db->query("SELECT count(*) as total, artikel_slug, img_artikel, nama_artikel, artikel.id_artikel as id_artikel FROM rekomendasi_artikel Inner join artikel  on rekomendasi_artikel.id_artikel = artikel.id_artikel GROUP BY id_artikel order by total desc LIMIT 5")->result();
                            foreach ($query as $key => $value) : {
                                }
                            ?>
                                <li class="splide__slide mb-4">
                                    <div class="splide__slide_container"><a href="<?= base_url('guest/view/' . $value->artikel_slug) ?>"><img src="<?= base_url() ?>assets/image/konten_img/<?= $value->img_artikel ?>">
                                    </div>
                                    <center><?= $value->nama_artikel ?></center></a>
                                </li>

                            <?php endforeach ?>

                        </ul>
                    </div>
                    <div class="splide__progress">
                        <div class="splide__progress__bar">
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class="col-lg-12">

            <div class="card card-primary card-outline">
                <div class="card-body my-3">
                    <div class="row">

                        <?php foreach ($pagartikel as $key) {
                        ?>
                            <div class="col-lg-3">
                                <div class="card-deck my-2">
                                    <a href="<?= base_url('guest/view/' . $key['artikel_slug']) ?>" class="card " style="max-width: 13rem; min-width: 13rem;">
                                        <img class="card-img-top text-center img-thumbnail d-block" src="<?= base_url('assets/image/konten_img/') . $key['img_artikel'] ?>" style="min-width: 200px; max-height: 150px; min-height: 150px;" alt="Card image cap">
                                        <div class="card-body ">
                                            <p class="card-text text-center ">
                                                <?= $key['nama_artikel'] ?>
                                            </p>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        <?php  } ?>

                    </div>
                    <div class="mx-auto">
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>

        </div>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var splide = new Splide('.splide', {
            type: 'loop',
            trimSpace: 'move',
            perPage: 3,
            autoScroll: {
                speed: 2,
            },
            breakpoints: {
                1280: {
                    perPage: 3,

                },

                1080: {
                    perPage: 3,
                },

                900: {
                    perPage: 3,
                },


                720: {
                    perPage: 1,
                },


                450: {
                    perPage: 2,
                }
            },

        });
        splide.mount();
    });
</script>
<?php } else { ?>
    <div class="card card-primary card-outline">

        <H4 class="text-center mt-2 mb-1 hboder ckonten">Rekomendasi</H4>

        <div class="card-body">
            <section class="splide" aria-label="Splide Basic HTML Example">
                <div class="splide__track mr-5 ml-5">
                    <ul class="splide__list mr-5 ml-5">
                        <?php
                        $query = $this->db->query("SELECT count(*) as total, artikel_slug, img_artikel, nama_artikel, artikel.id_artikel as id_artikel FROM rekomendasi_artikel Inner join artikel  on rekomendasi_artikel.id_artikel = artikel.id_artikel GROUP BY id_artikel order by total desc LIMIT 5")->result();
                        foreach ($query as $key => $value) : {
                            }
                        ?>
                            <li class="splide__slide mb-4">
                                <div class="splide__slide_container"><a href="<?= base_url('guest/view/' . $value->artikel_slug) ?>"><img src="<?= base_url() ?>assets/image/konten_img/<?= $value->img_artikel ?>">
                                </div>
                                <center><?= $value->nama_artikel ?></center></a>
                            </li>

                        <?php endforeach ?>

                    </ul>
                </div>
                <div class="splide__progress">
                    <div class="splide__progress__bar">
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="col-lg-12">

        <div class="card card-primary card-outline">
            <div class="card-body mx-auto">
                <div class="row">

                    <?php foreach ($pagartikel as $key) {
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
                <div class="mx-auto">
                    <?= $this->pagination->create_links(); ?>
                </div>

            </div>
        </div>

    </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splide = new Splide('.splide', {
                type: 'loop',
                trimSpace: 'move',
                perPage: 3,
                autoScroll: {
                    speed: 2,
                },
                breakpoints: {
                    1280: {
                        perPage: 3,

                    },

                    1080: {
                        perPage: 3,
                    },

                    900: {
                        perPage: 3,
                    },


                    720: {
                        perPage: 1,
                    },


                    450: {
                        perPage: 2,
                    }
                },

            });
            splide.mount();
        });
    </script>

<?php } ?>