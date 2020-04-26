<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="int">Gol. Sumber Bahaya<?php echo form_error('id_sumber') ?></label>
        <select name="id_sumber" id="" class="form-control col-md-5">
            <?php foreach ($data_sumber as $data) {?>
                <option value="<?php echo $data->id_sumber ?>" <?php if ($data->id_sumber==$id_sumber) {
                    echo "selected";
                } ?> ><?php echo $data->nm_sumber ?></option>    
            <?php }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Nama Bahaya <?php echo form_error('nm_bahaya') ?></label>
        <input type="text" class="form-control col-md-5" name="nm_bahaya" id="nm_bahaya" placeholder="Nama Bahaya" value="<?php echo $nm_bahaya; ?>" />
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('bahaya') ?>" class="btn btn-default">Cancel</a>
</form>
