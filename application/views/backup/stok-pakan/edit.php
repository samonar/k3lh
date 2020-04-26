<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
</head>
<body>
<form action="<?= base_url('StokPakan/update') ?>" method="post">
	<label>Tanggal</label>
	<input type="date" name="tgl" value="<?= $model->tgl ?>"><br>
	<label>Bahan Baku</label>
	<input type="text" name="b_baku" id="b_baku" value="<?= $model->b_baku ?>"><br>
	<label>Stok Lama</label>
	<input type="number" name="stk_lama" value="<?= $model->stk_lama ?>"><br>
	<label>Harga Lama</label>
	<input type="number" name="hrg_stk_lama" value="<?= $model->hrg_stk_lama ?>"><br>
	<label>Stok Baru</label>
	<input type="number" name="stk_baru" value="<?= $model->stk_baru ?>"><br>
	<label>Harga Baru</label>
	<input type="number" name="hrg_stk_baru" value="<?= $model->hrg_stk_baru ?>"><br>
	<label>Jumlah Pakai</label>
	<input type="number" name="jml_pakai" value="<?= $model->jml_pakai ?>"><br>
	<label>Harga Pakai</label>
	<input type="number" name="hrg_pakai" value="<?= $model->hrg_pakai ?>"><br>
	<input type="number" name="id_stk" value="<?= $model->id_stk ?>" hidden>
	<input type="submit" value="Tambah">
</form>
</body>
</html>