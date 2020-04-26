<a href="<?php echo site_url('sadur/setok_baru') ?>">
<button class="btn btn-primary">Pakan Baru Masuk</button>
</a>

<a href="<?php echo site_url('sadur/pakai_sadur') ?>">
    <button class="btn btn-success">Pakai Sadur</button>
</a><br><br>
<table id="example1" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width: 10px; text-align:center;">No</th>
            <th style="text-align: center">Bahan Baku</th>
            <th style="text-align:center;">Stok lama</th>
            <th style="text-align:center;">Stok Baru</th>
            <th style="text-align:center;">Jumlah Stok</th>
            <th style="text-align:center;">Pakai Sadur</th>
            <th style="text-align:center;">Sisa Stok</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $start=1;
    foreach ($bahan_baku as $bahan) { ?>
        <tr>
            <td style="text-align:center;"><?php echo $start++ ?></td>
            <td style="text-align:center;"><?php echo $bahan->nama_bahan?></td>
            <td style="text-align:center;"><?php if(isset($stok_lama[$bahan->id_bahan]->stok_lama)){
            echo $stok_lama[$bahan->id_bahan]->stok_lama -  $pakai_lama[$bahan->id_bahan]->pakai_lama;
            }?></td>
            <td style="text-align:center;"><?php if(isset($stok_baru[$bahan->id_bahan]->stok_baru) ){
            echo $stok_baru[$bahan->id_bahan]->stok_baru;
            }else {
                echo 0;
            } ?></td>
            <td style="text-align:center;"><?php 
            if(empty($stok_baru[$bahan->id_bahan]->stok_baru)){
                $sum_baru=0;
                echo ($stok_lama[$bahan->id_bahan]->stok_lama + $sum_baru) - $pakai_lama[$bahan->id_bahan]->pakai_lama ;
            }else {
                $sum_baru=$stok_baru[$bahan->id_bahan]->stok_baru;
                echo ($stok_lama[$bahan->id_bahan]->stok_lama + $sum_baru) - $pakai_lama[$bahan->id_bahan]->pakai_lama ;
            } ?></td>
            <td style="text-align:center;"><?php if(isset($pakai_baru[$bahan->id_bahan]->pakai_baru) ){
            echo $pakai_baru[$bahan->id_bahan]->pakai_baru;
            }else {
                echo 0;
            } ?></td>
            <th style="text-align:center;"><?php 
            if (empty($pakai_baru[$bahan->id_bahan]->pakai_baru)) {
                $sum_pakaibaru=0;
                $sum_baru=0;
                echo ($stok_lama[$bahan->id_bahan]->stok_lama +  $sum_baru) - ($pakai_lama[$bahan->id_bahan]->pakai_lama + $sum_pakaibaru) ;
            }else {
                $sum_pakaibaru=$pakai_baru[$bahan->id_bahan]->pakai_baru;
                $sum_baru=$stok_baru[$bahan->id_bahan]->stok_baru;
                echo ($stok_lama[$bahan->id_bahan]->stok_lama +  $sum_baru) - ($pakai_lama[$bahan->id_bahan]->pakai_lama + $sum_pakaibaru) ;
            }?> </th>
        </tr>
    <?php } ?>
        
    </tbody>
</table>
