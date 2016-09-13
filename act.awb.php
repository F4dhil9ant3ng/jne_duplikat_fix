<?php
include "include/koneksi.php";

$awb = mysql_escape_string($_POST['awb']);

if (isset($_GET['action']) && $_GET['action'] == 'cekAwb') {
  $query = "SELECT * FROM track_view where awb='$awb'";
	$data = $_POST;
	$datax = array();
	$datax_r = array();
	$sql = mysql_query($query) or die($query);
	while ($row = mysql_fetch_row($sql)) {
    $datax['awb'] = $row[0];
    $datax['barang'] = $row[1];
    $datax['pengirim'] = $row[2];
    $datax['penerima'] = $row[3];
    $datax['alamat'] = $row[4];
    $datax['jenis'] = $row[5];
    $datax['status'] = $row[6];
		$datax['tujuan'] = $row[7];
		array_push($datax_r, $datax);
	}
	$data = $datax_r;
	echo json_encode($data);
exit;
}

else if (isset($_GET['action']) && $_GET['action'] == '_') {

exit;
}

?>
