<div class="container-fluid">
  <div class="page-header" style="margin-top: 60px;">
    <div class="row" style="margin-top: 8px">
      <div class="col-md-4">
          <h3><?php echo $title_page ?></h3>
      </div>
      <div class="col-md-4 text-center">
          <div style="margin-top: 4px"  id="message">
              <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          </div>
      </div>
      <div class="col-md-4 text-right">
          <?php echo anchor(site_url('barang/create'), 'Create', 'class="btn btn-primary"'); ?>
          <?php echo anchor(site_url('barang/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
      <th>Awb</th>
      <th>Id Expedisi</th>
      <th>Nama Barang</th>
      <th>Pengirim</th>
      <th>Asal</th>
      <th>Tujuan</th>
      <th>Penerima</th>
      <th>Alamat Penerima</th>
      <th>Harga</th>
      <th>Action</th>
              </tr>
          </thead>
    <tbody>
          <?php
          $start = 0;
          foreach ($barang_data as $barang)
          {
              ?>
              <tr>
      <td><?php echo ++$start ?></td>
      <td><?php echo $barang->awb ?></td>
      <td><?php echo $barang->id_expedisi ?></td>
      <td><?php echo $barang->nama_barang ?></td>
      <td><?php echo $barang->pengirim ?></td>
      <td><?php echo $barang->asal ?></td>
      <td><?php echo $barang->tujuan ?></td>
      <td><?php echo $barang->penerima ?></td>
      <td><?php echo $barang->alamat_penerima ?></td>
      <td><?php echo $barang->harga ?></td>
      <td style="text-align:center" width="200px">
    <?php
    echo anchor(site_url('barang/read/'.$barang->id_barang),'Read');
    echo ' | ';
    echo anchor(site_url('barang/update/'.$barang->id_barang),'Update');
    echo ' | ';
    echo anchor(site_url('barang/delete/'.$barang->id_barang),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
    echo ' | ';
    echo anchor(site_url('barang/cetak_nota/'.$barang->id_barang),'Nota','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
