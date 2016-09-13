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
      <form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
          <label for="int">Asal <?php echo form_error('asal') ?></label>
          <input type="text" class="form-control" name="asal" id="asal" placeholder="Asal" value="<?php echo $asal; ?>" />
      </div>
    <div class="form-group">
          <label for="int">Tujuan <?php echo form_error('tujuan') ?></label>
          <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" value="<?php echo $tujuan; ?>" />
      </div>
    <div class="form-group">
          <label for="varchar">Kode Expedisi <?php echo form_error('kode_expedisi') ?></label>
          <input type="text" class="form-control" name="kode_expedisi" id="kode_expedisi" placeholder="Kode Expedisi" value="<?php echo $kode_expedisi; ?>" />
      </div>
    <input type="hidden" name="id_antar" value="<?php echo $id_antar; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('exp') ?>" class="btn btn-default">Cancel</a>
</form>
    </div>
  </div>
</div>
