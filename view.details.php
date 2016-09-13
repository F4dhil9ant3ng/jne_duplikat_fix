<?php
include "include/koneksi.php";

$awb = mysql_escape_string($_GET['awb']);
$query = "SELECT * FROM view_detail where awb='$awb'";
$data = $_POST;
$datax = array();
$datax_r = array();
$sql = mysql_query($query) or die($query);
while ($row = mysql_fetch_row($sql)) {
  $datax['awb'] = $row[0];
  $datax['mobil'] = $row[1];
  $datax['berangkat'] = $row[2];
  $datax['barang'] = $row[3];
  $datax['pengirim'] = $row[4];
  $datax['penerima'] = $row[5];
  $datax['alamat_tujuan'] = $row[6];
  $datax['jenis'] = $row[7];
  $datax['berat'] = $row[8];
  $datax['tgl_kirim'] = $row[9];
  $datax['deskripsi'] = $row[10];
  $datax['kota_tujuan'] = $row[11];
  array_push($datax_r, $datax);
}
$data = $datax_r;
?>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/typeahead.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>
</head>
<body>
  <nav class="navbar navbar-default" role="navigation">
  	<div class="navbar-header">
  		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
  			 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
  		</button> <a class="navbar-brand" href="#">CV. Mulya Gemilang</a>
  	</div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="carousel slide" id="carousel-459015">
          <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#carousel-459015">
            </li>
            <li data-slide-to="1" data-target="#carousel-459015">
            </li>
            <li data-slide-to="2" data-target="#carousel-459015">
            </li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img alt="Carousel Bootstrap First" src="img/1.png" />
              <div class="carousel-caption">

              </div>
            </div>
            <div class="item">
              <img alt="Carousel Bootstrap Second" src="img/2.png" />
              <div class="carousel-caption">

              </div>
            </div>
            <div class="item">
              <img alt="Carousel Bootstrap Third" src="img/3.png" />
              <div class="carousel-caption">
                <h4>
                  PRODUCT & SERVICE
                </h4>
                <p>
                  Didukung oleh sumber daya yang berpengalaman, CV. Mulya Gemilang, memperkenalkan Anda ke layanan pindah ke sebuah pengalaman menarik.
                </p>
              </div>
            </div>
            <div class="item">
              <img alt="Carousel Bootstrap Third" src="img/4.png" />
              <div class="carousel-caption">
                <h4>

                </h4>
                <p>

                </p>
              </div>
            </div>
            <div class="item">
              <img alt="Carousel Bootstrap Third" src="img/5.png" />
              <div class="carousel-caption">
                <h4>
                  TRANSPORTATION
                </h4>
                <p>
                  CV. Mulya Gemilang merupakan transportasi darat yang dilengkapi dengan Sistem Manajemen Armada untuk menunjang Proses Pengiriman Barang ke Seluruh Wilayah Sulawesi Tengah.
                </p>
              </div>
            </div>
          </div> <a class="left carousel-control" href="#carousel-459015" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-459015" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div><br><br><br>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
        foreach ($data as $key => $value) {
          echo json_encode($value);
        }
        ?>
      </div>
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>
                awb
              </th>
              <th>
                id_nopol
              </th>
              <th>
                tgl_berangkat
              </th>
              <th>
                nama_barang
              </th>
              <th>
                pengirim
              </th>
              <th>
                penerima
              </th>
              <th>
                jenis
              </th>
              <th>
                Berat
              </th>
              <th>
                tgl_kirim
              </th>
              <th>
                deskripsi
              </th>
              <th>
                kota
              </th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
