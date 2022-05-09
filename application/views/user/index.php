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
</style>

<div class="col-lg-12 mt-5">

    <div class="card card-primary card-outline">
        <div class="card-body">
            <section class="splide" aria-label="Splide Basic HTML Example">
                <div class="splide__track mr-5 ml-5">
                    <ul class="splide__list mr-5 ml-5">
                        <li class="splide__slide "><img src="<?= base_url() ?>assets/image/benner/1.jpg"> </li>
                        <li class="splide__slide "><img src="<?= base_url() ?>assets/image/benner/2.jpg"> </li>
                        <li class="splide__slide "><img src="<?= base_url() ?>assets/image/benner/3.jpg"> </li>
                        <li class="splide__slide "><img src="<?= base_url() ?>assets/image/benner/3.jpg"> </li>
                        <li class="splide__slide "><img src="<?= base_url() ?>assets/image/benner/3.jpg"> </li>
                    </ul>
                </div>
                <div class="splide__progress">
                    <div class="splide__progress__bar">
                    </div>
                </div>
            </section>
        </div>
    </div>


    <div class="col-lg-12 ">

        <div class="card card-primary card-outline ">
            <div class="card-body mx-auto">
                <div class="row ml-5">
                    <?php foreach ($artikel as $key) {
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