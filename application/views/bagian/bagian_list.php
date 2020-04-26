<div class="col-md-4">
    <?php echo anchor(site_url('bagian/create'),'Create', 'class="btn btn-primary"'); ?>
</div> <br>
<table class="table table-bordered " id="example1">
    <thead>
        <th>No</th>
        <th>Nama Bagian</th>
        <th>Action</th>
    </thead>
    <tbody>
    <?php
    $start=0;
    foreach ($bagian_data as $bagian)
    {?>
    <tr>
        <td width="80px"><?php echo ++$start ?></td>
        <td><?php echo $bagian->nm_bagian ?></td>
        <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('bagian/update/'.$bagian->id_bagian),'Update'); 
            echo ' | '; 
            echo anchor(site_url('bagian/delete/'.$bagian->id_bagian),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            ?>
        </td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>
