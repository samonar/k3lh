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
    echo anchor(site_url('identifikasi/parameter/'.$proyek->id_proyek),'Update'); 
    echo '<br>'; 
    echo anchor(site_url('identifikasi/penilaian/'.$proyek->id_proyek),'nilai & eval'); 
    echo '<br>'; 
    echo anchor(site_url('identifikasi/hasil/'.$proyek->id_proyek),'Hasil'); 
    ?>
</td>
</tr>
    <?php
}
?>
</table>
