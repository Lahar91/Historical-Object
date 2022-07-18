<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.11/jspdf.plugin.autotable.min.js"></script>



<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">

                    <div class="float-left">
                        <div class="d-flex">
                            <i class="fas fa-users fa-2x text-info"></i>
                            <H4 class="ml-3"> User</H4>

                        </div>
                    </div>
                    <h4 class="float-right"><?= $countuser; ?></h4>

                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-left">
                        <div class="d-flex">
                            <i class="fa fa-clone fa-2x text-info"></i>
                            <H4 class="ml-3"> Kategori</H4>
                        </div>
                    </div>
                    <h4 class="float-right"><?= $countkategori; ?></h4>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-left">
                        <div class="d-flex">
                            <i class="fas fa-newspaper fa-2x text-info" aria-hidden="true">
                            </i>
                            <H4 class="ml-3"> Artikel</H4>

                        </div>

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
                            <i class="fa fa-comments fa-2x text-info" aria-hidden="true"> </i>
                            <H4 class="ml-3"> Laporan</H4>
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

$pengunjung_query = $this->db->query("SELECT YEAR(tanggal) as tahun, DATE_FORMAT(tanggal, '%M') as month, Count(*) as total FROM counterviewer WHERE YEAR(tanggal) = $yearpengunjung GROUP BY DATE_FORMAT(tanggal, '%m')
")->result_array();


// $pengunjung_query = $this->db->query("SELECT YEAR(tanggal) as tahun, id_artikel, Count(*) as total FROM rekomendasi_artikel WHERE YEAR(tanggal) = $yearpengunjung GROUP BY id_artikel order by total DESC limit 5")->result_array();

$yearpopuler = isset($_GET['populeryear']) && $_GET['populeryear']  ? $_GET['populeryear'] : $break[2];
$artikel_top = $this->db->query("SELECT YEAR(tanggal) as tahun, rekomendasi_artikel.id_artikel, nama_artikel, Count(*) as total FROM rekomendasi_artikel INNER JOIN artikel on rekomendasi_artikel.id_artikel = artikel.id_artikel WHERE YEAR(tanggal) = $yearpopuler GROUP BY id_artikel order by total DESC limit 5")->result_array();

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
                <input class="btn btn-outline-primary" type="button" value="Save as PDF" onclick="savePDF()" />
            </div>
        </div>
        <div class="card-body">
            <canvas id="mychart" height="60px"></canvas>
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
            <canvas id="mychart2" height="60px"></canvas>

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

            /**  labels: [<?php foreach ($pengunjung_query as $key => $value) {
                                echo '"' . $value['month']  . '",';
                            } ?>],*/

            labels: ["Januari", "Febuari", "Maret", "April", "May", "Juni", "July", "Agustus", "September", "Oktober", "November ", "Desember"],

            datasets: [{
                label: "Pengunjung <?= $yearpengunjung ?>",
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
                        padding: 20,

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
    Chart Artikel Top
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

                            echo '"' . $value['nama_artikel'] . '",';
                        } ?>],

            datasets: [{
                label: "Viewer <?= $yearpopuler ?>",
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

<script>
    function savePDF() {
        var doc = new jsPDF()
        var no = 0
        doc.autoTable({
            head: [
                ['Bulan ', 'Pengunjung ']
            ],
            body: [
                <?php foreach ($pengunjung_query as $key => $value) { ?>[[<?= '"' . $value['month'] . '",' ?>]
                        [<?= '"' . $value['total'] . '",' ?>]]
                <?php } ?>
            ]


        })
        doc.save('save.pdf')
    }
</script>