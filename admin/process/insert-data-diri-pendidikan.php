<?php
include("../../config/connect-clean.php");

if(isset($_POST['id_hidden'])){
    $id = $_POST['id_hidden'];
    $ssb = $_POST['ssb'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi = $_POST['provinsi'];
    $tahun = $_POST['tahun'];
    $posisi = $_POST['posisi'];
    $sql = "INSERT into [tbl_data_pemain-pendidikan](id_pemain,ssb,kabupaten,provinsi,tahun,posisi) VALUES('$id','$ssb','$kabupaten','$provinsi','$tahun','$posisi')";
    $qry = sqlsrv_query($conn,$sql);
    if($qry){
        echo "ok";
    } else {
        echo "error|".print_r(sqlsrv_errors());
    }
}