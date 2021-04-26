<?php
$serverName = "DESKTOP-VPCI28S";
$connectionInfo = array("Database" => "fossbat");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if($conn) {
   echo "<script>console.log('Connected!');</script>";
}else{
      echo "Connection could not be established.<br />";
      die( print_r( sqlsrv_errors(), true));
 }
?>