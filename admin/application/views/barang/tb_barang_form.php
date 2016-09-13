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
              <label for="int">Awb <?php echo form_error('awb') ?></label>
              <input type="text" class="form-control" name="awb" id="awb" placeholder="Awb" value="<?php echo $awb; ?>" />
          </div>
        <div class="form-group">
              <label for="int">Mobil Ekspedisi <?php echo form_error('id_expedisi') ?></label>
              <select class="form-control" name="id_expedisi" id="id_expedisi">
                <option>--- Pilih Tujuan ---</option>
                <?php foreach ($dataMobilExp as $key): ?>
                  <option value="<?php echo $key->id_expedisi ?>"><?php echo $key->id_mobil ?> | Kode EXP : <?php echo $key->id_exp ?></option>
                <?php endforeach; ?>
              </select>
          </div>
        <div class="form-group">
              <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
              <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
          </div>
        <div class="form-group">
              <label for="varchar">Pengirim <?php echo form_error('pengirim') ?></label>
              <input type="text" class="form-control" name="pengirim" id="pengirim" placeholder="Pengirim" value="<?php echo $pengirim; ?>" />
          </div>
        <div class="form-group">
              <label for="int">Tujuan <?php echo form_error('tujuan') ?></label>
              <select class="form-control" name="tujuan" id="tujuan">
                <option>--- Pilih Tujuan ---</option>
                <?php foreach ($data_cabang as $key): ?>
                  <option value="<?php echo $key->id_cabang ?>"><?php echo $key->kota ?></option>
                <?php endforeach; ?>
              </select>
          </div>
        <div class="form-group">
              <label for="varchar">Penerima <?php echo form_error('penerima') ?></label>
              <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Penerima" value="<?php echo $penerima; ?>" />
          </div>
        <div class="form-group">
              <label for="alamat_penerima">Alamat Penerima <?php echo form_error('alamat_penerima') ?></label>
              <textarea class="form-control" rows="3" name="alamat_penerima" id="alamat_penerima" placeholder="Alamat Penerima"><?php echo $alamat_penerima; ?></textarea>
          </div>
        <div class="form-group">
              <label for="enum">Jenis <?php echo form_error('jenis') ?></label>
              <select class="form-control" name="jenis" id="jenis">
                <option value="Doc">Dokumen</option>
                <option value="Paket">Paket</option>
              </select>
          </div>
        <div class="form-group">
              <label for="int">Berat <?php echo form_error('Berat') ?></label>
              <input type="text" class="form-control" name="Berat" id="Berat" placeholder="Berat" value="<?php echo $Berat; ?>" />
          </div>
        <div class="form-group">
              <label for="int">Colly <?php echo form_error('colly') ?></label>
              <input type="text" class="form-control" name="colly" id="colly" placeholder="Colly" value="<?php echo $colly; ?>" />
          </div>
        <div class="form-group">
              <label for="datetime">Tgl Kirim <?php echo form_error('tgl_kirim') ?></label>
              <input type="text" class="form-control" name="tgl_kirim" id="tgl_kirim" placeholder="Tgl Kirim" value="<?php echo $tgl_kirim; ?>" />
          </div>
        <div class="form-group">
              <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
              <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
          </div>
        <div class="form-group">
              <label for="varchar">Harga <?php echo form_error('harga') ?></label>
              <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
          </div>
        <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
      </form>
    </div>
  </div>
</div>
