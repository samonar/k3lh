<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
</head>
<body>
<form action="<?= base_url('sp/input') ?>" method="post">
	<label>Pilih Nama Anggota</label>
	<select id="id_anggota" name="id_anggota">
	<?php
		foreach ($anggota as $key) {
			echo '<option value='.$key->id_anggota.'>'.$key->nama.'</option>';
		}
	?>
	</select><br><br>
	<label>Pilih Tanggal</label>
	<input type="date" name="tgl"><br>
	<label>Jumlah Angsuran</label>
	<input type="number" name="angsuran"><br>
	<label>Total Nominal</label>
	<input type="number" name="nominal"><br>
	<input type="submit" name="Tambah">
</form>
</body>
</html>