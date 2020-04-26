<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
</head>
<body>
<form action="<?= base_url('sp/update') ?>" method="post">
	<label>Pilih Nama Anggota</label>
	<select id="id_anggota" name="id_anggota">
	<?php
		foreach ($anggota as $key) {
			echo '<option value='.$key->id_anggota; ?>
			<?php
			if ($key->id_anggota == $model->id_anggota) {
				echo "selected";
			}
			echo '>'.$key->nama.'</option>';
		}
	?>
	</select><br><br>
	<label>Pilih Tanggal</label>
	<input type="date" name="tgl" value="<?= $model->tgl ?>"><br>
	<label>Jumlah Angsuran</label>
	<input type="number" name="angsuran" value="<?= $model->angsuran ?>"><br>
	<label>Total Nominal</label>
	<input type="number" name="nominal" value="<?= $model->nominal ?>"><br>
	<input type="number" name="id_sp" value="<?= $model->id_sp ?>" hidden>
	<input type="submit" name="Tambah">
</form>
</body>
</html>