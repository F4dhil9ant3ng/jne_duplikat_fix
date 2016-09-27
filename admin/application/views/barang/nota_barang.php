<div class="col-md-12">
  <div class="col-md-12">
    <p>
      <h1>J.H TRANS EXPRESS</h1>
    </p>
  </div>
  <table class="laporan">
    <thead>
      <tr>
        <td>Pengirim</td>
        <td>:</td>
        <td><?php echo $data->pengirim ?></td>

        <td>Penerima</td>
        <td>:</td>
        <td><?php echo $data->penerima ?></td>
      </tr>
      <tr>
        <td>AWB</td>
        <td>:</td>
        <td><?php echo $data->awb ?></td>

        <td>Berat</td>
        <td>:</td>
        <td><?php echo $data->Berat ?> KG</td>
      </tr>
      <tr>
        <td>Destination</td>
        <td>:</td>
        <td><?php echo $data->tujuan ?></td>
        <td>Origin</td>
        <td>:</td>
        <td><?php echo $data->asal ?></td>
      </tr>
      <tr>
        <td>Alamat Penerima</td>
        <td>:</td>
        <td colspan="4"><?php echo $data->alamat_penerima ?></td>
      </tr>
      <tr>
        <td>Harga</td>
        <td>:</td>
        <td>Rp.<?php echo $data->harga ?>-,</td>
        <td>Date Manifested</td>
        <td>:</td>
        <td><?php echo $data->tgl_manifes ?></td>
      </tr>
    </thead>
  </table>

  <table class="" width="100%">
    <tbody>
      <tr>
        <td colspan="4" width="60%"></td>
        <?php
          $t=time();
          $date_kok = date("d-m-Y",$t);
        ?>
        <td>Palu, <?php echo $date_kok ?></td>
      </tr>
      <tr>
        <td colspan="4"></td>
        <td><br></td>
      </tr>
      <tr>
        <td colspan="4"></td>
        <td><br></td>
      </tr>
      <tr>
        <td colspan="4"></td>
        <td><u>Shipper Signature</u></td>
      </tr>
    </tbody>
  </table>

</div>
