<div class="container-fluid">
  <div class="page-header" style="margin-top: 60px;">
    <div class="row" style="margin-top: 8px">
      <div class="col-md-4">
          <h2 style="margin-top:0px"><?php echo $title_page ?></h2>
      </div>
      <div class="col-md-4 text-center">
          <div style="margin-top: 4px"  id="message">
              <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
          </div>
      </div>
      <div class="col-md-4 text-right">
          <?php echo anchor(site_url('tracking/create'), 'Create', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('tracking/excel'), 'Excel', 'class="btn btn-primary"'); ?>
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
      <th>Id Barang</th>
      <th>Status</th>
      <th>Action</th>
              </tr>
          </thead>
    <tbody>
          <?php
          $start = 0;
          foreach ($tracking_data as $tracking)
          {
              ?>
              <tr>
      <td><?php echo ++$start ?></td>
      <td><?php echo $tracking->id_exp ?></td>
      <td><?php echo $tracking->id_barang ?></td>
      <td><?php echo $tracking->status ?></td>
      <td style="text-align:center" width="200px">
    <?php
    echo anchor(site_url('tracking/read/'.$tracking->id_tracking),'Read');
    echo ' | ';
    echo anchor(site_url('tracking/update/'.$tracking->id_tracking),'Update');
    echo ' | ';
    echo anchor(site_url('tracking/delete/'.$tracking->id_tracking),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
