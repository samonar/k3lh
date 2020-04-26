<form action="<?php echo $action?>" method="post" class="col-md-8">
    <div class="form-group row">
    <input type="hidden" name="id_stk" value="<?php echo $id_stk?>">
        <label class="col-md-3">Nama Bahan Baku</label>
        <div class="col-md-6">
        <select name="id_bhn_baku" class="form-control">
        <?php foreach ($data_bb as $data) {?>
            <option <?php if ($data->id_bahan==$id_bhn_baku) {
                echo "selected";
            } ?> value="<?php echo $data->id_bahan?>"><?php echo $data->nama_bahan ?></option>
       <?php } ?>
        </select>
        </div> 
    </div>
    <div class="form-group row">
        <label class="col-md-3">Jumlah</label>
        <div class="input-group col-md-6">
            <input required type="text" class="form-control" name="stk_masuk" value=<?php echo $stk_masuk?> >
            <div class="input-group-append">
                <span class="input-group-text">/Kg</span>
            </div>
        </div>
    </div>

    <a href="<?php echo site_url($button) ?>" class="btn btn-default">
    Batal
    </a>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <button type="submit" class="btn btn-primary ">simpan</button>    
</form>
