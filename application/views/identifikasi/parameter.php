<form action="<?php echo site_url('identifikasi/parameter_simpan') ?>" method="post">
<?php 
$count_bagian= count($bagian);
$count_sumber=count($sumber);
$count_bahaya=count($bahaya);
for ($i=0; $i < $count_bagian ; $i++) {?> 
  <h5><?php  echo $bagian[$i]->nm_bagian ?></h5>
   <?php
    for ($j=0; $j < $count_sumber ; $j++) { 
        if ($bagian[$i]->id_bagian==$sumber[$j]->id_bagian) {
          ?> 
          <h6><?php  echo '&nbsp; - '.$sumber[$j]->nm_sumber ?></h6>
          <?php
            for ($k=0; $k < $count_bahaya ; $k++) { 
                if ($sumber[$j]->id_sumber== $bahaya[$k]->id_sumber) {?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="B<?php echo $k?>" value="<?php echo $bahaya[$k]->id_bahaya ?>">
                  <label class="form-check-label"><?php echo  $bahaya[$k]->nm_bahaya ?></label>
                </div>
                <?php }
            }
          
        }
        
    }
}?>
<input type="hidden" name="id_proyek" value="<?php echo $proyek->id_proyek ?>">
<br>
<button class="btn btn-primary" type="submit">simpan</button>
</form>