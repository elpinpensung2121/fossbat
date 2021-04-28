<?php
include("../../config/connect-clean.php");

/* Array of database columns which should be read and sent back to DataTables. Use a space where
* you want to insert a non-database field (for example a counter or static image)
*/
// add your columns here!!!

$aColumns = array('id','nama_lengkap','ssb','kelamin','tempat_lahir','tgl_lahir');

 /* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "[id]";
  
/* DB table to use */
$sTable = "[fossbat].[dbo].[tbl_data_pemain]"; 
 $condition = "";
 $condition2 = "";
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* If you just want to use the basic configuration for DataTables with PHP server-side, there is
* no need to edit below this line
*/

/*
* Local functions
*/
function fatal_error($sErrorMessage = '')
{
	header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
	die($sErrorMessage);
}


/* Ordering */

$sOrder = "";
if (isset($_POST['order'])) {
	// $test=$_POST['columns'][3];
	$sOrder = "ORDER BY ";
	if ($_POST['columns'][0]['orderable'] == "true") {
		// echo $test;
		$sOrder .= "" . $aColumns[intval($_POST['order'][0]['column'])] . " " .
			($_POST['order'][0]['dir'] === 'asc' ? 'asc' : 'desc');
	}
}

/* escape function */
function mssql_escape($data)
{
	if (is_numeric($data))
		return $data;
	$unpacked = unpack('H*hex', $data);
	return '0x' . $unpacked['hex'];
}

/* Filtering */
$sWhere = "$condition2";
if (isset($_POST['search']['value']) && $_POST['search']['value'] != "") {
	$sWhere = "WHERE $condition (";
	for ($i = 0; $i < count($aColumns); $i++) {
		$sWhere .= $aColumns[$i] . " LIKE '%" . addslashes($_POST['search']['value']) . "%' OR ";
	}
	$sWhere = substr_replace($sWhere, "", -3);
	$sWhere .= ')';
}
/* Individual column filtering */
for ($i = 0; $i < count($aColumns); $i++) {
	if (isset($_POST['columns'][$i]) && $_POST['columns'][$i]['searchable'] == "true" && $_POST['columns'][$i]['search']['value'] != '') {
		if ($sWhere == "") {
			$sWhere = "WHERE $condition ";
		} else {
			$sWhere .= " AND ";
		}
		$sWhere .= $aColumns[$i] . " LIKE '%" . addslashes($_POST['columns'][$i]['search']['value']) . "%' ";
	}
}

/* Paging */
$top = (isset($_POST['start'])) ? ((int) $_POST['start']) : 0;
$limit = (isset($_POST['length'])) ? ((int) $_POST['length']) : 10;
/*$sQuery = "SELECT TOP $limit " . implode(",", $aColumns) . "
FROM $sTable
$sWhere " . (($sWhere == "") ? " WHERE $condition " : " AND ") . " $sIndexColumn NOT IN
(
SELECT TOP $top $sIndexColumn FROM
$sTable $sOrder
)
$sOrder";*/
$startrow = $top;
$endrow = $top+$limit;
$sQuery = "
SELECT " . implode(",", $aColumns) . "
FROM(
SELECT ROW_NUMBER() OVER( $sOrder ) RowNum," . implode(",", $aColumns) . "
FROM $sTable $sWhere ) as x
WHERE RowNum BETWEEN $startrow AND $endrow";
$sQuery2 = $sQuery;
//echo $sQuery2;
$rResult = sqlsrv_query($conn, $sQuery);

/* Data set length after filtering */
if ($sWhere == "") {
	$sQueryCnt = "SELECT * FROM $sTable";
} else {
	$sQueryCnt = "SELECT * FROM $sTable $sWhere";
}
$rResultCnt = sqlsrv_query($conn, $sQueryCnt, array(), array("Scrollable" => SQLSRV_CURSOR_KEYSET));
$iFilteredTotal = sqlsrv_num_rows($rResultCnt);

/* Total data set length */
$sQuery = "
SELECT COUNT(" . $sIndexColumn . ")
FROM $sTable
";
$rResultTotal = sqlsrv_query($conn, $sQuery);
$aResultTotal = sqlsrv_fetch_array($rResultTotal);

$iTotal = $aResultTotal[0];


/* Output */


$output = array(
	"draw" => intval($_POST['draw']),
	"recordsTotal" => $iTotal,
	"recordsFiltered" => $iFilteredTotal,
	"data" => array()
);

$no = $top + 1;
while ($aRow = sqlsrv_fetch_array($rResult)) {
	$row = array();
	for ($i = 0; $i < count($aColumns); $i++) {
		/* General output */
		// $row[$i] = $aRow[ $aColumns[$i] ];
		$row[$aColumns[$i]] = $aRow[$aColumns[$i]];
	}
    $row['tgl_lahir'] = $row['tgl_lahir']->format("d-m-Y");
	$row['no'] = $no++;
	$output['data'][] = $row;
}

echo json_encode($output);