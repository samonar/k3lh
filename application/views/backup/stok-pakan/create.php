<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
</head>
<body>
<form action="<?= base_url('StokPakan/input') ?>" method="post">
	<label>Tanggal</label>
	<input type="date" name="tgl"><br>
	<label>Bahan Baku</label>
	<input type="text" name="b_baku" id="b_baku"><br>
	<label>Stok Lama</label>
	<input type="number" name="stk_lama"><br>
	<label>Harga Lama</label>
	<input type="number" name="hrg_stk_lama"><br>
	<label>Stok Baru</label>
	<input type="number" name="stk_baru"><br>
	<label>Harga Baru</label>
	<input type="number" name="hrg_stk_baru"><br>
	<label>Jumlah Pakai</label>
	<input type="number" name="jml_pakai"><br>
	<label>Harga Pakai</label>
	<input type="number" name="hrg_pakai"><br>
	<input type="submit" value="Tambah">
</form>
</body>
</html>