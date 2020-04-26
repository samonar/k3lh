<table class="table table-bordered " id="example1">
    <thead>
        <th>No</th>
        <th>Nama Proyek</th>
        <th>Alamat</th>
        <th>Tgl</th>
        <th>Action</th>    
    </thead>
</tr><?php
$start=0;
foreach ($proyek_data as $proyek)
{
    ?>
    <tr>
<td width="80px"><?php echo ++$start ?></td>
<td><?php echo $proyek->nm_proyek ?></td>
<td><?php echo $proyek->alamat ?></td>
<td><?php echo $proyek->tgl ?></td>
<td style="text-align:center" width="200px">
    <?php 
    echo anchor(site_url('identifikasi/eval_proyek/'.$proyek->id_proyek),'Evaluasi'); 
    echo '<br>';
    echo anchor(site_url('identifikasi/hslEval_proyek/'.$proyek->id_proyek),'Hasil Evaluasi'); 
    ?>
</td>
</tr>
    <?php
}
?>
</table>
