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
          <?php echo anchor(site_url('expedisi/create'), 'Create', 'class="btn btn-primary"'); ?>
          <?php echo anchor(site_url('expedisi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
      <th>Id Exp</th>
      <th>Id Mobil</th>
      <th>Tgl Berangkat</th>
      <th>Action</th>
              </tr>
          </thead>
    <tbody>
          <?php
          $start = 0;
          foreach ($expedisi_data as $expedisi)
          {
              ?>
              <tr>
      <td><?php echo ++$start ?></td>
      <td><?php echo $expedisi->id_exp ?></td>
      <td><?php echo $expedisi->id_mobil ?></td>
      <td><?php echo $expedisi->tgl_berangkat ?></td>
      <td style="text-align:center" width="200px">
    <?php
    echo anchor(site_url('expedisi/read/'.$expedisi->id_expedisi),'Read');
    echo ' | ';
    echo anchor(site_url('expedisi/update/'.$expedisi->id_expedisi),'Update');
    echo ' | ';
    echo anchor(site_url('expedisi/delete/'.$expedisi->id_expedisi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
