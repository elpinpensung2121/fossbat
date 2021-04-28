<?php
include("../../config/connect-clean.php");

if(isset($_POST)){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $qry = sqlsrv_query($conn,"SELECT * FROM tbl_user WHERE username='$username' AND pasword='$password'",array(), array( "Scrollable" => 'static'));
    if(sqlsrv_num_rows($qry)>0){
        while($res= sqlsrv_fetch_array($qry)){
        session_start();
        $_SESSION['username'] = $res['username'];
        $_SESSION['role'] = $res['role'];
        }
        header("Location: ../daftar-pemain.php");
    } else {
        header("Location: ../index.php?msg=gagal");
    }

}
?>