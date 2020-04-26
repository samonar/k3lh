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
        <h2 style="margin-top:0px">Identifikasi Read</h2>
        <table class="table">
	    <tr><td>Id Proyek</td><td><?php echo $id_proyek; ?></td></tr>
	    <tr><td>Id Sumber</td><td><?php echo $id_sumber; ?></td></tr>
	    <tr><td>Likelihood</td><td><?php echo $likelihood; ?></td></tr>
	    <tr><td>Severity</td><td><?php echo $severity; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('identifikasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>