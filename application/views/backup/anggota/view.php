<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
</head>
<?php  
$hutang = 0;
foreach ($kredit as $key) {
	$hutang = $hutang + $key->jml_tagihan;
}
$bayar = 0;
foreach ($debit as $key) {
	$bayar = $bayar + $key->jml_tagihan;
}
if($hutang > $bayar){
	$saldo = $hutang - $bayar;
}else{
	$saldo = 0;
}
?>
<body>
<h1><?= $anggota->nama ?></h1>
<table border="1">
	<tr>
		<td>Username</td>
		<td><?= $anggota->username ?></td>
	</tr>
	<tr>
		<td>Pos</td>
		<td><?= $anggota->pos ?></td>
	</tr>
	<tr>
		<td>Jabatan</td>
		<td><?= $anggota->jns_anggota ?></td>
	</tr>
	<tr>
		<td>Jumlah Sapi Perah</td>
		<td><?= $anggota->sapi_perah ?></td>
	</tr>
	<tr>
		<td>Jumlah Sapi Kering</td>
		<td><?= $anggota->sapi_kering ?></td>
	</tr>
	<tr>
		<td>Jumlah Sapi Pedet</td>
		<td><?= $anggota->sapi_pedet ?></td>
	</tr>
	<tr>
		<td>Jumlah Hutang</td>
		<td><?= $saldo ?></td>
	</tr>
</table>
<a href="<?= base_url('anggota/edit/'.$anggota->id_anggota) ?>">Edit</a>
<a href="<?= base_url('anggota/delete/'.$anggota->id_anggota) ?>">Delete</a>
<h3>Kredit</h3>
<table border="1">
	<tr>
		<td>No.</td>
		<td>Jumlah Tagihan</td>
		<td>Aksi</td>
	</tr>
	<?php 
		$no = 1;
		foreach ($kredit as $key) {
			echo "<tr>";
			echo "<td>".$no.".</td>";
			echo "<td>".$key->jml_tagihan."</td>";
			echo "<td> <a href = ".base_url('toko/view/'.$key->id_toko).">Lihat</a> ";
			echo "<a href = ".base_url('toko/edit/'.$key->id_toko).">Edit</a> ";
			echo "<a href = ".base_url('toko/delete/'.$key->id_toko).">Delete</a></td>";
			echo "</tr>";
			$no++;
		}
	?>
</table>
<h3>Debit</h3>
<table border="1">
	<tr>
		<td>No.</td>
		<td>Jumlah Tagihan</td>
		<td>Aksi</td>
	</tr>
	<?php 
		$no = 1;
		foreach ($debit as $key) {
			echo "<tr>";
			echo "<td>".$no.".</td>";
			echo "<td>".$key->jml_tagihan."</td>";
			echo "<td> <a href = ".base_url('toko/view/'.$key->id_toko).">Lihat</a> ";
			echo "<a href = ".base_url('toko/edit/'.$key->id_toko).">Edit</a> ";
			echo "<a href = ".base_url('toko/delete/'.$key->id_toko).">Delete</a></td>";
			echo "</tr>";
			$no++;
		}
	?>
</table>
</body>
</html>