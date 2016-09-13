<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tb_barang Read</h2>
        <table class="table">
	    <tr><td>Awb</td><td><?php echo $awb; ?></td></tr>
	    <tr><td>Id Expedisi</td><td><?php echo $id_expedisi; ?></td></tr>
	    <tr><td>Nama Barang</td><td><?php echo $nama_barang; ?></td></tr>
	    <tr><td>Pengirim</td><td><?php echo $pengirim; ?></td></tr>
	    <tr><td>Tujuan</td><td><?php echo $tujuan; ?></td></tr>
	    <tr><td>Penerima</td><td><?php echo $penerima; ?></td></tr>
	    <tr><td>Alamat Penerima</td><td><?php echo $alamat_penerima; ?></td></tr>
	    <tr><td>Jenis</td><td><?php echo $jenis; ?></td></tr>
	    <tr><td>Berat</td><td><?php echo $Berat; ?></td></tr>
	    <tr><td>Colly</td><td><?php echo $colly; ?></td></tr>
	    <tr><td>Tgl Kirim</td><td><?php echo $tgl_kirim; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>