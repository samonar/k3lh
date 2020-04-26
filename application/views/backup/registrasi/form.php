<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
</head>
<body>

<form action="<?= base_url('registrasi/cekdata') ?>" method="post">
	<label>Username</label>
	<input type="text" name="username" required="required"><br>
	<label>Password</label>
	<input type="password" name="password" required="required"><br>
	<label>Ulangi Password</label>
	<input type="password" name="ulangpassword" required="required"><br>
	<input type="submit" name="Submit">
</form>

</body>
</html>