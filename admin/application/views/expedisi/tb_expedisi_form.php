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
          <label for="varchar">Tujuan EXP <?php echo form_error('id_exp') ?></label>
          <select class="form-control" name="id_exp" id="id_exp">
            <option>--- Pilih Tujuan ---</option>
            <?php foreach ($dataMobilExp as $key): ?>
              <option value="<?php echo $key->kode_expedisi ?>"><?php echo $key->kode_expedisi ?> | Asal EXP : <?php echo $key->asal ?> | Tujuan : <?php echo $key->tujuan ?></option>
            <?php endforeach; ?>
          </select>
      </div>
    <div class="form-group">
          <label for="varchar">Id Mobil <?php echo form_error('id_mobil') ?></label>``
          <select class="form-control" name="id_mobil" id="id_mobil" >
            <option>--- Pilih Mobil ---</option>
            <?php foreach ($dataMobil as $key): ?>
              <option value="<?php echo $key->id_nopol ?>"><?php echo $key->id_nopol ?> | SUPIR : <?php echo $key->nama ?></option>
            <?php endforeach; ?>
          </select>
      </div>
    <div class="form-group">
          <label for="date">Tgl Berangkat <?php echo form_error('tgl_berangkat') ?></label>
          <input type="text" class="form-control datepicker" name="tgl_berangkat" id="tgl_berangkat" placeholder="Tgl Berangkat" value="<?php echo $tgl_berangkat; ?>" />
      </div>
    <input type="hidden" name="id_expedisi" value="<?php echo $id_expedisi; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('expedisi') ?>" class="btn btn-default">Cancel</a>
</form>
    </div>
  </div>
</div>
