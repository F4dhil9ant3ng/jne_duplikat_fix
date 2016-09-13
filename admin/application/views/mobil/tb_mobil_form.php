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
          <label for="varchar">Id Nopol <?php echo form_error('id_nopol') ?></label>
          <input type="text" class="form-control" name="id_nopol" id="id_nopol" placeholder="Id Nopol" value="<?php echo $id_nopol; ?>" />
      </div>
    <div class="form-group">
          <label for="varchar">Nama <?php echo form_error('nama') ?></label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
      </div>
    <div class="form-group">
          <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
          <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
      </div>
    <div class="form-group">
          <label for="jenis">Jenis <?php echo form_error('jenis') ?></label>
          <textarea class="form-control" rows="3" name="jenis" id="jenis" placeholder="Jenis"><?php echo $jenis; ?></textarea>
      </div>
    <input type="hidden" name="id_mobil" value="<?php echo $id_mobil; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('mobil') ?>" class="btn btn-default">Cancel</a>
</form>
    </div>
  </div>
</div>
