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
                            <a href="http://localhost/spp/tagihan_siswa_kelas/excel/22527" class="btn btn-primary btn-block"><b>Laporan Administrasi</b></a>

                        </ul>


                    </div>
                </div>
            </div>
            <div class="col-md-9"></div>
        </div>
            <table class="table">
                <tr>
                    <th>tgl</th>
                    <th>pagi</th>
                    <th>sore</th>
                    <th>jumlah harian</th>
                    <th>tgl</th>
                    <th>pagi</th>
                    <th>sore</th>
                    <th>jumlah harian</th>
                </tr>

                <?php 
                $kalender= CAL_GREGORIAN;
                $bulan= date('m');
                $tahun= date('Y');
                $hari= cal_days_in_month($kalender,$bulan,$tahun);
                $start=1;
                for ($i=0; $i < $hari ; $i++) { ?>
                <tr>
                    <td><?php echo $start++  ?></td>
                    <td><?php if (null!==$data[$i]->tgl ) {
                        echo $data[$i]->jml_setoran;
                    }else{
                        echo 0;
                    }  ?></td>
                    <td><?php if (isset($data[$i]->setoran1)) {
                        echo $data[$i]->setoran1;
                    } else {
                        echo 0;
                    }?>
                    </td>
                    <td><?php if (isset($data[$i]->setoran1)) {  
                        echo $data[$i]->setoran1+$data[$i]->jml_setoran ;
                    }else{echo 0;} $i++;?></td>

                    <td><?php echo $start++  ?></td>
                    <td><?php if (isset($data[$i]->jml_setoran)) {
                        echo $data[$i]->jml_setoran;
                    }else{
                        echo 0;
                    }  ?></td>
                    <td><?php if (isset($data[$i]->setoran1)) {
                        echo $data[$i]->setoran1;
                    } else {
                        echo 0;
                    }?>
                    </td>
                    <td><?php if (isset($data[$i]->setoran1)) {  
                        echo $data[$i]->setoran1+$data[$i]->jml_setoran ;
                    }else{echo 0;}?></td>
                </tr>
                <?php }
                ?>
            
            
            
            </table>
    </body>
</html>
