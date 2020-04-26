<a href="sumber/create" class="btn btn-primary">Tambah</a><br><br>
<table class="table table-bordered" id="example1">
    <thead>
    <th>No</th>
    <th>Pekerjaan Bagian</th>
    <th>Sumber bahaya</th>
    <th>Action</th>
    </thead>
    <?php
    $start=0;
    foreach ($sumber_data as $sumber)
    {
        ?>
        <tr>
    <td width="80px"><?php echo ++$start ?></td>
    <td><?php echo $sumber->nm_bagian ?></td>
    <td><?php echo $sumber->nm_sumber ?></td>
    <td style="text-align:center" width="200px">
        <?php 
        echo anchor(site_url('sumber/read/'.$sumber->id_sumber),'Read'); 
        echo ' | '; 
        echo anchor(site_url('sumber/update/'.$sumber->id_sumber),'Update'); 
        echo ' | '; 
        echo anchor(site_url('sumber/delete/'.$sumber->id_sumber),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
        ?>
    </td>
    </tr>
        <?php
    }
    ?>
</table>
