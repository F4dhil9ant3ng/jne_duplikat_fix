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
        <h2 style="margin-top:0px">Tb_expedisi Read</h2>
        <table class="table">
	    <tr><td>Id Exp</td><td><?php echo $id_exp; ?></td></tr>
	    <tr><td>Id Mobil</td><td><?php echo $id_mobil; ?></td></tr>
	    <tr><td>Tgl Berangkat</td><td><?php echo $tgl_berangkat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('expedisi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>