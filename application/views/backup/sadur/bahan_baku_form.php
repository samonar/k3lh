<form action="<?php echo $action?>" method="post" class="col-md-8">
    <div class="form-group row">
    <input type="hidden" name="id_bahan" value="<?php echo $id_bahan?>">
        <label class="col-md-3">Nama Bahan Baku</label>
        <div class="col-md-6">
        <input type="text" name="nama_bahan" class="form-control" value="<?php echo $nama_bahan?>">
        </div> 
    </div>
    <div class="form-group row">
        <label class="col-md-3">Harga</label>
        <div class="input-group col-md-6">
            <input type="text" class="form-control" name="harga_bahan" value=<?php echo $harga_bahan?>>
            <div class="input-group-append">
                <span class="input-group-text">/Kg</span>
            </div>
        </div>
    </div>

    <a href="<?php echo site_url('sadur/bahan_baku') ?>" class="btn btn-default">
     Batal
    </a>
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <button type="submit" class="btn btn-primary ">simpan</button>    
</form>
