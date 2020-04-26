<a href="proyek/create" class="btn btn-primary">Tambah Proyek</a> <br><br>
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
    echo anchor(site_url('proyek/update/'.$proyek->id_proyek),'Update'); 
    echo ' | '; 
    echo anchor(site_url('proyek/delete/'.$proyek->id_proyek),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
    ?>
</td>
</tr>
    <?php
}
?>
</table>
