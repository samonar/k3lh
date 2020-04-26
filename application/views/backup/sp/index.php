<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
</head>
<body>
<table border="1">
	<tr>
		<td>No.</td>
		<td>ID Anggota</td>
		<td>Tanggal</td>
		<td>Angsuran</td>
		<td>Total Nominal</td>
		<td>Aksi</td>
	</tr>
	<?php 
		$no = 1;
		foreach ($model as $key) {
			echo "<tr>";
			echo "<td>".$no.".</td>";
			echo "<td>".$key->id_anggota."</td>";
			echo "<td>".$key->tgl."</td>";
			echo "<td>".$key->angsuran."</td>";
			echo "<td>".$key->nominal."</td>";
			echo "<td> <a href = ".base_url('Sp/view/'.$key->id_sp).">Lihat</a> ";
			echo "<a href = ".base_url('Sp/edit/'.$key->id_sp).">Edit</a> ";
			echo "<a href = ".base_url('Sp/delete/'.$key->id_sp).">Delete</a></td>";
			echo "</tr>";
			$no++;
		}
	?>
</table>
<a href="<?php echo base_url('Sp/create') ?>">Tambah Data</a>
</body>
</html>