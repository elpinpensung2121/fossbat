<?php
include("../../config/connect-clean.php");

if(isset($_POST['id_hidden'])){
    $id = $_POST['id_hidden'];
    $ssb = $_POST['ssb'];
    $kompetisi = $_POST['kompetisi'];
    $prestasi = $_POST['prestasi'];
    $tahun = $_POST['tahun'];
    $posisi = $_POST['posisi'];
    $sql = "INSERT into [tbl_data_pemain-prestasi1](id_pemain,ssb,kompetisi,prestasi,tahun,posisi) VALUES('$id','$ssb','$kompetisi','$prestasi','$tahun','$posisi')";
    $qry = sqlsrv_query($conn,$sql);
    if($qry){
        echo "ok";
    } else {
        echo "error|".print_r(sqlsrv_errors());
    }
}