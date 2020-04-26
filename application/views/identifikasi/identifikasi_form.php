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
        <h2 style="margin-top:0px">Identifikasi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Proyek <?php echo form_error('id_proyek') ?></label>
            <input type="text" class="form-control" name="id_proyek" id="id_proyek" placeholder="Id Proyek" value="<?php echo $id_proyek; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Sumber <?php echo form_error('id_sumber') ?></label>
            <input type="text" class="form-control" name="id_sumber" id="id_sumber" placeholder="Id Sumber" value="<?php echo $id_sumber; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Likelihood <?php echo form_error('likelihood') ?></label>
            <input type="text" class="form-control" name="likelihood" id="likelihood" placeholder="Likelihood" value="<?php echo $likelihood; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Severity <?php echo form_error('severity') ?></label>
            <input type="text" class="form-control" name="severity" id="severity" placeholder="Severity" value="<?php echo $severity; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('identifikasi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>