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
            <div class="card">

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

<div class="col-lg-12">
    <?php
    var_dump($top_5) ?>
    <div class="card">
        <div class="card-header">
            <select name="year" id="by_year" class="">
                <?php foreach ($year as $key => $value) { ?>
                    <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                <?php } ?>
            </select>
            <div class="card-body">
                <canvas id="mychart" height="50px"></canvas>

            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <?php
    var_dump($top_5) ?>
    <div class="card">
        <div class="card-header">
            <select name="year" id="by_year" class="">
                <?php foreach ($year as $key => $value) { ?>
                    <option value="<?= $value->tahun ?>"><?= $value->tahun ?></option>
                <?php } ?>
            </select>
            <div class="card-body">
                <canvas id="mychart2" height="50px"></canvas>

            </div>
        </div>
    </div>
</div>

<script>
    const by_year = document.querySelector('#by_year');
    by_year.addEventListener('change', function() {
        const halamanSaatIni = "<?= base_url('admin/Dashboard') ?>";

        window.location.href = halamanSaatIni + '?year=' + this.value;
    });

    var ctx = document.getElementById('mychart2').getContext('2d');


    var mychart = new Chart(ctx, {
        //chart akan ditampilkan sebagai bar chart
        type: 'line',
        data: {
            //membuat label chart

            labels: [<?php foreach ($top_5 as $key => $value) {
                            echo '"' . $value->id_artikel . '",';
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
                data: [<?php foreach ($top_5 as $key => $value) {
                            echo '"' . $value->count_artikel . '",';
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
    const by_year = document.querySelector('#by_year');
    by_year.addEventListener('change', function() {
        const halamanSaatIni = "<?= base_url('admin/Dashboard') ?>";

        window.location.href = halamanSaatIni + '?year=' + this.value;
    });

    var ctx = document.getElementById('mychart').getContext('2d');


    var mychart = new Chart(ctx, {
        //chart akan ditampilkan sebagai bar chart
        type: 'line',
        data: {
            //membuat label chart

            labels: [<?php foreach ($top_5 as $key => $value) {
                            echo '"' . $value->id_artikel . '",';
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
                data: [<?php foreach ($top_5 as $key => $value) {
                            echo '"' . $value->count_artikel . '",';
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