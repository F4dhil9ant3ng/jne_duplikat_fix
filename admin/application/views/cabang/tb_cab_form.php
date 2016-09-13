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
          <label for="int">Id Cabang <?php echo form_error('id_cabang') ?></label>
          <input type="text" class="form-control" name="id_cabang" id="id_cabang" placeholder="Id Cabang" value="<?php echo $id_cabang; ?>" />
      </div>
    <div class="form-group">
          <label for="varchar">Kota <?php echo form_error('kota') ?></label>
          <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
      </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('cabang') ?>" class="btn btn-default">Cancel</a>
</form>
    </div>
  </div>
</div>
