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
          <label for="int">Id Asal <?php echo form_error('id_asal') ?></label>
          <!-- <input type="text" class="form-control" name="id_asal" id="id_asal" placeholder="Id Asal" value="<?php echo $id_asal; ?>" /> -->
          <select class="form-control" name="id_asal" id="id_asal" >
            <option value="">---- SELECT ONE DATA ----</option>
            <?php foreach ($cabang as $key ): ?>
              <option value="<?php echo $key->id_cabang ?>"><?php echo $key->id_cabang." | ".$key->kota ?></option>
            <?php endforeach; ?>
          </select>
      </div>
    <div class="form-group">
          <label for="int">Id Tujuan <?php echo form_error('id_tujuan') ?></label>
          <!-- <input type="text" class="form-control" name="id_tujuan" id="id_tujuan" placeholder="Id Tujuan" value="<?php echo $id_tujuan; ?>" /> -->

          <select class="form-control" name="id_tujuan" id="id_tujuan" >
            <option value="">---- SELECT ONE DATA ----</option>
            <?php foreach ($cabang as $key ): ?>
              <option value="<?php echo $key->id_cabang ?>"><?php echo $key->id_cabang." | ".$key->kota ?></option>
            <?php endforeach; ?>
          </select>
      </div>
    <div class="form-group">
          <label for="varchar">Harga <?php echo form_error('harga') ?></label>
          <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
      </div>
    <div class="form-group">
          <label for="enum">Paket <?php echo form_error('paket') ?></label>
          <select class="form-control" name="paket" id="paket">
            <option value="paket">Paket</option>
            <option value="dokumen">Dokumen</option>
            <option value="colly">Colly</option>
          </select>
      </div>
    <div class="form-group">
          <label for="estimasi">Estimasi <?php echo form_error('estimasi') ?></label>
          <textarea class="form-control" rows="3" name="estimasi" id="estimasi" placeholder="Estimasi"><?php echo $estimasi; ?></textarea>
      </div>
    <input type="hidden" name="id_harga" value="<?php echo $id_harga; ?>" />
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
    <a href="<?php echo site_url('harga') ?>" class="btn btn-default">Cancel</a>
</form>
    </div>
  </div>
</div>
