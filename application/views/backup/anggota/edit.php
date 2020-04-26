<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
</head>
<body>
<h1>Form Tambah Anggota</h1>
<form action="<?= base_url('anggota/update/'.$anggota->id_anggota) ?>" method="post">
<table>
<tr>
	<td>Nama</td>
	<td><input type="text" name="nama" value="<?= $anggota->nama ?>"></td>
</tr>
<tr>
	<td>Pos</td>
	<td><input type="number" name="pos" value="<?= $anggota->pos ?>"></td>
</tr>
<tr>
	<td>Jabatan</td>
	<td><input type="number" name="jns_anggota" value="<?= $anggota->jns_anggota ?>"></td>
</tr>
<tr>
	<td>Jumlah Sapi Perah</td>
	<td><input type="number" name="sapi_perah" value="<?= $anggota->sapi_perah ?>"></td>
</tr>
<tr>
	<td>Jumlah Sapi Kering</td>
	<td><input type="number" name="sapi_kering" value="<?= $anggota->sapi_kering ?>"></td>
</tr>
<tr>
	<td>Jumlah Sapi Pedet</td>
	<td><input type="number" name="sapi_pedet" value="<?= $anggota->sapi_pedet ?>"></td>
</tr>
<tr>
	<td>Username</td>
	<td><input type="text" name="username" value="<?= $anggota->username ?>"></td>
</tr>
<tr>
	<td>Password Lama</td>
	<td><input type="password" name="password"></td>
</tr>
<tr>
	<td>Password Baru</td>
	<td><input type="password" name="password"></td>
</tr>
<tr>
	<td>Ulangi Password Baru</td>
	<td><input type="password" name="cekpass"></td>
</tr>
</table>
<input type="submit" name="Ubah">
</form>
</body>
</html>