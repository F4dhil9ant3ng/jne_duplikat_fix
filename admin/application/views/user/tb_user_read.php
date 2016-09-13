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
      <table class="table">
    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
    <tr><td>Password</td><td><?php echo $password; ?></td></tr>
    <tr><td>Level</td><td><?php echo $level; ?></td></tr>
    <tr><td></td><td><a href="<?php echo site_url('user') ?>" class="btn btn-default">Cancel</a></td></tr>
</table>
    </div>
  </div>
</div>
