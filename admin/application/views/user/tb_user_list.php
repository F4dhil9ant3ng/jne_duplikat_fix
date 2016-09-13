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
          <?php echo anchor(site_url('user/create'), 'Create', 'class="btn btn-primary"'); ?>
        <?php echo anchor(site_url('user/excel'), 'Excel', 'class="btn btn-primary"'); ?>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-striped" id="mytable">
          <thead>
              <tr>
                  <th width="80px">No</th>
      <th>Username</th>
      <th>Password</th>
      <th>Level</th>
      <th>Action</th>
              </tr>
          </thead>
    <tbody>
          <?php
          $start = 0;
          foreach ($user_data as $user)
          {
              ?>
              <tr>
      <td><?php echo ++$start ?></td>
      <td><?php echo $user->username ?></td>
      <td><?php echo $user->password ?></td>
      <td><?php echo $user->level ?></td>
      <td style="text-align:center" width="200px">
    <?php
    echo anchor(site_url('user/read/'.$user->id_user),'Read');
    echo ' | ';
    echo anchor(site_url('user/update/'.$user->id_user),'Update');
    echo ' | ';
    echo anchor(site_url('user/delete/'.$user->id_user),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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
