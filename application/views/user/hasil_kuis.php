<?php 
error_reporting(0);
?>
<div class="col-lg-7 offset-2 mt-5">
    <div class="card card-primary">
        <div class="card-header"></div>
        <div class="mx-auto">
            <h4 class="ml-1">Score anda :</h4>
            <h1 class="ml-1 mb-2 mt-2" style="font-size: 100px;"><?= $this->session->userdata('snilai'); ?></h1>

        </div>
        <div class="mx-auto mb-2">
            <a href="<?= base_url('user/kuis') ?>" class="btn btn-outline-primary  btn-lg">Selesai</a>
        </div>
    </div>

</div>