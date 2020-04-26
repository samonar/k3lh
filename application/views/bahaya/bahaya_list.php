<div class="col-md-4">
    <?php echo anchor(site_url('bahaya/create'),'Create', 'class="btn btn-primary"'); ?>
</div> <br>
<table class="table table-bordered " id="example1">
    <tr>
        <th>No</th>
    <th>Gol. Sumber Bahaya</th>
    <th>Nama Bahaya</th>
    <th>Action</th>
    </tr><?php
    $start=0;
    foreach ($bahaya_data as $bahaya)
    {
        ?>
        <tr>
    <td width="80px"><?php echo ++$start ?></td>
    <td><?php echo $bahaya->nm_sumber ?></td>
    <td><?php echo $bahaya->nm_bahaya ?></td>
    <td style="text-align:center" width="200px">
        <?php 
        echo anchor(site_url('bahaya/update/'.$bahaya->id_bahaya),'Update'); 
        echo ' | '; 
        echo anchor(site_url('bahaya/delete/'.$bahaya->id_bahaya),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
        ?>
    </td>
    </tr>
        <?php
    }
    ?>
</table>
