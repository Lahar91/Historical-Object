<?php
function removePrevText($str, $prefix)
{
    if (0 === stripos($str, $prefix)) {
        $str = substr($str, strlen($prefix)) . '';
    }
    return $str;
}




function convidtostring($ids)
{
    $ci = &get_instance();
    $query = $ci->db->query("select * from kategori");
    $row = $query->result();


    foreach ($row as $key) {


        switch ($ids) {
            case $key->id_kategori:
                echo $ids = $key->nama_kategori;
                break;
        }
    }
}

function idconverttittle($idt)
{
    $ci = &get_instance();
    $query = $ci->db->query("select * from artikel");
    $row = $query->result();


    foreach ($row as $key) {


        switch ($idt) {
            case $key->id_artikel:
                echo $idt = $key->nama_artikel;
                break;
        }
    }
}

function generateRandomString($length = 2)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $final = $randomString . time();
    return $final;
}

function generateuserid($role)
{
    $ci = &get_instance();

    $auto = $ci->db->select('*')
        ->order_by('id_user', 'desc')
        ->limit(1)
        ->get('user');
    $no     = $auto->result_array();
    $kodeid = $no[0]['id_user'];
    $urutan = (int) substr($kodeid, 8, 8);
    $urutan++;
    $firstcode = "US-";
    $month = date('m');
    $year = date('y');
    $finalid = $firstcode . $role . $year . $month . sprintf("%03s", $urutan);
    return $finalid;

    // $data = mysqli_fetch_array($query);
    // $kodeBarang = $data['kodeTerbesar'];

    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    // $urutan = (int) substr($kodeBarang, 3, 3);

    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    // $urutan++;

    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    // $huruf = "BRG";
    // $kodeBarang = $huruf . sprintf("%03s", $urutan);
}

function generatfeedbackid()
{
    $ci = &get_instance();

    $auto = $ci->db->select('*')
        ->order_by('id_feadback', 'desc')
        ->limit(1)
        ->get('feadback');
    $no     = $auto->result_array();

    if ($no[0] == null || $no[0] == "") {
        $firstcode = "FD-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", 1);
        return $finalid;
    } else {
        $kodeid = $no[0]['id_feadback'];
        $urutan = (int) substr($kodeid, 7, 7);
        $urutan++;
        $firstcode = "FD-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", $urutan);
        return $finalid;
    }
}

function generatevieweruser()
{
    $ci = &get_instance();

    $auto = $ci->db->select('*')
        ->order_by('id_viewer', 'desc')
        ->limit(1)
        ->get('counterviewer');
    $no     = $auto->result_array();
    if ($no[0] == null || $no[0] == "") {
        $firstcode = "VU-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", 1);
        return $finalid;
    } else {
        $kodeid = $no[0]['id_viewer'];
        $urutan = (int) substr($kodeid, 8, 8);
        $urutan++;
        $firstcode = "VU-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", $urutan);
        return $finalid;
    }
}

function generatartikelid()
{
    $ci = &get_instance();

    $auto = $ci->db->select('*')
        ->order_by('id_artikel', 'desc')
        ->limit(1)
        ->get('artikel');
    $no     = $auto->result_array();
    $finalid = "";
    if ($no[0] == null || $no[0] == "") {
        $firstcode = "AR-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", 1);
        return $finalid;
    } else {
        $kodeid = $no[0]['id_artikel'];
        $urutan = (int) substr($kodeid, 7, 7);
        $urutan++;
        $firstcode = "AR-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", $urutan);
        return $finalid;
    }
}

function generatkategoriid()
{
    $ci = &get_instance();

    $auto = $ci->db->select('*')
        ->order_by('id_kategori', 'desc')
        ->limit(1)
        ->get('kategori');
    $no     = $auto->result_array();

    if (empty($no[0]['id_feadback'])) {
        $firstcode = "KG-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", 1);
        return $finalid;
    } else {
        $kodeid = $no[0]['id_feadback'];
        $urutan = (int) substr($kodeid, 7, 7);
        $urutan++;
        $firstcode = "KG-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", $urutan);
        return $finalid;
    }
}

function generatlaporanid()
{
    $ci = &get_instance();

    $auto = $ci->db->select('*')
        ->order_by('id_report', 'desc')
        ->limit(1)
        ->get('report_artikel');
    $no     = $auto->result_array();

    if (empty($no[0]['id_report'])) {
        $firstcode = "LP-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", 1);
        return $finalid;
    } else {
        $kodeid = $no[0]['id_report'];
        $urutan = (int) substr($kodeid, 7, 7);
        $urutan++;
        $firstcode = "LP-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", $urutan);
        return $finalid;
    }
}


function generattmpid()
{
    $ci = &get_instance();

    $auto = $ci->db->select('*')
        ->order_by('id_tn', 'desc')
        ->limit(1)
        ->get('tmp_nilai');
    $no     = $auto->result_array();
    $finalid = "";

    if ($no[0] == null || $no[0] == "") {
        $firstcode = "TN-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", 1);
    } else {
        $kodeid = $no[0]['id'];
        $urutan = (int) substr($kodeid, 7, 7);
        $urutan++;
        $firstcode = "TN-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", $urutan);
    }
    return $finalid;
}

function generathasilnilaiid()
{
    $ci = &get_instance();

    $auto = $ci->db->select('*')
        ->order_by('id_hasil', 'desc')
        ->limit(1)
        ->get('hasil_kuis');
    $no     = $auto->result_array();
    $finalid = "";

    if ($no[0] == null || $no[0] == "") {
        $firstcode = "HN-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", 1);
    } else {
        $kodeid = $no[0]['id'];
        $urutan = (int) substr($kodeid, 7, 7);
        $urutan++;
        $firstcode = "HN-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", $urutan);
    }
    return $finalid;
}

function populeryear()
{
    date_default_timezone_set('Asia/Jakarta');
    $today = date('d-m-Y');
    $break = explode("-", $today);
    $year = '';
    if (isset($_GET['populeryear']) && $_GET['populeryear'] !== '' && isset($_SESSION['populeryear']) && $_SESSION['populeryear'] !== '') {
        $year['populeryear'] = $_GET['populeryear'];
        $_SESSION['populeryear'];
    } else {
        $year = $break[2];
    }
    return $year;
}

function ganareterecid()
{
    $ci = &get_instance();

    $auto = $ci->db->select('*')
        ->order_by('id_rekomendasi', 'desc')
        ->limit(1)
        ->get('rekomendasi_artikel');
    $no     = $auto->result_array();
    $finalid = "";

    if ($no[0] == null || $no[0] == "") {
        $firstcode = "RA-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", 1);
    } else {
        $kodeid = $no[0]['id_rekomendasi'];
        $urutan = (int) substr($kodeid, 7, 7);
        $urutan++;
        $firstcode = "RA-";
        $month = date('m');
        $year = date('y');
        $finalid = $firstcode . $year . $month . sprintf("%03s", $urutan);
    }
    return $finalid;
}
