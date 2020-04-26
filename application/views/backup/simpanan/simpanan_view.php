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
                <b>S. Wajib  </b> <a class="float-right"><?php 
                if (empty($simpanan)) {
                    $sumWjb_deb[]=0;
                    $sumWjb_kre[]=0;
                    $sumSkr_deb[]=0;
                    $sumSkr_kre[]=0;
                } else {
                    foreach ($simpanan as $data) {
                       if ($data->jenis==1 and $data->ket=='D') {
                            $sumWjb_deb[]=$data->nominal;
                            $sumWjb_kre[]=0;
                            $sumSkr_deb[]=0;
                            $sumSkr_kre[]=0;
                       }elseif ($data->jenis==1 and $data->ket=='K') {
                           $sumWjb_kre[]=$data->nominal;
                           $sumWjb_deb[]=0;
                           $sumSkr_deb[]=0;
                           $sumSkr_kre[]=0;
                       }elseif ($data->jenis==2 and $data->ket=='D') {
                           $sumSkr_deb[]=$data->nominal;
                           $sumWjb_deb[]=0;
                           $sumWjb_kre[]=0;
                           $sumSkr_kre[]=0;
                       }else {
                           $sumSkr_kre[]=$data->nominal;
                       }
                    }
                }
                echo $tot_saldoWjb= (array_sum($sumWjb_deb) - array_sum($sumWjb_kre));
                ?></a>
                </li>
                <li class="list-group-item">
                <b>S. Sukarela  </b> <a class="float-right">
                <?php echo $tot_saldoSkr= (array_sum($sumSkr_deb) - array_sum($sumSkr_kre)); ?>
                </a>
                </li>
            </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="col-md-9">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
            <?php if (isset($show) and $show=='ubah' ) {?>
                <li class="nav-item"><a class="nav-link active" href="#ambil" data-toggle="tab">Ambil Pakan</a></li>
            <?php } ?>

                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='hist_wjb' ) {
                    echo "active";
                } ?>" href="#hist_wjb" data-toggle="tab">Histori S.Wajib</a></li>

                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='hist_bayar' ) {
                    echo "active";
                } ?>" href="#hist_bayar" data-toggle="tab">Histori S.Sukarela</a></li>

                <li class="nav-item"> <a class="nav-link " href="#ambil_wajib" data-toggle="tab">Ambil S.Wajib</a></li>
                <li class="nav-item"> <a class="nav-link " href="#ambil_sukarela" data-toggle="tab">Ambil S.Sukarela</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="<?php if (isset($show) and $show=='ubah' ) {
                    echo "active";
                    } ?> tab-pane" id=ambil>
                    <form action="<?php echo $action ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-6 control-label">Ubah Simpanan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                        <input type="hidden" name="id_anggota" value=<?php echo $identitas->id_anggota?>>
                                        <input type="hidden" name="id_simpanan" value=<?php if (isset($id_simpanan)) {
                                            echo $id_simpanan;
                                        } ?>>
                                        <input type="number" name="nominal" class="form-control col-md-6"  value="<?php if (isset($nominal)) {
                                        echo $nominal;
                                    } ?>" required>
                                    
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
                </div>
                <div class="<?php if (isset($show) and $show=='hist_wjb' ) {echo "active";} ?> tab-pane" id=hist_wjb>
                    <div class="card header">
                        <h3 class="card-title">Histori Simpanan Wajib Masuk</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <th style=" width:5%; text-align:center">No</th>
                                <th style="text-align:center">Nominal</th>
                                <th style="text-align:center">Tanggal</th>
                                <th style="text-align:center">Aksi</th>
                            </thead>
                            <tbody>
                                <?php $start=1; 
                                foreach ($simpanan as $data) {
                                    if ($data->jenis==1 and $data->ket=='D') { ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $start++?></td>
                                            <td style="text-align:center">Rp <?php echo $data->nominal?></td>
                                            <td style="text-align:center"><?php echo $data->tgl?></td>
                                            <td style="text-align:center">
                                            <a href="<?php echo site_url('simpanan/edit_simpanan_wjb/'.$data->id_simpanan)?>">Ubah</a>
                                            <a href="<?php echo site_url('simpanan/delete_simpanan/'.$data->id_simpanan.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
                                            </td>
                                        </tr>
                            <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- table histori keluar -->
                    <div class="card header">
                        <h3 class="card-title">Histori Simpanan Wajib Keluar</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="example2">
                            <thead>
                                <th style=" width:5%; text-align:center">No</th>
                                <th style="text-align:center">Nominal</th>
                                <th style="text-align:center">Tanggal</th>
                                <th style="text-align:center">Aksi</th>
                            </thead>
                            <tbody>
                                <?php $start=1; 
                                foreach ($simpanan as $data) {
                                    if ($data->jenis==1 and $data->ket=='K') { ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $start++?></td>
                                            <td style="text-align:center">Rp <?php echo $data->nominal?></td>
                                            <td style="text-align:center"><?php echo $data->tgl?></td>
                                            <td style="text-align:center">
                                            <a href="<?php echo site_url('simpanan/edit_simpanan_wjb/'.$data->id_simpanan)?>">Ubah</a>
                                            <a href="<?php echo site_url('simpanan/delete_simpanan/'.$data->id_simpanan.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
                                            </td>
                                        </tr>
                            <?php }
                                } ?>
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="<?php if (isset($show) and $show=='hist_bayar' ) {echo "active";} ?> tab-pane" id="hist_bayar">
                    <div class="card header">
                        <h3 class="card-title">Histori Simpanan Sukarela Masuk</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <th style=" width:5%; text-align:center">No</th>
                                <th style="text-align:center">Nominal</th>
                                <th style="text-align:center">Tanggal</th>
                                <th style="text-align:center">Aksi</th>
                            </thead>
                            <tbody>
                                <?php $start=1; 
                                foreach ($simpanan as $data) {
                                    if ($data->jenis==2 and $data->ket=='D') { ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $start++?></td>
                                            <td style="text-align:center">Rp <?php echo $data->nominal?></td>
                                            <td style="text-align:center"><?php echo $data->tgl?></td>
                                            <td style="text-align:center">
                                            <a href="<?php echo site_url('simpanan/edit_simpanan_skr/'.$data->id_simpanan)?>">Ubah</a>
                                            <a href="<?php echo site_url('simpanan/delete_simpananSkr/'.$data->id_simpanan.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
                                            </td>
                                        </tr>
                            <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>

                        <!-- table histori keluar -->
                    <div class="card header">
                        <h3 class="card-title">Histori Simpanan Sukarela Keluar</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="example2">
                            <thead>
                                <th style=" width:5%; text-align:center">No</th>
                                <th style="text-align:center">Nominal</th>
                                <th style="text-align:center">Tanggal</th>
                                <th style="text-align:center">Aksi</th>
                            </thead>
                            <tbody>
                                <?php $start=1; 
                                foreach ($simpanan as $data) {
                                    if ($data->jenis==2 and $data->ket=='K') { ?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $start++?></td>
                                            <td style="text-align:center">Rp <?php echo $data->nominal?></td>
                                            <td style="text-align:center"><?php echo $data->tgl?></td>
                                            <td style="text-align:center">
                                            <a href="<?php echo site_url('simpanan/edit_simpanan_skr/'.$data->id_simpanan)?>">Ubah</a>
                                            <a href="<?php echo site_url('simpanan/delete_simpananSkr/'.$data->id_simpanan.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
                                            </td>
                                        </tr>
                            <?php }
                                } ?>
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="<?php if (isset($show) and $show=='ambil_wajib' ) {echo "active";} ?> tab-pane" id="ambil_wajib">
                    <form action="<?php echo $action ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="inputSkills" class="col-sm-6 control-label">Simpanan Wajib Yang Diambil</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="hidden" name="id_anggota" value=<?php echo $identitas->id_anggota?>>
                                <input type="number" class="form-control col-md-6" name="nominal" value=<?php if (isset($nominal)) {
                                    echo $nominal;
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
                </div>
                <div class="<?php if (isset($show) and $show=='ambil_sukarela' ) {echo "active";} ?> tab-pane" id="ambil_sukarela">
                    <form action="<?php echo $action2 ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="inputSkills" class="col-sm-6 control-label">Simpanan Sukarela Yang Diambil</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="hidden" name="id_anggota" value=<?php echo $identitas->id_anggota?>>
                                <input type="number" class="form-control col-md-6" name="nominal" value=<?php if (isset($nominal)) {
                                    echo $nominal;
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