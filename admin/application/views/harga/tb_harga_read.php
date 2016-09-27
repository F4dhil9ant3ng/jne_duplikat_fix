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
        <h2 style="margin-top:0px">Tb_harga Read</h2>
        <table class="table">
	    <tr><td>Id Asal</td><td><?php echo $id_asal; ?></td></tr>
	    <tr><td>Id Tujuan</td><td><?php echo $id_tujuan; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
	    <tr><td>Paket</td><td><?php echo $paket; ?></td></tr>
	    <tr><td>Estimasi</td><td><?php echo $estimasi; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('harga') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>