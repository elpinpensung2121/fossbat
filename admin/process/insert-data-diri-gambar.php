<?php
include("../../config/connect-clean.php");
if(isset($_POST['id_hidden'])){
    $id = $_POST['id_hidden'];
    if (isset($_FILES['fileUpload'])) {
            $errors = array();
            $file_name = $_FILES['fileUpload']['name'];
            $extractname = explode(".",$file_name);
            $ext = end($extractname);
            $new = uniqid().".".$ext;
            $file_tmp = $_FILES['fileUpload']['tmp_name'];
            move_uploaded_file($file_tmp,"../../assets/gambar/".$new);
            
        
        $sql = "UPDATE tbl_data_pemain SET gambar='$new' WHERE id='$id'";
        $qry = sqlsrv_query($conn,$sql);
        if($qry){
            echo "ok";
        } else {
            echo "error|".print_r(sqlsrv_errors());
        }
    }
} else {
    echo "error";
}