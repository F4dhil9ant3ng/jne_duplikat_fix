<?php
	//membuat koneksi ke system MySQL
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "marco";
	error_reporting(0);
	$koneksi = mysql_connect($host,$user,$pass);
	if(!$koneksi) {
		echo "Gagal menghubungkan ke Server!";
		mysql_error();
	}
	//membuat koneksi ke database MySQL
	mysql_select_db($db) or die ("Koneksi ke database Gagal!".mysql_error());

?>
