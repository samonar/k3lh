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
                if (empty($data_angsuran)) {
                    $sum_sp[]=0;
                    $total[]=0;
                }else {
                    foreach ($data_angsuran as $data) {
                        $time=strtotime($data->tgl);
                        $bln_mulai=date('Y-m',strtotime($data->tgl));
                        $bln_akhir=date('Y-m',strtotime("+$data->angsuran Month",$time));
                        if ( date('Y-m')>$bln_mulai and date('Y-m') <= $bln_akhir) {
                            $sum_sp[]=($data->nominal / $data->angsuran);
                            
                        }else {
                            $sum_sp[]=0;
                        }
                        $total[]=$data->nominal;
                    }
                }
                
                //menampilkan data pembayaran angsuran sp
                if (empty($data_bayar)) {
                    $sum_angsuran[]=0;
                }else {
                    foreach ($data_bayar as $data) {
                        $sum_angsuran[]=$data->nominal;
                }
                }
                // $gnrt_tagihan=array_sum($sum_sp);
                echo $sisaTagihan=(array_sum($total) - array_sum($sum_angsuran));
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
                <li class="nav-item"><h5>Setoran Peternak</h5></li>
            </ul>
        </div>
        <div class="card-body">
            <form action="<?php echo site_url("setoran/edit_action") ?>" method="post" enctype="multipart/form-data" class="col-md-6">
                <div class="form-group row">
                        <label class="col-md-4 ">Setoran Pagi</label>
                        <div class="col-md-7">
                            <input type="hidden" name="id_setoran1" value="<?php echo $id_setoran1 ?>">
                            <input type="hidden" name="id_anggota" value=<?php echo $id_anggota ?>>
                            <input type="text" name="set_pagi" id="nama" class="form-control" value="<?php echo $set_pagi?>" >
                        </div>
                </div>
                <div class="form-group row">
                        <label class="col-md-4 ">Setoran Sore </label>
                        <div class="col-md-7">
                            <input type="hidden" name="id_setoran2" value="<?php echo $id_setoran2 ?>">
                            <input type="text" name="set_sore" id="nama" class="form-control" value="<?php echo $set_sore ?> ">
                        </div>
                </div>  
                
                <a href="<?php echo site_url('setoran/update/'.$id_anggota) ?>" class="btn btn-secondary ">Cancel</a>
                
                <button type="submit" class="btn btn-info float-right">Simpan</button>
            </form>
        </div>
    </div>
            
</div>

