<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
</head>
<body>
<table border="1">
	<tr>
		<td>No.</td>
		<td>Tanggal Input</td>
		<td>Bahan Baku</td>
		<td>Stok Lama</td>
		<td>Stok Baru</td>
		<td>Harga Stok Lama</td>
		<td>Harga Stok Baru</td>
		<td>Jumlah Pakai</td>
		<td>Harga Pakai</td>
		<td>Aksi</td>
	</tr>
	<?php 
		$no = 1;
		foreach ($model as $key) {
			echo "<tr>";
			echo "<td>".$no.".</td>";
			echo "<td>".$key->tgl."</td>";
			echo "<td>".$key->b_baku."</td>";
			echo "<td>".$key->stk_lama."</td>";
			echo "<td>".$key->stk_baru."</td>";
			echo "<td>".$key->hrg_stk_lama."</td>";
			echo "<td>".$key->hrg_stk_baru."</td>";
			echo "<td>".$key->jml_pakai."</td>";
			echo "<td>".$key->hrg_pakai."</td>";
			echo "<td> <a href = ".base_url('StokPakan/view/'.$key->id_stk).">Lihat</a> ";
			echo "<a href = ".base_url('StokPakan/edit/'.$key->id_stk).">Edit</a> ";
			echo "<a href = ".base_url('StokPakan/delete/'.$key->id_stk).">Delete</a></td>";
			echo "</tr>";
			$no++;
		}
	?>
</table>
<a href="<?php echo base_url('StokPakan/create') ?>">Tambah Data</a><br>
<a href="<?php echo base_url('StokPakan/searchbymonth') ?>">Lihat Data Bulanan</a>
</body>
</html>