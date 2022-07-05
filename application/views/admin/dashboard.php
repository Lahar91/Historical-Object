<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>

<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">

                    <div class="float-left">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                    <h4 class="float-right"><?= $countuser; ?></h4>

                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-left">
                        <i class="fa fa-clone fa-2x text-info"></i>
                    </div>
                    <h4 class="float-right"><?= $countkategori; ?></h4>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-left">
                        <i class="fas fa-newspaper fa-2x text-info" aria-hidden="true">
                        </i>
                    </div>
                    <h4 class="float-right"><?= $countartikel; ?></h4>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card ">

                <div class="card-body">
                    <div class="float-left">
                        <div class="d-flex">
                            <i class="fa fa-comments fa-2x text-info"> </i>
                            <H4> Laporan</H4>
                        </div>

                    </div>
                    <h4 class="float-right"><?= $countkuis; ?></h4>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
date_default_timezone_set('Asia/Jakarta');
$today = date('d-m-Y');
$break = explode("-", $today);

$yearpengunjung = isset($_GET['pengunjungyear']) && $_GET['pengunjungyear']  ? $_GET['pengunjungyear'] : $break[2];

var_dump($yearpengunjung);
$pengunjung_query = $this->db->query("SELECT YEAR(tanggal) as tahun, id_artikel, Count(*) as total FROM rekomendasi_artikel WHERE YEAR(tanggal) = $yearpengunjung GROUP BY id_artikel order by total DESC limit 5")->result_array();

$yearpopuler = isset($_GET['populeryear']) && $_GET['populeryear']  ? $_GET['populeryear'] : $break[2];
$artikel_top = $this->db->query("SELECT YEAR(tanggal) as tahun, id_artikel, Count(*) as total FROM rekomendasi_artikel WHERE YEAR(tanggal) = $yearpopuler GROUP BY id_artikel order by total DESC limit 5")->result_array();

?>

<div class="col-lg-12">

    <div class="card card-primary">
        <div class="card-header">
            <div class="text-center">
                <h5> Pengunjung
                </h5>
            </div>
        </div>
        <div class="row mx-1 mt-2">
            <div class="col-lg-2">
                <div class="form-group">
                    <select name="year" id="by_year1" class="form-control col-4">
                        <?php foreach ($year as $key => $value) { ?>
                            <option <?php if ($value->tahun == $yearpengunjung) {
                                        echo 'selected';
                                    } ?> value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                        <?php } ?>
                    </select>
                </div>

            </div>
            <div class="ml-auto mr-2">
                <button class="btn btn-outline-primary">Print PDF</button>
            </div>
        </div>
        <div class="card-body">
            <canvas id="mychart" height="50px"></canvas>
        </div>
    </div>
</div>



<div class="col-lg-12">

    <div class="card card-primary">
        <div class="card-header ">
            <div class="text-center">
                <h5> 5 Artikel Populer
                </h5>
            </div>
        </div>
        <div class="col-lg-2 mt-1">
            <div class="form-group">
                <select name="year2" id="by_year2" class="form-control col-4">
                    <?php foreach ($year as $key => $value) { ?>
                        <option <?php if ($value->tahun == $yearpopuler) {
                                    echo 'selected';
                                } ?> value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                    <?php } ?>


                </select>
            </div>
        </div>
        <div class="card-body">
            <canvas id="mychart2" height="50px"></canvas>

        </div>
    </div>
</div>


<?php
/*
    Chart pengunjung
*/

?>
<script>
    const by_year1 = document.querySelector('#by_year1');
    const top_rec1 = document.querySelector('#by_year2');

    by_year1.addEventListener('change', function() {
        const halamanSaatIni = "<?= base_url('admin/Dashboard') ?>";

        window.location.href = halamanSaatIni + '?pengunjungyear=' + this.value + '&populeryear=' + top_rec1.value;

    });
    var ctx = document.getElementById('mychart').getContext('2d');


    var mychart = new Chart(ctx, {
        //chart akan ditampilkan sebagai bar chart
        type: 'bar',
        data: {
            //membuat label chart

            labels: [<?php foreach ($pengunjung_query as $key => $value) {
                            echo '"' . $value['id_artikel'] . '",';
                        } ?>],

            datasets: [{
                label: "Pengunjung",
                borderColor: "#80b6f4",
                pointBorderColor: "#80b6f4",
                pointBackgroundColortime_diff: "#80b6f4",
                pointHoverBackgroundColor: "#80b6f4",
                pointHoverBorderColor: "#80b6f4",
                pointBorderWidth: 10,
                pointHoverRadius: 10,
                pointHoverBorderWidth: 1,
                pointRadius: 3,
                fill: false,
                borderWidth: 4,
                //isi chart
                data: [<?php foreach ($pengunjung_query as $key => $value) {
                            echo '"' . $value['total'] . '",';
                        } ?>],


            }]
        },
        options: {
            legend: {
                responsive: true,
                position: "bottom"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold",
                        beginAtZero: true,
                        maxTicksLimit: 5,
                        padding: 20
                    },
                    gridLines: {
                        drawTicks: false,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        zeroLineColor: "transparent"
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold"
                    }
                }]
            }
        }
    });
</script>

<script>
    /*
    Chart pengunjung
*/

    const by_year2 = document.querySelector('#by_year2');
    const pengunjung1 = document.querySelector('#by_year1')
    by_year2.addEventListener('change', function() {
        const halamanSaatIni = "<?= base_url('admin/Dashboard') ?>";

        window.location.href = halamanSaatIni + '?populeryear=' + this.value + '&pengunjungyear=' + pengunjung1.value;
    });

    var ctx2 = document.getElementById('mychart2').getContext('2d');


    var mychart2 = new Chart(ctx2, {
        //chart akan ditampilkan sebagai bar chart
        type: 'bar',
        data: {
            //membuat label chart

            labels: [<?php foreach ($artikel_top as $key => $value) {
                            echo '"' . $value['id_artikel'] . '",';
                        } ?>],

            datasets: [{
                label: "Viewer",
                borderColor: "#80b6f4",
                pointBorderColor: "#80b6f4",
                pointBackgroundColortime_diff: "#80b6f4",
                pointHoverBackgroundColor: "#80b6f4",
                pointHoverBorderColor: "#80b6f4",
                pointBorderWidth: 10,
                pointHoverRadius: 10,
                pointHoverBorderWidth: 1,
                pointRadius: 3,
                fill: false,
                borderWidth: 4,
                //isi chart
                data: [<?php foreach ($artikel_top as $key => $value) {
                            echo '"' . $value['total'] . '",';
                        } ?>],


            }]
        },
        options: {
            legend: {
                responsive: true,
                position: "bottom"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold",
                        beginAtZero: true,
                        maxTicksLimit: 5,
                        padding: 20
                    },
                    gridLines: {
                        drawTicks: false,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        zeroLineColor: "transparent"
                    },
                    ticks: {
                        padding: 20,
                        fontColor: "rgba(0,0,0,0.5)",
                        fontStyle: "bold"
                    }
                }]
            }
        }
    });
</script>