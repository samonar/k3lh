<div class="row">
<?php
foreach ($setoran_data->result() as $pos) { ?>
  <div class="col-md-3 col-sm-6 col-12">
    <div class="info-box bg-info">
      <span class="info-box-icon"><i class="fa fa-bookmark"></i></span>

      <div class="info-box-content">
      <a href="<?php echo site_url('setoran/anggota_pos/'.$pos->id_pos) ?>" class="small-box-footer">
        <span class="info-box-text">Pos <?php echo $pos->nm_pos ?></span>
        <span class="info-box-number"></span>
        <span class="progress-description">
        Masukkan Setoran <i class="fa fa-arrow-circle-right"></i>
        </span>
        </a>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
<?php }
?>
</div>