<form action="<?php echo $action; ?>" method="post">
    <div class="form-group col-md-5">
        <label for="int">Pekerjaan Bagian <?php echo form_error('id_bagian') ?></label>
        <select class="form-control" name="id_bagian" id="id_bagian">
            <?php foreach ($data_bagian as $data) {?>
                <option value="<?php echo $data->id_bagian ?>" <?php if ($data->id_bagian==$id_bagian) {echo "selected";} ?>> <?php echo $data->nm_bagian?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group col-md-5">
        <label for="varchar">Nama Sumber Bahaya <?php echo form_error('nm_sumber') ?></label>
        <input type="text" class="form-control" name="nm_sumber" id="nm_sumber" placeholder="Nama Sumber" value="<?php echo $nm_sumber; ?>" />
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('sumber') ?>" class="btn btn-default">Cancel</a>
</form>
