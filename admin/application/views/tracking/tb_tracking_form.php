<div class="container-fluid">
  <div class="page-header" style="margin-top: 60px;">
    <div class="row" style="margin-top: 8px">
      <div class="row" style="margin-top: 8px">
        <div class="col-md-12">
            <h3><?php echo $title_page ?></h3>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
          <label for="int">Tujuan Expedisi <?php echo form_error('id_exp') ?></label>
          <select class="form-control select2" name="id_exp" id="id_exp"></select>
        </div>
    <div class="form-group">
          <label for="int">Id Barang <?php echo form_error('id_barang') ?></label>
          <select class="form-control select2" name="id_barang" id="id_barang"></select>
      </div>
    <div class="form-group">
          <label for="enum">Status <?php echo form_error('status') ?></label>
          <select class="form-control" name="status" id="status">
            <option >--Status--</option>
            <option value="Manifested">Manifested</option>
            <option value="Transit">Transit</option>
            <option value="Sampai">Sampai</option>
          </select>
      </div>
    <input type="hidden" name="id_tracking" value="<?php echo $id_tracking; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('tracking') ?>" class="btn btn-default">Cancel</a>
</form>
    </div>
  </div>
</div>
