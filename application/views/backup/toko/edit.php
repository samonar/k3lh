<!DOCTYPE html>
<html>
<body>

<h2><a href="<?= base_url('/toko/index') ?>">Home</a></h2>

<form action="<?php echo base_url('toko/update') ?>" method="post" enctype="multipart/form-data">
<label>Nama Anggota</label><br>
<select id="id_anggota" name="id_anggota">
	<?php
		foreach ($anggota as $key) {
			echo '<option value='.$key->id_anggota; ?>
			<?php
			if ($key->id_anggota == $toko->id_anggota) {
				echo "selected";
			}
			echo '>'.$key->nama.'</option>';
		}

		
	?>
</select><br><br>
<label>Jumlah Tagihan</label><br>
<input type="text" id="jml_tagihan" name="jml_tagihan" placeholder="Masukkan Jumlah Tagihan" value="<?php echo $toko->jml_tagihan ?>"><br><br>
<input type="text" id="id_toko" name="id_toko" value="<?php echo $toko->id_toko ?>" hidden>
<input type="submit" value="Ubah">
</form> 

<p>Keterangan: terserah mok isi opo penting podo karep e sing gawe sistem</p>

</body>
</html>
