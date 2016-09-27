<div class="container-fluid">
  <div class="page-header" style="margin-top: 60px;">
    <div class="row" style="margin-top: 10px">
      <div class="col-md-4">
          <h3><?php echo $title_page ?></h3>
      </div>
      <div class="col-md-4 text-center">
          <div style="margin-top: 4px"  id="message">
              <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          </div>
      </div>
      <div class="col-md-4 text-right">
        <?php echo anchor(site_url('harga/create'), 'Create', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('harga/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
      <th>Asal</th>
      <th>Tujuan</th>
      <th>Harga</th>
      <th>Paket</th>
      <th>Estimasi</th>
      <th>Action</th>
              </tr>
          </thead>
    <tbody>
          <?php
          $start = 0;
          foreach ($harga_data as $harga)
          {
              ?>
              <tr>
      <td><?php echo ++$start ?></td>
      <td><?php echo $harga->kota_asal ?></td>
      <td><?php echo $harga->kota_tujuan ?></td>
      <td><?php echo $harga->harga ?></td>
      <td><?php echo $harga->paket ?></td>
      <td><?php echo $harga->estimasi ?></td>
      <td style="text-align:center" width="200px">
    <?php
    echo anchor(site_url('harga/read/'.$harga->id_harga),'Read');
    echo ' | ';
    echo anchor(site_url('harga/update/'.$harga->id_harga),'Update');
    echo ' | ';
    echo anchor(site_url('harga/delete/'.$harga->id_harga),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
    ?>
      </td>
        </tr>
              <?php
          }
          ?>
          </tbody>
      </table>
    </div>
  </div>
</div>
