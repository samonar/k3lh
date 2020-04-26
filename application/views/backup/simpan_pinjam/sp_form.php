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
                <b>Sisa Tagihan</b> <a class="float-right"><?php 
                //menampilkan utang simpan pinjam 
                if (empty($data_angsuranAktf)) {
                    $pokok=0;
                    $tot_tagihan=0;
                }else {
                    $pokok=($data_angsuranAktf->nominal / $data_angsuranAktf->angsuran);
                    $tot_tagihan=$data_angsuranAktf->nominal;
                }
                
                //menampilkan data pembayaran angsuran sp
                if (empty($data_bayarAktf)) {
                    $sum_angsuran[]=0;
                }else {
                    foreach ($data_bayarAktf as $data) {
                        $sum_angsuran[]=$data->pokok;
                }
                }
                // $gnrt_tagihan=array_sum($sum_sp);
                echo $sisaTagihan=($tot_tagihan  - array_sum($sum_angsuran));
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
                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='pinjam' ) {
                    echo "active";
                } ?>" href="#pinjam" data-toggle="tab">Pinjaman Peternak</a></li>

                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='histori' ) {
                    echo "active";
                } ?> " href="#histori" data-toggle="tab">Histori Pinjaman</a></li>

                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='bayar' ) {
                    echo "active";
                } ?>" href="#bayar" data-toggle="tab">Histori Angsuran</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="<?php if (isset($show) and $show=='pinjam' ) {
                    echo "active";
                } ?> tab-pane" id=pinjam>
                    <?php if($jn_form=='form_angsuran'){?>
                        <form action="<?php echo $action ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-6 control-label">Besarnya Bayar Angsuran</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp </span>
                                    </div>
                                    <input type="hidden" name="id_anggota" value=<?php echo $identitas->id_anggota?>>
                                    <input type="hidden" name="id_ssp" value=<?php if (isset($id_sp)) {
                                        echo $id_sp;
                                    }?>>
                                    <input type="number" class="form-control col-md-6" name="nominal" id="angsuran" value=<?php if (isset($nominal)) {
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
                    <?php }else {?>
                        <form action="<?php echo $action ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-6 control-label">Besarnya Permohonan</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp </span>
                                    </div>
                                    <input type="hidden" name="id_sp_lama" value=<?php echo $data_angsuranAktf->id_sp ?> >
                                    <input type="hidden" name="id_anggota" value=<?php echo $identitas->id_anggota?>>
                                    <input type="hidden" name="id_sp" value=<?php if (isset($id_sp)) {
                                        echo $id_sp;
                                    }?>>
                                    <input type="number" required class="form-control col-md-6" name="nominal" id="angsuran" value=<?php if (isset($nominal)) {
                                        echo $nominal;
                                    } ?> required>
                                </div>

                                <label for="inputSkills" class="col-sm-6 control-label">Sanggup Mengangsur</label>
                                <div class="input-group">
                                    <input type="number" required class="form-control col-md-6" name="angsuran" id="nominal" value=<?php if (isset($angsuran)) {
                                        echo $angsuran;
                                    } ?> required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">kali</span>
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

                <div class="<?php if (isset($show) and $show=='histori' ) {
                    echo "active";
                    } ?> tab-pane" id=histori>
                    <table class="table table-bordered" id="example1">
                    <thead>
                        <th style=" width:5%; text-align:center">No</th>
                        <th style="text-align:center">Nominal Pinjaman</th>
                        <th style="text-align:center">Lama Angsuran</th>
                        <th style="text-align:center">Tanggal</th>
                        <th style="text-align:center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $start=1; 
                        foreach ($data_angsuran as $data) {?>
                            <tr>
                                <td style="text-align:center"><?php echo $start++?></td>
                                <td style="text-align:center">Rp <?php echo $data->nominal?>,-</td>
                                <td style="text-align:center"><?php echo $data->angsuran?> Bulan</td>
                                <td style="text-align:center"><?php echo $data->tgl_sp?>  </td>
                                <td style="text-align:center">
                                    <a href="<?php echo site_url('simpan_pinjam/edit_pinjam/'.$data->id_sp)?>">Ubah</a>
                                    <a href="<?php echo site_url('simpan_pinjam/delete_pinjam/'.$data->id_sp.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
                                    <a href="<?php echo site_url('simpan_pinjam/realisasi_pinjaman/'.$data->id_sp)?>">Cetak</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>

                <div class="<?php if (isset($show) and $show=='bayar' ) {
                    echo "active";
                    } ?> tab-pane" id="bayar">
                    <table class="table table-bordered" id="example3">
                    <thead>
                        <th style=" width:5%; text-align:center">No</th>
                        <th style="text-align:center">Pokok</th>
                        <th style="text-align:center">Bunga</th>
                        <th style="text-align:center">Di Bayar</th>
                        <th style="text-align:center">Tanggal</th>
                        <th style="text-align:center">Aksi</th>
                    </thead>
                    <tbody>
                        <?php $start=1; 
                        foreach ($data_bayar as $data) {?>
                            <tr>
                                <td style="text-align:center"><?php echo $start++?></td>
                                <td style="text-align:right">Rp <?php echo $data->pokok?>,-</td>
                                <td style="text-align:right">Rp <?php echo $data->bunga?>,-</td>
                                <td style="text-align:right">Rp <?php echo $data->pokok + $data->bunga?>,-</td>
                                <td style="text-align:center"><?php echo date('Y-M-d',strtotime($data->tgl_ssp))?></td>
                                <td style="text-align:center">
                                    <a href="<?php echo site_url('simpan_pinjam/edit_angsuran/'.$data->id_ssp)?>">Ubah</a>
                                    <a href="<?php echo site_url('simpan_pinjam/delete_angsuran/'.$data->id_ssp.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
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