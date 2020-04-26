<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Proyek Read</h2>
        <table class="table">
	    <tr><td>Nm Proyek</td><td><?php echo $nm_proyek; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Tgl</td><td><?php echo $tgl; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('proyek') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>