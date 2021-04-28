<?php
session_start();
if(!isset($_SESSION['username'])){
    echo "<script>
    alert('Sesi login telah habis, mohon login ulang.');
    window.location = 'index.php';
    </script>";
    
} else {
    echo "<script>
    console.log('Login as ". $_SESSION['role']."');
    </script>";
}
?>