<form action="<?php echo site_url('identifikasi/penilaian_action') ?>" method="post">
<table class="table table-striped table-bordered " id="example2" >
  <thead>
    <th>No</th>
    <th style="width: 150px;">Kegiatan</th>
    <th>Kemungkinan Bahaya</th>
    <th style="width: 76px;">likelihood</th>
    <th style="width: 76px;">severity</th>
    <th>Tingkat Resiko</th>
  </thead>
  <tbody>
  <?php
  $no=1;
  foreach ($bahaya_pilih as $data) {?>
  <tr>
    <td><?php echo $no++?></td>
    <td><?php echo $data->nm_sumber ?></td>
    <td><?php echo $data->nm_bahaya ?></td>
    <input type="hidden" name="id<?php echo $no ?>" value="<?php echo $data->id_identifikasi?>">
    <td><?php echo $data->likelihood?></td>
    <td><?php echo $data->severity ?></td>
    <td><?php if (($data->likelihood*$data->severity) >= 12) {
      echo "Tinggi";
    }elseif (($data->likelihood*$data->severity) >=5) {
      echo "Sedang";
    }else {
      echo "Rendah";
    } ?> </td>
  </tr>
  <?php }
  ?>
  </tbody>
</table>
<input type="hidden" name="id_proyek" value="<?php echo $id_proyek ?>">
<br>
<button class="btn btn-primary" type="submit">simpan</button>
</form>