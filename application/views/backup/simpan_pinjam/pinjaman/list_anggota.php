<table class="table table-bordered" id="example1">
    <thead>
        <th style=" width:5%; text-align:center">No</th>
        <th style="width:15%;text-align:center">Id Anggota</th>
        <th style="text-align:center">Nama Peternak</th>
        <th style="text-align:center">Pos</th>
        <th style="text-align:center">Aksi</th>
    </thead>
    <tbody>
    <?php $start=1; 
    foreach ($data_anggota as $data) {?>
        <tr>
            <td><?php echo $start++?></td>
            <td><?php echo $data->id_anggota?></td>
            <td><?php echo $data->nama?></td>
            <td><?php echo $data->nm_pos?></td>
            <td><a href="ubah_angsuran">Lihat</a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>