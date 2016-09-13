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
          <?php echo anchor(site_url('exp/create'), 'Create', 'class="btn btn-primary"'); ?>
      <?php echo anchor(site_url('exp/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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
      <th>Kode Expedisi</th>
      <th>Action</th>
              </tr>
          </thead>
    <tbody>
          <?php
          $start = 0;
          foreach ($exp_data as $exp)
          {
              ?>
              <tr>
      <td><?php echo ++$start ?></td>
      <td><?php echo $exp->asal ?></td>
      <td><?php echo $exp->tujuan ?></td>
      <td><?php echo $exp->kode_expedisi ?></td>
      <td style="text-align:center" width="200px">
    <?php
    echo anchor(site_url('exp/read/'.$exp->id_antar),'Read');
    echo ' | ';
    echo anchor(site_url('exp/update/'.$exp->id_antar),'Update');
    echo ' | ';
    echo anchor(site_url('exp/delete/'.$exp->id_antar),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
