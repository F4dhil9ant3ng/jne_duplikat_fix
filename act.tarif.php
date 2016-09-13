<?php
include "include/koneksi.php";

if (isset($_GET['action']) && $_GET['action'] == 'cekTarif') {
	$query = "";
	$data = $_POST;
	$datax = array();
	$datax_r = array();
	$sql = mysql_query($query) or die($query);
	while ($row = mysql_fetch_row($sql)) {
		$datax[''] = $row[0];
		array_push($datax_r, $datax);
	}
	$data = $datax_r;
	echo json_encode($data);
exit;
}

else if (isset($_GET['action']) && $_GET['action'] == 'cekKota') {
	$query = "select kota from tb_cab";
	$data = $_POST;
	$datax = array();
	$datax_r = array();
	$sql = mysql_query($query) or die($query);
	while ($row = mysql_fetch_row($sql)) {
		$datax = $row[0];
		array_push($datax_r, $datax);
	}
	$data = $datax_r;
	echo json_encode($data);
exit;
}

else if (isset($_GET['action']) && $_GET['action'] == 'prosesHarga') {
	$tujuan = mysql_escape_string($_POST['inTujuan']);
	$sekarang = mysql_escape_string($_POST['inSekarang']);
	$berat = mysql_escape_string($_POST['berat']);
	$paket = mysql_escape_string($_POST['jenis']);

	$query = "SELECT * FROM view_harga where kota='$tujuan'";
	$data = $_POST;
	$datax = array();
	$datax_r = array();
	$sql = mysql_query($query) or die($query);
	while ($row = mysql_fetch_row($sql)) {
		$datax['tujuan'] = $row[0];
		$datax['harga'] = $row[1];
		$datax['paket'] = $row[2];
		$datax['estimasi'] = $row[3];
		array_push($datax_r, $datax);
	}
	$data = $datax_r;
	echo json_encode($data);
exit;
}

?>
