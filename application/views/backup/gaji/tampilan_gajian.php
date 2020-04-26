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
                <b>Bulan</b> <a class="float-right"><?php echo date('M') ?></a>
                </li>
            </ul>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class="col-md-9">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='pembayaran_susu' ) {
                    echo "active";
                } ?>" href="#bayar" data-toggle="tab">Pembayaran Susu</a></li>

                <li class="nav-item"><a class="nav-link <?php if (isset($show) and $show=='hist_pembayaran_susu' ) {
                    echo "active";
                } ?>" href="#hist_bayar" data-toggle="tab">Hist. Pembayaran Susu</a></li>
            </ul>
        </div> 
        
        <div class="card-body">
            <div class="tab-content">
            <div class="<?php if (isset($show) and $show=='pembayaran_susu') {echo "active";} ?> tab-pane" id=bayar>
                <table class="table table-bordered " id="" >
                    <thead>
                        <th style="text-align:center;">Tanggal</th>
                        <th style="text-align:center;">Jumlah Susu</th>
                        <th style="text-align:center;">Harga @/L</th>
                        <th style="text-align:center;">Jumlah</th>
                    </thead>
                    <tbody>
                    <?php 

                    //setoran susu
                    if (empty($data_setoran)) {
                        $periode1[]=0;
                        $periode2[]=0;
                        $periode3[]=0;
                    }else {
                        foreach ($data_setoran as $setoran) {
                            if (date('d',strtotime($setoran->tgl)) <=10 ) {
                                $periode1[]=$setoran->jml_setoran;
                            }elseif (  date('d',strtotime($setoran->tgl)) <= 20 ) {
                                $periode2[]=$setoran->jml_setoran;
                                // echo $setoran->tgl."<br>";
                            }else {
                                $periode3[]=$setoran->jml_setoran;
                                // echo $setoran->tgl."<br>";
                            }
                        }
                    }
                    $tot_setoran=((array_sum($periode3)+array_sum($periode2)+array_sum($periode1)) * $data_hargaAktif->nominal_harga);
                    $simsuk=(array_sum($periode1 + $periode2 + $periode3) * 100);
                    $keswan=(array_sum($periode1 + $periode2 + $periode3) * 35);
                    $dana_desa=(array_sum($periode1 + $periode2 + $periode3) * 3);

                    //pakan (konsentrat)
                    if (empty($data_pakanPakai)) {
                        $sum_pakan[]=0;
                    } else {
                        foreach ($data_pakanPakai as $data) {
                            $sum_pakan[]=$data->hrg_jml_pakan;
                        }
                    }
                    
                    if (empty($data_pakanBayar)) {
                        $sum_bayar[]=0;
                    } else {
                        foreach ($data_pakanBayar as $data) {
                            $sum_bayar[]=$data->nominal_byr;
                        }
                    }
                    $tagihan_pakan=(array_sum($sum_pakan)-array_sum($sum_bayar));

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
                    $gnrt_tagihan=$pokok;
                    $sisaTagihan=($tot_tagihan - array_sum($sum_angsuran));

                    if( $gnrt_tagihan==0){
                        $tagihan_angsuran=$sisaTagihan;
                    }elseif ($gnrt_tagihan > $sisaTagihan) {
                        $tagihan_angsuran=$sisaTagihan;
                    }elseif($gnrt_tagihan < $sisaTagihan) {
                        $tagihan_angsuran=$gnrt_tagihan;
                    }else {
                        $tagihan_angsuran=$gnrt_tagihan;
                    }
                    $bunga=$sisaTagihan*0.02;
                    $tagihan_angsuran=+$tagihan_angsuran+$bunga;

                    //menampilkan utang peternak di toko
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
                    $tagihan_toko=(array_sum($sum_utangToko)-array_sum($sum_bayarToko));                

                    //total potongan
                    
                    ?>
                    <form action="<?php echo $action ?>" method="POST">
                        <tr>
                            <td style="text-align:center;">01 s/d 10</td>
                            <td style="text-align:center;"><?php echo array_sum($periode1) ?></td>
                            <td style="text-align:center;">Rp <?php echo $data_hargaAktif->nominal_harga ?></td>
                            <td style="text-align:center;">Rp <?php echo ($data_hargaAktif->nominal_harga * array_sum($periode1)) ?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">11 s/d 20</td>
                            <td style="text-align:center;"><?php echo array_sum($periode2) ?></td>
                            <td style="text-align:center;">Rp <?php echo $data_hargaAktif->nominal_harga ?></td>
                            <td style="text-align:center;">Rp <?php echo ($data_hargaAktif->nominal_harga * array_sum($periode2)) ?></td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">21 s/d 31</td>
                            <td style="text-align:center;"><?php echo array_sum($periode3) ?></td>
                            <td style="text-align:center;">Rp <?php echo $data_hargaAktif->nominal_harga ?></td>
                            <td style="text-align:center;">Rp <?php echo ($data_hargaAktif->nominal_harga * array_sum($periode3)) ?></td>
                        </tr>
                        <tr>
                            <th colspan="3" style="text-align:center;">Jumlah</th>
                            <td style="text-align:center;">Rp <?php echo $tot_setoran?></td>
                            <input type="hidden" name="setoran" value=<?php echo $tot_setoran?>>
                        </tr>
                        <tr>
                            <td colspan="4" ></td>
                        </tr>
                        <tr>
                            <th colspan="3" >PENERIMAAN KOTOR</th> 
                            <td style="text-align:center;">Rp <?php  echo $tot_setoran ?></td>
                        </tr>
                        <tr>
                            <th colspan="4" >POTONGAN</th> 
                        </tr>
                        <tr>
                            <th style="text-align:center;">Simpanan Wajib</th>
                            <td colspan="3"><input type="hidden" class="form-control" name="simpanan_wajib" id="" value=10000>Rp 10.000</td>
                            <input type="hidden" class="form-control" name="id_anggota" id="" value=<?php echo $identitas->id_anggota ?> >
                            
                        </tr>
                        <tr>
                            <th style="text-align:center;">Simpanan Sukarela</th>
                            <td colspan="3"><input type="hidden" class="form-control" name="simpanan_sukarela" id="" value=<?php echo $simsuk ?>>Rp <?php echo $simsuk ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Kesehatan Hewan</th>
                            <td colspan="3"><input type="hidden" name="keswan" id="" value=<?php echo $keswan ?>>Rp <?php echo $keswan ?> </td>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Dana Desa</th>
                            <td colspan="3"><input type="hidden" name="dana_desa" id="" value=<?php echo $dana_desa ?>>Rp <?php echo $dana_desa ?></td>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Konsentrat</th>
                            <td colspan="3"  class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control col-md-8" type="number" id="konsentrat" name="konsentrat" id="" value=<?php echo $tagihan_pakan ?> onkeypress="return handleEnter(this, event)" onchange="summation();"></td>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Simpan Pinjam</th>
                            <td colspan="3" class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input type="hidden" name="bunga" value="<?php echo $bunga ?>">
                                <input class="form-control col-md-8" type="number" id="sp" name="sp" value=<?php echo $tagihan_angsuran ?> onkeypress="return handleEnter(this, event)" onchange="summation();">
                            </td>
                        
                        </tr>
                        <tr>
                            <th style="text-align:center;">Toko</th>
                            <td colspan="3"  class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control col-md-8" type="number" id="toko" name="toko" value=<?php echo $tagihan_toko ?> onkeypress="return handleEnter(this, event)" onchange="summation();">
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Potongan Lain</th>
                            <td colspan="3"  class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div><input class="form-control col-md-8" type="number" id="potlain" name="potlain" value="0" onchange="summation();"></td>
                        </tr>
                        <tr >
                            <th colspan="2" >JUMLAH POTONGAN</th>
                            
                            <th colspan="4"  id="total" style="text-align:left;" ><?php 
                            $tot_potongan=(10000+$simsuk+$keswan+$dana_desa+$tagihan_pakan+$tagihan_angsuran+$tagihan_toko); echo "Rp ".$tot_potongan  ?></th>
                            
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <th colspan="3" >TOTAL PENDAPATAN BERSIH</th>
                            <th id="totalbersih" style="text-align: center;">Rp <?php echo $tot_setoran-$tot_potongan  ?></th>
                        </tr>
                    </tbody>
                    <tr>
                    <td>
                        <a href="http://localhost/kud_tl/gaji" class="btn btn-secondary">cancel</a>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-info float-right">simpan</button>
                    </td>
                    </tr>
                    </form>
                </table>
            </div>
            <div class="<?php if (isset($show) and $show=='hist_pembayaran_susu') {echo "active";} ?> tab-pane" id=hist_bayar>
            <table class="table table-bordered" id="example1">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th> Tot. Pembayaran</th>
                    <th>Bulan</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($data_bayarSusu as $data) { ?>
                    <tr>
                        <td><?php echo $no++?></td>
                        <td><?php echo $data->nama?></td>
                        <td><?php echo ($data->setoran-($data->sim_wajib+$data->sim_sukarela+$data->keswan
                        +$data->dana_desa+$data->pakan+$data->sp+$data->toko+$data->pot_lain)) ?> </td>
                        <td><?php echo date('M-Y',strtotime($data->bulan))?></td>
                        <td>
                        <a href="<?php echo site_url('gaji/delete_gaji/'.$data->id_gaji.'/'.$data->id_anggota)?>" onclick="return checkDelete()">Hapus</a>
                        <a href="<?php echo site_url('gaji/bukti_gaji/'.$data->id_gaji)?>">Cetak</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function summation()
    {
        var spwajib = 10000;
        var simsuk = <?= $simsuk ?>;
        var keswan = <?= $keswan ?>;
        var dana = <?= $dana_desa ?>;
        var totalsetor = <?= $tot_setoran ?>;
        var potlain = document.getElementById('potlain').value;
        var kons = document.getElementById('konsentrat').value;
        var sp = document.getElementById('sp').value;
        var toko = document.getElementById('toko').value;
        var total = (kons*1)+(sp*1)+(toko*1)+spwajib+simsuk+keswan+dana+(potlain*1);
        var totalbersih = totalsetor - total;
        document.getElementById('total').innerHTML = "Rp "+total;
        document.getElementById('totalbersih').innerHTML = "Rp "+totalbersih;
    }
    function handleEnter (field, event) {
		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
		if (keyCode == 13) {
			var i;
			for (i = 0; i < field.form.elements.length; i++)
				if (field == field.form.elements[i])
					break;
			i = (i + 1) % field.form.elements.length;
			field.form.elements[i].focus();
			return false;
		} 
		else
		return true;
	}      
</script>
<script language="javascript" type="text/javascript">
    function checkDelete(){
        return confirm('Yakin menghapus data ?');
    }
    </script>
<?php
