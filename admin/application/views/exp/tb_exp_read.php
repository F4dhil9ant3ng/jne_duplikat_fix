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
          <tr><td>Asal</td><td><?php echo $asal; ?></td></tr>
          <tr><td>Tujuan</td><td><?php echo $tujuan; ?></td></tr>
          <tr><td>Kode Expedisi</td><td><?php echo $kode_expedisi; ?></td></tr>
          <tr><td></td><td><a href="<?php echo site_url('exp') ?>" class="btn btn-default">Cancel</a></td></tr>
      </table>
    </div>
  </div>
</div>
