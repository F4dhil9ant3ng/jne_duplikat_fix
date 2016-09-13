<div class="container-fluid">
  <div class="page-header" style="margin-top: 60px;">
    <div class="row" style="margin-top: 8px">
      <div class="col-md-12">
          <h3><?php echo $title_page ?></h3>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <tr><td>Id Tujuan</td><td><?php echo $id_tujuan; ?></td></tr>
        <tr><td>Harga</td><td><?php echo $harga; ?></td></tr>
        <tr><td>Paket</td><td><?php echo $paket; ?></td></tr>
        <tr><td>Estimasi</td><td><?php echo $estimasi; ?></td></tr>
        <tr><td></td><td><a href="<?php echo site_url('harga') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
    </div>
  </div>
</div>
