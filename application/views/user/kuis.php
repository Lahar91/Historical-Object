<div class="col-lg-12 mt-3">
    <div class="row">
        <div class="col-sm-6">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-tittle text-center">
                        Leaderboard
                    </div>
                </div>
                <div class="card-body">
                    <table class="leaderboard " style="width:100%">
                        <thead>
                            <tr>
                                <th>user</th>
                                <th>Total Score</th>
                                <th>Rank</th>

                            </tr>
                        </thead>
                        <?php $no = 1;
                            $hasilnilai = $this->db->query("SELECT id_kj, kuis_jawab.id_user AS iduser, SUM(nilai) AS hasil, token, img, username FROM kuis_jawab INNER JOIN user ON kuis_jawab.id_user = user.id_user GROUP BY iduser ORDER BY hasil DESC LIMIT 3")->result_array();

                        foreach ($hasilnilai as $key => $value) : ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url('assets/image/user/' . $value['img']) ?>" class="circle-img circle-img--small mr-2" alt="User Img">
                                            <div class="user-info__basic">
                                                <h6 class="mb-0"><?= $value['username'] ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-baseline">
                                            <h4 class="mr-1"><?= $value['hasil'] ?></h4>
                                    </td>

                                    <td>
                                        <button class="btn btn-success btn-sm"><?= $no++ ?></button>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                            </tbody>
                    </table>
                </div>
            </div>
        </div>




        <div class="col-sm-6">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="card-tittle text-center">
                        MY SCORE
                    </div>
                </div>
                <div class="card-body">
                    <table class="leaderboard " style="width:100%">
                        <thead>
                            <tr>
                                <th>user</th>
                                <th>Total Score</th>

                            </tr>
                        </thead>
                        <tbody>


                            <?php 

                            if ($shownilai != null) { ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url('assets/image/user/' . $shownilai->img) ?>" class="circle-img circle-img--small mr-2" alt="User Img">
                                            <div class="user-info__basic">
                                                <h6 class="mb-0"><?= $shownilai->username; ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" align-items-baseline">
                                            <h4 class="fload-right"><?= $shownilai->hasil; ?></h4><small class="text-success"></small>
                                        </div>
                                    </td>
                                </tr> <?php } else { ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url('assets/image/user/' . $this->session->userdata('img')) ?>" class="circle-img circle-img--small mr-2" alt="User Img">
                                            <div class="user-info__basic">
                                                <h6 class="mb-0"><?= $this->session->userdata('nama_users') ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class=" align-items-baseline">
                                            <h4 class="fload-right">0</h4><small class="text-success"></small>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-12 mt-2">
        <div class="card card-primary">
            <div class="card-header">
                <div class="card-tittle text-center">
                </div>
            </div>
            <div class="card-body mx-auto">
                <div class="">
                    <H4 class="ml-2">Play to Game</H4>
                    <a href="<?= base_url('user/kuis/play') ?>" class="btn btn-outline-primary text-center ml-5">Start</a>
                </div>
            </div>

        </div>
    </div>

</div>