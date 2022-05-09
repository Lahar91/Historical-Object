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
