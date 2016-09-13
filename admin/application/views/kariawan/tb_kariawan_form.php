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
          <label for="varchar">Nama <?php echo form_error('nama') ?></label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
      </div>
    <div class="form-group">
          <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
          <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
      </div>
    <input type="hidden" name="id_kariawan" value="<?php echo $id_kariawan; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('kariawan') ?>" class="btn btn-default">Cancel</a>
</form>
    </div>
  </div>
</div>
