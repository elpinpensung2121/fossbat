<?php
include("../../config/connect.php");

if(isset($_POST)){
    $nama_lengkap = $_POST['nama_lengkap'];
    $panggilan = $_POST['panggilan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $ssb = $_POST['ssb'];
    $ayah = $_POST['ayah'];
    $ibu = $_POST['ibu'];
    $gol_darah = $_POST['gol_darah'];
    $kelamin = $_POST['kelamin'];
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];
    $sd = $_POST['sd'];
    $smp = $_POST['smp'];
    $aksi = $_POST['aksi'];
    $params = array($nama_lengkap,$panggilan,$tempat_lahir,$tgl_lahir,$alamat,
    $ssb,$ayah,$ibu,$gol_darah,$kelamin,$berat,$tinggi,$sd,$smp);
    $sql = "
    DECLARE @temp_tbl(id int, nama varchar(50));
    INSERT INTO tbl_pemain('nama_lengkap','panggilan','tempat_lahir','tgl_lahir','alamat',
    'ssb','ayah','ibu','gol_darah','kelamin','berat','tinggi','sd','smp')
    OUTPUT INSERTED.id,INSERTED.nama_lengkap INTO @MyTableVar
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);
    SELECT * FROM @temp_tbl
    ";
    $qry = sqlsrv_query($conn,$sql,$params);

    if($qry){
        echo "Success";
    } else {
        echo "Error";
    }

}

?>