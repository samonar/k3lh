<form action="<?php echo $action; ?>" method="post">
    <div class="form-group col-md-5">
        <label for="varchar">Nama Bagian <?php echo form_error('nm_bagian') ?></label>
        <input type="text" class="form-control" name="nm_bagian" id="nm_bagian" placeholder="Nama Bagian" value="<?php echo $nm_bagian; ?>" />
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('bagian') ?>" class="btn btn-default">Cancel</a>
</form>
