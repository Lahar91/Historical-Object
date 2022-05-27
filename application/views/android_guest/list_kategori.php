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
<div class="col-lg-12 mt-5">

    <div class="card card-primary card-outline ">
        <?php
        foreach ($kategori as $key => $value) : ?>
            <a href="<?= base_url('guest/kategori/' . $value->k_slug) ?>" class="btn btn-transparent mb-1"><?= $value->nama_kategori; ?></a>

        <?php endforeach ?>
    </div>
</div>