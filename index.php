<?php
  include 'include/koneksi.php';
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
  <style>
.footer-bottom {background:#0000ff;widht:100%; padding:15px 0 15px}
.footer-bottom p {color:#000000;}
.style1 {font-size: 24px}
  .style2 {
	font-weight: bold;
	padding: 6px 12px;
	margin-bottom: 0;
	font-size: 14px;
	line-height: 1.42857143;
	text-align: center;
	white-space: nowrap;
	vertical-align: middle;
	cursor: pointer;
	background-image: none;
	border: 1px solid transparent;
	display: inline-block;
}
  </style>
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">

					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="index.php">CV. Mulya Gemilang Palu</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="admin/">Admin Login</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>

			</nav>
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
          <div class="col-md-6">
            <h1 class="text-primary style1">Tracking Barang Anda</h1>
            <form class="form-horizontal" role="form" method="post" action="act.awb.php?action=cekAwb" id="awb_form">
              <div class="form-group">
                <label for="" class="col-sm-2 control-label">
                  NO. AWB
                </label>
                <div class="col-sm-10">
                  <input type="" class="form-control" id="awb_value" name="awb" />
                </div>
              </div>
            </form>
            <button class="btn btn-success btn-block" id="btn_awb">TRACKING</button>
          </div>
          <div class="col-md-6">
              <h1 class="text-primary style1">Tentang Kami</h1>
              <p align="justify">Konsisten cepat, bertanggung jawab dan dapat diandalkan layanan telah membawa CV. Mulya Gemilang menjadi kredibilitas yang lebih tinggi bagi pelanggan dan mitra.</p>
              <p align="justify">Pertumbuhan bisnis dan gaya hidup evolusi telah memberikan kontribusi dalam meningkatkan permintaan pengiriman barang yang sensitif terhadap waktu. Tidak hanya paket kecil dan ruang lingkup dokumen, tetapi juga dalam menangani transportasi, logistik, dan distribusi.</p>
              <p align="justify">Tim yang ramah, terampil dan professional siap melayani apapun kebutuhan konsumen dengan baik dan sempurna. Kami tidak akan berhenti berinovasi sebelum anda puas, karena kesuksesan diukur dari kesempurnaan kami dalam melayani konsumen.</p>
          </div>
        </div>
      </div>
      <br><br><br>
      <div class="col-md-12">
        <div class="col-md-6">
          <h1 class="text-primary style1">Produk & Service</h1>
          <p align="justify">Kesadaran akan kebutuhan kiriman yang cepat dan efektifitas biaya bagi pelanggan, telah menginspirasi CV. Mulya Gemilang untuk menyediakan berbagai Produk dan Servis, nikmati keunggulan varian produk CV. Mulya Gemilang dalam melayani pengiriman dokumen dan barang ke wilayah di Sulawesi Tengah serta penyampaian tepat waktu sesuai kebutuhan Anda.</p>
        </div>
        <div class="col-md-6">
          <h1 class="text-primary style1">Cek Tarif</h1>
          <form class="form-horizontal" role="form" id="cekTarif" method="post" action="act.tarif.php?action=prosesHarga">
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">KOTA SEKARANG</label>
              <div class="col-sm-10">
                <input type="" class="form-control" id="inSekarang" name="inSekarang" />
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">
                KOTA TUJUAN              </label>
              <div class="col-sm-10">
                <input type="" class="form-control" id="inTujuan" name="inTujuan" />
              </div>
            </div>
            <div class="form-group">
              <label for="" class="col-sm-2 control-label">
                BERAT              </label>
              <div class="col-sm-10">
                <input type="" class="form-control" id="tarif_berat"  name="berat"/>
              </div>
            </div>
          </form>
          <button type="button" class="btn-warning btn-block style2" id="btnCekTarif">
            CEK TARIF          </button>
        </div>
      </div>
  </div>
  <div class="modal fade" id="tarif_dialog" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  	<div class="modal-dialog modal-lg">
  		<div class="modal-content">
  			<div class="modal-header">
  				<h4 class="modal-title" id="myModalLabel">
  					Tarif Ekspedisi
  				</h4>
  			</div>
  			<div class="modal-body">
  				<div class="col-md-12">
            <br>
            <table class="table">
      				<thead>
      					<tr>
      						<th>
      							Origin
      						</th>
                  <th>
      							Destination
      						</th>
      						<th>
      							Harga
      						</th>
      						<th>
      							Paket
      						</th>
      						<th>
      							Estimasi
      						</th>
                  <th>
      							Berat Barang
      						</th>
                  <th>
      							Total Harga
      						</th>
      					</tr>
      				</thead>
      				<tbody id="tarif_data">
      				</tbody>
      			</table>
  				</div>
  			</div>
  			<div class="modal-footer">
  				<button type="button" class="btn btn-default btn-danger btn_close" data-dismiss="modal" id="">
  					Close
  				</button>
  			</div>
  		</div>
  	</div>
  </div>
  <div id="awbModalDialog" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Track Barang</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-12" id="awb_body">
            <br>
            <table class="table">
      				<thead>
      					<tr>
      						<th>
      							Nomor AWB
      						</th>
      						<th>
      							Nama Barang
      						</th>
      						<th>
      							Pengirim
      						</th>
      						<th>
      							Penerima
      						</th>
                  <th>
      							Alamat Tujuan
      						</th>
                  <th>
      							Jenis
      						</th>
                  <th>
      							Status
      						</th>
                  <th>
      							Details
      						</th>
      					</tr>
      				</thead>
      				<tbody>
      					<tr id="awb_data">
      					</tr>
      				</tbody>
      			</table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn_close" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <section>
  <footer>
  <div class="container">
  <div class="row">

  <div class="col-lg-4 col-md-4 col-sm-12">
  <div class="body_3"></div>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-12">
  <div class="body_3"></div>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-12">
  <div class="body_3"></div>
  </div>

  </div></div>
  </footer>
  <div class="footer-bottom">
  <div class="container">
  <div class="row">
  <div class="col-md-4">
  <p><strong>Copyright © 2015-2016 MARCO MARIO LAMEANDA  </strong></p>
  </div>
  </div></div></div>
  </section>
</body>
</html>
