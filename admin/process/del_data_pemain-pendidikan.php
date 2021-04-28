<?php
include("../../config/connect-clean.php");

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $qry=sqlsrv_query($conn,"DELETE FROM [tbl_data_pemain-pendidikan] WHERE id='$id'");
    if($qry){
        echo "ok";
    } else {
        echo "error|".print_r(sqlsrv_errors());
    }
}