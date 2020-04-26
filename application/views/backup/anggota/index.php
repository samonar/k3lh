<a href="<?php echo base_url('anggota/create') ?>" class="btn btn-success">Tambah Peternak Baru</a>
<br><br>
<table class="table table-bordered " id="example1">
	<thead>
		<th>No.</th>
		<th>Id Anggota</th>
		<th>Nama</th>
		<th>Pos</th>
		<th>Sapi Perah</th>
		<th>Sapi Kering</th>
		<th>Sapi Pedet</th>
		<th>Aksi</td>
	</thead>
	<tbody>
	<?php 
		$no = 1;
		foreach ($data_anggota as $key) {?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $key->id_anggota?></td>
				<td><?php echo $key->nama?></td>
				<td> <?php echo $key->nm_pos?></td>
				<td><?php echo $key->sapi_perah?></td>
				<td><?php echo $key->sapi_kering?></td>
				<td><?php echo $key->sapi_pedet?></td>
				<td>
					<a href = "<?php echo base_url('anggota/edit/'.$key->id_anggota)?>">Edit</a>
					<a href = "<?php echo base_url ('anggota/delete/'.$key->id_anggota)?>" onclick="return checkDelete()">Delete</a>
				</td>
			</tr>
		<?php }
	?>
	</tbody>
</table>

<script language="javascript" type="text/javascript">
    function checkDelete(){
        return confirm('Yakin menghapus data ?');
    }
</script>