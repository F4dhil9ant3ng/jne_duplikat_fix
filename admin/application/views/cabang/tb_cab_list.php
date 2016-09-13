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
          <?php echo anchor(site_url('cabang/create'), 'Create', 'class="btn btn-primary"'); ?>
      <?php echo anchor(site_url('cabang/excel'), 'Excel', 'class="btn btn-primary"'); ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
      <th>Id Cabang</th>
      <th>Kota</th>
      <th>Action</th>
              </tr>
          </thead>
    <tbody>
          <?php
          $start = 0;
          foreach ($cabang_data as $cabang)
          {
              ?>
              <tr>
      <td><?php echo ++$start ?></td>
      <td><?php echo $cabang->id_cabang ?></td>
      <td><?php echo $cabang->kota ?></td>
      <td style="text-align:center" width="200px">
    <?php
    echo anchor(site_url('cabang/read/'.$cabang->id),'Read');
    echo ' | ';
    echo anchor(site_url('cabang/update/'.$cabang->id),'Update');
    echo ' | ';
    echo anchor(site_url('cabang/delete/'.$cabang->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
