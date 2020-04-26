<form action="<?php echo site_url('identifikasi/penilaian_action') ?>" method="post">
<table class="table table-striped table-bordered " id="example2" >
  <thead>
    <th>No</th>
    <th>Bagian</th>
    <th>Sumber</th>
    <th>Bahaya</th>
    <th style="width: 76px;">likelihood</th>
    <th style="width: 76px;">severity</th>
  </thead>
  <tbody>
  <?php
  $no=1;
  foreach ($bahaya_pilih as $data) {?>
  <tr>
    <td><?php echo $no ?></td>
    <td><?php echo $data->nm_bagian ?></td>
    <td><?php echo $data->nm_sumber ?></td>
    <td><?php echo $data->nm_bahaya ?></td>
    <input type="hidden" name="id<?php echo $no ?>" value="<?php echo $data->id_identifikasi?>">
    <td style="width: 76px;"><input class="form-control" type="text" value="" name="li<?php echo $no?>" id=""></td>
    <td style="width: 76px;"><input class="form-control"  type="text" value="" name="se<?php echo $no++?>" id=""></td>
  </tr>
  <?php }
  ?>
  </tbody>
</table>
<input type="hidden" name="id_proyek" value="<?php echo $id_proyek ?>">
<br>
<button class="btn btn-primary" type="submit">simpan</button>
</form>