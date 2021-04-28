<?php
include("../../config/connect-clean.php");

if(isset($_POST)){
    $id= $_POST['id_pemain'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $panggilan = $_POST['panggilan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = date("Y-m-d",strtotime($_POST['tgl_lahir']));
    $alamat = $_POST['alamat'];
    $admin_pemain = join(";",$_POST['admin_pemain']);
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
    if($id=='new' || $id==''){
    $sql = "
    DECLARE @temp_tbl TABLE (id int, nama varchar(50));
    INSERT INTO tbl_data_pemain(nama_lengkap,panggilan,tempat_lahir,tgl_lahir,alamat,admin_pemain,
    ssb,ayah,ibu,gol_darah,kelamin,berat,tinggi,pendidikan1,pendidikan2)
    OUTPUT INSERTED.id,INSERTED.nama_lengkap INTO @temp_tbl
    VALUES ('$nama_lengkap','$panggilan','$tempat_lahir',CONVERT(date,'$tgl_lahir'),'$alamat','$admin_pemain',
    '$ssb','$ayah','$ibu','$gol_darah','$kelamin','$berat','$tinggi','$sd','$smp') 
    SELECT * FROM @temp_tbl
    ";
    $qry = sqlsrv_query($conn,$sql);
    sqlsrv_next_result($qry);
    if($qry){
        echo "ok|";
        while($res=sqlsrv_fetch_array($qry)){
            echo $res['id'];
        }
    } else {
        echo "error|".print_r(sqlsrv_errors());
    }
    } else {
        $sql = "UPDATE tbl_data_pemain SET nama_lengkap='$nama_lengkap',panggilan='$panggilan',tempat_lahir='$tempat_lahir',
        tgl_lahir='$tgl_lahir',ssb='$ssb',ayah='$ayah',ibu='$ibu',alamat='$alamat',admin_pemain='$admin_pemain',
        gol_darah='$gol_darah',kelamin='$kelamin',berat='$berat',tinggi='$tinggi',pendidikan1='$sd',pendidikan2='$smp'
        WHERE id='$id'";
        $qry = sqlsrv_query($conn,$sql);
        if($qry){
            echo "ok|$id";
        } else {
            echo "error|".print_r(sqlsrv_errors());
        }
    }
}

?>