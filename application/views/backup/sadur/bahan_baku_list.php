

    <a href="create_bahan"> 
    <button class="btn btn-primary btn">Tambah Bahan</button>
    </a>
 </br></br>
<table id="example1" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th style="width: 10px; text-align:center;">No</th>
            <th style="text-align: center">Bahan Baku</th>
            <th style="text-align:center;">Harga satuan (kg)</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    foreach ($bahan_baku as $bahan ) { ?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $bahan->nama_bahan?> </td>
            <td style="text-align:center"><?php echo $bahan->harga_bahan?> /Kg </td>
            <td>
                <a href="<?php echo site_url('sadur/update_bb/').$bahan->id_bahan ?>">Ubah</a>
            </td>
        </tr>
    <?php } 
    ?>
    </tbody>
</table>