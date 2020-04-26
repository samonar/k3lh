
<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">Nama Proyek <?php echo form_error('nm_proyek') ?></label>
        <input type="text" class="form-control col-md-5" name="nm_proyek" id="nm_proyek" placeholder="Nm Proyek" value="<?php echo $nm_proyek; ?> " required />
    </div>
    <div class="form-group">
        <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
        <textarea class="form-control col-md-5" rows="2" name="alamat" id="alamat" placeholder="Alamat" required><?php echo $alamat; ?></textarea>
    </div>
    <div class="form-group">
        <label for="date">Tanggal <?php echo form_error('tgl') ?></label>
        <input type="date" class="form-control col-md-5" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" required />
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('proyek') ?>" class="btn btn-default">Cancel</a>
</form>