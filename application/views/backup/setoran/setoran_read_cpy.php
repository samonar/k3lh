<!doctype html>
<html>
    <body>
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src=" http://localhost/spp/assets/foto/murid.png " alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">ADENIA NADIRA TUZENITHA</h3>

                        <p class="text-muted text-center">22527</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                            <b>Jenis Kelamin</b> <a class="float-right">Laki-Laki</a>
                            </li>
                            <li class="list-group-item">
                            <b>Kelas</b> <a class="float-right">10 IPS1</a>
                            </li>
                            <li class="list-group-item">
                            <b>No Virtual</b> <a class="float-right">70231225272017</a>
                            </li>
                            <li class="list-group-item">
                            <b> Saldo</b> <a class="float-right">Rp 100.000</a>
                            </li>
                            <li class="list-group-item">
                            <b>Tagihan</b> <a class="float-right">
                                Rp 2.650.000</a>
                            </li>
                            <a href=<?php echo base_url('setoran/create/'.$id_anggota)?> class="btn btn-success btn-block"><b>Tambah Setoran</b></a>
                            <a href=<?php echo base_url('setoran/update/'.$id_anggota)?> class="btn btn-warning btn-block"><b>Ubah Setoran</b></a>
                        </ul>


                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                                <th style="width: 20px;">Tgl</th>
                                <th style=" text-align:center; width:20%; ">Pagi</th>
                                <th style=" text-align:center;width:20%; ">Sore</th>
                                <th style=" text-align:center; width:20%;">Jumlah</th>
                                <th style="width: 20px;">Tgl</th>
                                <th style=" text-align:center; width:20%; ">Pagi</th>
                                <th style=" text-align:center;width:20%; ">Sore</th>
                                <th style=" text-align:center; width:20%;">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $kalender= CAL_GREGORIAN;
                            $bulan= date('m');
                            $tahun= date('Y');
                            $hari= cal_days_in_month($kalender,$bulan,$tahun);
                            $start=1;
                            for ($i=1; $i <= $hari ; $i++) { ?>
                            <tr>
                                <th><?php echo $start++ ?></th>
                                <td style=" text-align:center; ">
                                <?php 
                                if (empty($sesi1)) {
                                    $hsl=0;
                                } else {
                                    foreach ($sesi1 as $key) {
                                        if (date('j',strtotime($key->tgl))==$i){
                                            $hsl= $key->jml_setoran;
                                        break;
                                        }else {
                                         $hsl=0;   
                                        }
                                    }
                                } echo $hsl;
                                
                                ?><?php 
                                ?></td>
                                <td style=" text-align:center;">
                                <?php 
                                if (empty($sesi2)) {
                                    $hsl=0;
                                } else {
                                    foreach ($sesi2 as $key) {
                                        if (date('j',strtotime($key->tgl))==$i){
                                            $hsl= $key->jml_setoran;
                                        break;
                                        }else {
                                         $hsl=0;   
                                        }
                                    }
                                } echo $hsl;                                
                                ?>
                                </td>
                                <td style=" text-align:center;"><?php  
                                if (empty($sesi1)) {
                                    $hsl1=0;
                                } else {
                                    foreach ($sesi1 as $key) {
                                        if (date('j',strtotime($key->tgl))==$i){
                                            $hsl1= $key->jml_setoran;
                                        break;
                                        }else {
                                         $hsl1=0;   
                                        }
                                    }
                                }                                          
                                if (empty($sesi2)) {
                                    $hsl2=0;
                                } else {
                                    foreach ($sesi2 as $key) {
                                        if (date('j',strtotime($key->tgl))==$i){
                                            $hsl2= $key->jml_setoran;
                                        break;
                                        }else {
                                         $hsl2=0;   
                                        }
                                    }
                                } echo $hsl1+$hsl2;                                                                                                
                                $i++;
                                ?></td>

                                <!-- side 2 -->
                                <?php if ($i >= $hari) {
                                    break;
                                } ?>
                                <th><?php echo $start++ ?></th>
                                <td style=" text-align:center; ">
                                <?php 
                                if (empty($sesi1)) {
                                    $hsl=0;
                                } else {
                                    foreach ($sesi1 as $key) {
                                        if (date('j',strtotime($key->tgl))==$i){
                                            $hsl= $key->jml_setoran;
                                        break;
                                        }else {
                                         $hsl=0;   
                                        }
                                    }
                                } echo $hsl;
                                
                                ?><?php 
                                ?></td>
                                <td style=" text-align:center;">
                                <?php 
                                if (empty($sesi2)) {
                                    $hsl=0;
                                } else {
                                    foreach ($sesi2 as $key) {
                                        if (date('j',strtotime($key->tgl))==$i){
                                            $hsl= $key->jml_setoran;
                                        break;
                                        }else {
                                         $hsl=0;   
                                        }
                                    }
                                } echo $hsl;                                
                                ?>
                                </td>
                                <td style=" text-align:center;"><?php  
                                if (empty($sesi1)) {
                                    $hsl1=0;
                                } else {
                                    foreach ($sesi1 as $key) {
                                        if (date('j',strtotime($key->tgl))==$i){
                                            $hsl1= $key->jml_setoran;
                                        break;
                                        }else {
                                         $hsl1=0;   
                                        }
                                    }
                                }                                          
                                if (empty($sesi2)) {
                                    $hsl2=0;
                                } else {
                                    foreach ($sesi2 as $key) {
                                        if (date('j',strtotime($key->tgl))==$i){
                                            $hsl2= $key->jml_setoran;
                                        break;
                                        }else {
                                         $hsl2=0;   
                                        }
                                    }
                                } echo $hsl1+$hsl2;                                                                                                
                                // $i++;
                                ?></td>
                                
                            </tr>
                            
                            
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </body>
</html>

