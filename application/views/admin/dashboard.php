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
                            <H4 class="ml-3"> KUIS</H4>
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
<?php foreach ($pengunjung_query as $key => $value) {
}?>
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
                <input class="btn btn-outline-primary" type="button" value="Save as PDF" onclick="downloadpengunjung()" />
            </div>
        </div>
        <div class="card-body">
            <canvas id="mychart" height="60px"></canvas>
        </div>
        <table class="table table-bordered text-center" id="pengunjungjs" hidden>
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="w-25">Bulan</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pengunjung_query as $key => $value) {

                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['month']?></td>
                            <td><?= $value['total'] ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
        <div class="ml-auto mr-2">
                <input class="btn btn-outline-primary" type="button" value="Save as PDF" onclick="downloadtoparikel()" />
            </div>
        <div class="card-body">
            <canvas id="mychart2" height="60px"></canvas>
            <table class="table table-bordered text-center" id="topartikeljs" hidden>
                <thead>
                    <tr>
                        <th>No</th>
                        <th class="w-25">Nama Aritkel</th>
                        <th>total</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($artikel_top as $key => $value) {
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['nama_artikel'] ?></td>
                            <td><?= $value['total'] ?></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
   // setup
    const data = {
            labels: ["Januari", "Febuari", "Maret", "April", "May", "Juni", "July", "Agustus", "September", "Oktober", "November ", "Desember"],
      datasets: [{
        label: 'Pengunjung <?= $yearpengunjung ?>',
                data: [<?php foreach ($pengunjung_query as $key => $value) {
                            echo '"' . $value['total'] . '",';
                        } ?>],        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };
 
    const bgColor = {
        id:'bgColor',
        beforeDraw:(chart,options) => {
            const {ctx,width,height} = chart
            ctx.fillStyle = 'white'
            ctx.fillRect(0, 0, width, height)
            ctx.restore()
        }
    }
 
    // config
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
      plugins:[bgColor]
    };
 
    // render init block
    const myChart = new Chart(
      document.getElementById('mychart'),
      config
    );
 
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

   // setup
    const datas = {
            labels: [<?php foreach ($artikel_top as $key => $value) {

                            echo '"' . $value['nama_artikel'] . '",';
                        } ?>],
      datasets: [{
        label: ' "populer Artikel <?= $yearpopuler ?>"',
                 data: [<?php foreach ($artikel_top as $key => $value) {
                            echo '"' . $value['total'] . '",';
                        } ?>],       
		backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };
 
    const bgColor2 = {
        id:'bgColor2',
        beforeDraw:(chart,options) => {
            const {ctx,width,height} = chart
            ctx.fillStyle = 'white'
            ctx.fillRect(0, 0, width, height)
            ctx.restore()
        }
    }
 
    // config
    const config2 = {
      type: 'bar',
      data: datas,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      },
      plugins:[bgColor2]
    };
 
    // render init block
    const mychart2 = new Chart(
      document.getElementById('mychart2'),
      config2
    );
 
</script>

<script>
function downloadtoparikel(){
    var canvas = document.getElementById('mychart2');
    var canvasImage = canvas.toDataURL('image/jpeg', 1.0);
    let pdf = new jsPDF('p', 'pt', 'a4');
    pdf.setFontSize(20);
    var y = 20;
    var width = pdf.internal.pageSize.getWidth();
    pdf.text('Historical Object', width/2, y= y+20, { align: 'center' })
    pdf.text('Laporan Pengunjung', width/2, y= y+30, { align: 'center' })
    pdf.addImage(canvasImage, 'JPEG', 35, y = y+20,  520, 250);
    pdf.autoTable({
        html: '#topartikeljs',
        startY: 350,
        theme: 'grid',
    })
    pdf.save('Topartikel.pdf')
}

function downloadpengunjung(){
    var canvas = document.getElementById('mychart');
    var canvasImage = canvas.toDataURL('image/jpeg', 1.0);
    let pdf = new jsPDF('p', 'pt', 'a4');
    pdf.setFontSize(20);
    var y = 20;
    var width = pdf.internal.pageSize.getWidth();
    pdf.text('Historical Object', width/2, y= y+20, { align: 'center' })
    pdf.text('artikel Pengunjung', width/2, y= y+30, { align: 'center' })
    pdf.addImage(canvasImage, 'JPEG', 35, y = y+20,  520, 250);
    pdf.autoTable({
        html: '#pengunjungjs',
        startY: 350,
        theme: 'grid',
    })
    pdf.save('Pengunjung.pdf')
}
</script>