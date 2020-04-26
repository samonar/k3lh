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
                if (empty($pakan)) {
                    $sum_pakan[]=0;
                } else {
                    foreach ($pakan as $data) {
                        $sum_pakan[]=$data->hrg_jml_pakan;
                    }
                }
                if (empty($bayar)) {
                    $sum_bayar[]=0;
                } else {
                    foreach ($bayar as $data) {
                        $sum_bayar[]=$data->nominal_byr;
                    }
                }
                
                echo "Rp ".(array_sum($sum_pakan)-array_sum($sum_bayar));  
                ?></a>
                </li>
            </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="col-md-9">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='ambil' ) {
                    echo "active";
                } ?>" href="#ambil" data-toggle="tab">Ambil Pakan</a></li>

                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='hist_ambil' ) {
                    echo "active";
                } ?>" href="#hist_ambil" data-toggle="tab">Histori Ambil</a></li>

                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='hist_bayar' ) {
                    echo "active";
                } ?>" href="#hist_bayar" data-toggle="tab">Bayar Pakan</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="<?php if (isset($show) and $show=='ambil' ) {
                    echo "active";
                    } ?> tab-pane" id=ambil>
                    <?php if($jn_form=='form_bayar'){ ?>
                        <form action="<?php echo $action ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-6 control-label">Pembayaran Pakan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                        <input type="hidden" name="id_anggota" value=<?php echo $identitas->id_anggota?>>
                                        <input type="hidden" name="id_byr_pkn" value=<?php if (isset($id_byr_pkn)) {
                                            echo $id_byr_pkn;
                                        } ?>>
                                        <input type="number" name="nominal_byr" class="form-control col-md-6"  value=<?php if (isset($nominal_byr)) {
                                        echo $nominal_byr;
                                    } ?> required>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                <a href="<?php echo site_url('pakan')?>" class="btn btn-secondary" >cancel</a>
                                </div>
                                <div class="col-md-4">
                                <button type="submit" class="btn btn-info float-right">simpan</button>
                                </div>
                            </div>
                        </form>
                <?php }else {?>
                        <form action="<?php echo $action ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-6 control-label">Pakan Yang Diambil</label>

                                <div class="input-group">
                                    <input type="hidden" name="id_anggota" value=<?php echo $identitas->id_anggota?>>
                                    <input type="hidden" name="id_pakan" value=<?php if (isset($id_pakan)) {
                                        echo $id_pakan;
                                    } ?>>
                                    <input type="number" class="form-control col-md-6" name="jml_pakan" value=<?php if (isset($jml_pakan)) {
                                        echo $jml_pakan;
                                    } ?> required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">/Kg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                <a href="<?php echo site_url('pakan')?>" class="btn btn-secondary" >cancel</a>
                                </div>
                                <div class="col-md-4">
                                <button type="submit" class="btn btn-info float-right">simpan</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
                <div class="<?php if (isset($show) and $show=='hist_ambil' ) {
                    echo "active";
                    } ?> tab-pane" id=hist_ambil>
                    <table class="table table-bordered" id="example1">
                    <thead>
                        <th style=" width:5%; text-align:center">No</th>
                        <th style="text-align:center">Jumlah Pakan</th>
                        <th style="text-align:center">Nominal Harga</th>
                        <th style="text-align:center">Tanggal</th>
                        <th style="text-align:center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $start=1; 
                        foreach ($pakan as $data) {?>
                            <tr>
                                <td style="text-align:center"><?php echo $start++?></td>
                                <td style="text-align:center"><?php echo $data->jml_pakan?> Kg</td>
                                <td style="text-align:right">Rp <?php echo $data->hrg_jml_pakan?>,-</td>
                                <td style="text-align:center"><?php echo $data->tgl_pakan?></td>
                                <td>
                                <a href="<?php echo site_url('pakan/edit_pakai/'.$data->id_pakan)?>">Ubah</a>
                                <a href="<?php echo site_url('pakan/delete_pakai/'.$data->id_pakan.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
                <div class="<?php if (isset($show) and $show=='hist_bayar' ) {
                    echo "active";
                    } ?> tab-pane" id="hist_bayar">
                    <table class="table table-bordered" id="example3">
                    <thead>
                        <th style=" width:5%; text-align:center">No</th>
                        <th style="text-align:center">Nominal Bayar</th>
                        <th style="text-align:center">Tanggal</th>
                        <th style="text-align:center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $start=1; 
                        foreach ($bayar as $data) {?>
                            <tr>
                                <td style="text-align:center"><?php echo $start++?></td>
                                <td style="text-align:right">Rp <?php echo $data->nominal_byr?>,-</td>
                                <td style="text-align:center"><?php echo $data->tgl_byr_pkn?></td>
                                <td>
                                <a href="<?php echo site_url('pakan/edit_bayar/'.$data->id_byr_pkn)?>">Ubah</a>
                                <a href="<?php echo site_url('pakan/delete_bayar/'.$data->id_byr_pkn.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
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