<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header"><h6>Ubah Harga Susu</h6></div>
            <div class="card-body">
                <form action="<?php echo $action1 ?>" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="hidden" name="id_harga" value="<?php foreach ($data as $susu) {
                            if ($susu->jns_harga=='susu') {
                                echo $susu->id_harga;
                            }
                        } ?>">
                        <input type="number" class="form-control col-md-6" value="<?php foreach ($data as $susu) {
                            if ($susu->jns_harga=='susu') {
                                echo $susu->nominal_harga;
                            }
                        } ?>" name="nominal" value="required">
                        <div class="input-group-apppend">
                            <span class="input-group-text">/L</span>
                        </div>
                    </div>
                    <div class="card-footer col-md-8">
                        <button type="submit" class="btn  btn-primary">Simpan</button>
                        <a href="http://localhost/kud_tl/harga" class="btn btn-secondary  float-right">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header"><h6>Ubah Harga Katul</h6></div>
            <div class="card-body">
                <form action="<?php echo $action2 ?>" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp</span>
                        </div>
                        <input type="hidden" name="id_harga" value="<?php foreach ($data as $katul) {
                            if ($katul->jns_harga=='katul') {
                                echo $katul->id_harga;
                            }
                        } ?>">
                        <input type="number" class="form-control col-md-6" value="<?php foreach ($data as $katul) {
                            if ($katul->jns_harga=='katul') {
                                echo $katul->nominal_harga;
                            }
                        } ?>" name="nominal" value="required">
                        <div class="input-group-apppend">
                            <span class="input-group-text">/Kg</span>
                        </div>
                    </div>
                    <div class="card-footer col-md-8">
                        <button type="submit" class="btn  btn-primary">Simpan</button>
                        <a href="http://localhost/kud_tl/harga" class="btn btn-secondary  float-right">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


