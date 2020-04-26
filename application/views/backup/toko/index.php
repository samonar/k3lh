<!DOCTYPE html>
<html>
<head>
	<title>Toko</title>
</head>
<body>
<table class="table table-bordered" id="example1">
	<thead>
	<tr>
		<th style=" width:5%; text-align:center">No.</th>
		<th style="width:15%;text-align:center">Id Anggota</th>
		<th>Jumlah Tagihan</th>
		<th>Pos</th>
		<th>Aksi</th>
	</tr>
	</thead>
	<tbody>
	<?php 
		$no = 1;
		foreach ($data_anggota as $key) {?>
			<tr>
			 <td><?php echo $no++ ?></td>
			 <td><?php echo $key->id_anggota ?></td>
			 <td><?php echo $key->nama ?></td>
			 <td><?php echo $key->nm_pos ?></td>
			 <td> <a href = <?php echo site_url('toko/view/'.$key->id_anggota) ?>> Lihat</a> </td>
			
			</tr>
	<?php }	?>
	</tbody>
</table>
<a href="<?php echo base_url('toko/create') ?>">Tambah Data</a>
</body>
</html>
