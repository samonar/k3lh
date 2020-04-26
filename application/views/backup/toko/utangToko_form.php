<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('/assets/foto/murid.png')?>" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?php echo $identitas->nama ?></h3>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                <b>No Anggota</b> <a class="float-right"><?php echo $identitas->id_anggota?></a>
                </li>
                <li class="list-group-item">
                <b>Pos</b> <a class="float-right"><?php echo $identitas->nm_pos?> </a>
                </li>
                <li class="list-group-item">
                <b>Tot.Tag</b> <a class="float-right"><?php 
                if (empty($data_toko)) {
                    $sum_utangToko[]=0;
                    $sum_bayarToko[]=0;
                }else {
                    foreach ($data_toko as $data) {
                        if ($data->jenis == "K") {
                            $sum_utangToko[]=$data->jml_tagihan;
                            $sum_bayarToko[]=0;
                        }else {
                            $sum_bayarToko[]=$data->jml_tagihan;
                        }
                    }
                }
                echo $tagihan_toko=(array_sum($sum_utangToko)-array_sum($sum_bayarToko));
                ?></a>
                </li>
               
                </a>
            </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="col-md-9">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='utangToko' ) {
                    echo "active";
                } ?>" href="#utangToko" data-toggle="tab">Utang Toko</a></li>

                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='hist_utangToko' ) {
                    echo "active";
                } ?>" href="#hist_utangToko" data-toggle="tab">Histori Utang Toko</a></li>

                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='hist_bayarToko' ) {
                    echo "active";
                } ?>" href="#hist_bayarToko" data-toggle="tab">Histori Bayar Toko</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="<?php if (isset($show) and $show=='utangToko' ) {
                    echo "active";
                    } ?> tab-pane" id=utangToko>
                    <?php if($jn_form=='form_bayar'){ ?>
                        <form action="<?php echo $action ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-6 control-label">Utang Toko Bulan ini</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                        <input type="hidden" name="id_anggota" value=<?php echo $identitas->id_anggota?>>
                                        <input type="hidden" name="id_toko" value=<?php if (isset($id_toko)) {
                                            echo $id_toko;
                                        } ?>>
                                        <input type="number" name="jml_tagihan" class="form-control col-md-6"  value=<?php if (isset($jml_tagihan)) {
                                        echo $jml_tagihan;
                                    } ?> required>
                                    
                                </div>
                            </div>
                            <div class="card-footer col-md-8">
                                <button type="submit" class="btn  btn-primary">Simpan</button>
                                <a href="<?php echo site_url('pakan')?>" class="btn btn-secondary  float-right">Batal</a>
                            </div>
                        </form>
                <?php }else {?>
                        <form action="<?php echo $action ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-6 control-label">Utang Toko Bulan ini</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                            <input type="hidden" name="id_anggota" value=<?php echo $identitas->id_anggota?>>
                                            <input type="hidden" name="id_toko" value=<?php if (isset($id_toko)) {
                                            echo $id_toko;
                                            } ?>>
                                            <input type="number" name="jml_tagihan" class="form-control col-md-6"  value=<?php if (isset($jml_tagihan)) {
                                            echo $jml_tagihan;
                                        } ?> required>
                                    </div>
                            </div>
                            <div class="card-footer col-md-8">
                                <button type="submit" class="btn  btn-primary">Simpan</button>
                                <a href="<?php echo site_url('pakan')?>" class="btn btn-secondary  float-right">Batal</a>
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <div class="<?php if (isset($show) and $show=='hist_utangToko' ) {
                    echo "active";
                    } ?> tab-pane" id=hist_utangToko>
                    <table class="table table-bordered" id="example1">
                    <thead>
                        <th style=" width:5%; text-align:center">No</th>
                        <th style="text-align:center">Jumlah Utang</th>
                        <th style="text-align:center">Tanggal</th>
                        <th style="text-align:center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $start=1; 
                        foreach ($data_toko as $data) {
                            if ($data->jenis == "K") { ?>
                                <tr>
                                <td style="text-align:center"><?php echo $start++?></td>
                                <td style="text-align:center">Rp <?php echo $data->jml_tagihan?></td>
                                <td style="text-align:center"><?php echo $data->tgl?></td>
                                <td>
                                <a href="<?php echo site_url('toko/edit_utang/'.$data->id_toko)?>">Ubah</a>
                                <a href="<?php echo site_url('toko/delete_utang/'.$data->id_toko.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
                                </td>
                            </tr>
                    <?php   }
                         } ?>
                    </tbody>
                    </table>
                </div>
                <div class="<?php if (isset($show) and $show=='hist_bayarToko' ) {
                    echo "active";
                    } ?> tab-pane" id="hist_bayarToko">
                    <table class="table table-bordered" id="example3">
                    <thead>
                    <th style=" width:5%; text-align:center">No</th>
                        <th style="text-align:center">Jumlah Bayar</th>
                        <th style="text-align:center">Tanggal</th>
                        <th style="text-align:center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $start=1; 
                        foreach ($data_toko as $data) {
                            if ($data->jenis == "D") { ?>
                           <tr>
                                <td style="text-align:center"><?php echo $start++?></td>
                                <td style="text-align:center">Rp <?php echo $data->jml_tagihan?></td>
                                <td style="text-align:center"><?php echo $data->tgl?></td>
                                <td>
                                <a href="<?php echo site_url('toko/edit_bayar/'.$data->id_toko)?>">Ubah</a>
                                <a href="<?php echo site_url('toko/delete_bayar/'.$data->id_toko.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
                                </td>
                            </tr>
                    <?php   } 
                        } ?>
                    </tbody>
                    </table>            
                </div>  
            </div>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript">
    function checkDelete(){
        return confirm('Yakin menghapus data ?');
    }
    </script>