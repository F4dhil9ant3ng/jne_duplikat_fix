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
          <?php echo anchor(site_url('kariawan/create'), 'Create', 'class="btn btn-primary"'); ?>
      <?php echo anchor(site_url('kariawan/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>Action</th>
              </tr>
          </thead>
    <tbody>
          <?php
          $start = 0;
          foreach ($kariawan_data as $kariawan)
          {
              ?>
              <tr>
      <td><?php echo ++$start ?></td>
      <td><?php echo $kariawan->nama ?></td>
      <td><?php echo $kariawan->jabatan ?></td>
      <td style="text-align:center" width="200px">
    <?php
    echo anchor(site_url('kariawan/read/'.$kariawan->id_kariawan),'Read');
    echo ' | ';
    echo anchor(site_url('kariawan/update/'.$kariawan->id_kariawan),'Update');
    echo ' | ';
    echo anchor(site_url('kariawan/delete/'.$kariawan->id_kariawan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
