<!DOCTYPE html>
<html>
<body>

<h2><a href="<?= base_url('/toko/index') ?>">Home</a></h2>

<form action="<?php echo base_url('toko/input') ?>" method="post">
<label>Nama Anggota</label><br>
<select id="id_anggota" name="id_anggota">
	<?php
		foreach ($anggota as $key) {
			echo '<option value='.$key->id_anggota.'>'.$key->nama.'</option>';
		}
	?>
</select><br><br>
<label>Jumlah Tagihan</label><br>
<input type="text" id="jml_tagihan" name="jml_tagihan" placeholder="Masukkan Jumlah Tagihan"><br><br>
<input type="submit" value="Tambah">
</form> 

<p>Keterangan: terserah mok isi opo penting podo karep e sing gawe sistem</p>

</body>
</html>