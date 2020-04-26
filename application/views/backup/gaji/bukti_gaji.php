<style type="text/css">
  @page{margin:0.5cm;}
.tg  {border-collapse:collapse;border-spacing:0;}

.tg .tg-zv4m{
    padding-left:10px;
}
.tg .tg-15{
    padding-left:15px;
}
/* .tg td{font-family:Arial, sans-serif;font-size:14px;padding:2px 4px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;} */
/* .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:2px 4px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;} */
.tg .tg-12{padding: 8px; border-color:#ffffff;text-align:left;vertical-align:top}
.tg .tg-c3ow{border-right: 1px solid;border-top: 1px solid;border-bottom: 1px solid;text-align:center;vertical-align:top}
.tg .tg-gaoc{border-right: 1px solid;border-top: 1px solid;border-bottom: 1px solid;text-align:center;vertical-align:top}
.tg .tg-1{border-top: 1px solid;border-bottom: 1px solid;text-align:center;vertical-align:top}
.tg .tg-2{border-top: 1px solid;border-bottom: 1px solid;text-align:center;vertical-align:top}
.tg .tg-il3a{color:#ffffff;border-color:#ffffff;text-align:left;vertical-align:top}
#outtable{
      
      border:1px solid black;
      position:absolute; 
      padding-left:1px;
    }
</style>

<!-- data data php -->
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
<<<<<<< HEAD
        

=======
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
            $sum_sp=0;
            $total=0;
        }else {
            $sum_sp=($data_angsuranAktf->nominal / $data_angsuranAktf->angsuran);
            $total=$data_angsuranAktf->nominal;
        }
        
        //menampilkan data pembayaran angsuran sp
        if (empty($data_bayarAktf)) {
            $sum_angsuran[]=0;
        }else {
            foreach ($data_bayarAktf as $data) {
                $sum_angsuran[]=$data->pokok;
        }
        }
        $gnrt_tagihan=$sum_sp;
        $sisaTagihan=($total - array_sum($sum_angsuran));

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
        
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
?>

<div id="outtable">
    <table class="tg" style="undefined;table-layout: fixed; width: 505px">
        <colgroup>
        <col style="width: 129px">
        <col style="width: 135px">
        <col style="width: 116px">
        <col style="width: 124px">
        </colgroup>
        <tr>
            <th class="tg-2" colspan="4" rowspan="3">KOPERASI UNIT DESA<br>KUD<br>BADAN HUKUM</th>
        </tr>
        <tr>
        </tr>
        <tr>
        </tr>
        <tr>
            <td class="tg-12" colspan="4"></td>
        </tr>
        <tr>
            <td class="tg-zv4m">NAMA</td>
            <td class="tg-zv4m"><?php echo strtoupper($identitas->nama) ?></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m">POS</td>
        </tr>
        <tr>
            <td class="tg-zv4m">NO.AGT</td>
            <td class="tg-zv4m"><?php echo $identitas->id_anggota?></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"><?php echo strtoupper( $identitas->nm_pos)?></td>
        </tr>
        <tr>
            <td class="tg-zv4m">BULAN</td>
            <td class="tg-zv4m"><?php $bln_gaji=date('m')-1;
            $bulan=['JANUARI','FEBRUARI','MARET','APRIL','MEI','JUNI','JULI','AGUSTUS','SEPTEMBER','OKTOBER','NOVEMBER','DESEMBER'];
            echo $bulan[$bln_gaji-1];
            ?></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
        </tr>
        <tr>
            <td class="tg-gaoc">TANGGAL</td>
            <td class="tg-gaoc">JUMLAH SUSU</td>
            <td class="tg-gaoc">HARGA @/L</td>
            <td class="tg-1">JUMLAH</td>
        </tr>
        <tr>
            <td class="tg-c3ow">01 s/d 10</td>
            <td class="tg-c3ow"><?php echo array_sum($periode1)?> L</td>
            <td class="tg-c3ow">Rp <?php echo $data_hargaAktif->nominal_harga ?></td>
<<<<<<< HEAD
            <td style="text-align:right; padding-right:10px"   class="tg-2">Rp <?php echo ($data_hargaAktif->nominal_harga * array_sum($periode1)) ?></td>
=======
            <td style="text-align:right;"  class="tg-2">Rp <?php echo ($data_hargaAktif->nominal_harga * array_sum($periode1)) ?></td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
        </tr>
        <tr>
            <td class="tg-c3ow">11 s/d 20</td>
            <td class="tg-c3ow"><?php echo array_sum($periode2) ?> L</td>
            <td class="tg-c3ow">Rp <?php echo $data_hargaAktif->nominal_harga ?></td>
<<<<<<< HEAD
            <td style="text-align:right; padding-right:10px"  class="tg-2">Rp <?php echo ($data_hargaAktif->nominal_harga * array_sum($periode2)) ?>
=======
            <td style="text-align:right;" class="tg-2">Rp <?php echo ($data_hargaAktif->nominal_harga * array_sum($periode2)) ?>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
        </tr>
        <tr>
            <td class="tg-c3ow">21 s/d 31</td>
            <td class="tg-c3ow"><?php echo array_sum($periode3) ?> L</td>
            <td class="tg-c3ow">Rp <?php echo $data_hargaAktif->nominal_harga ?></td>
<<<<<<< HEAD
            <td style="text-align:right; padding-right:10px"  class="tg-2">Rp <?php echo ($data_hargaAktif->nominal_harga * array_sum($periode3)) ?>
=======
            <td style="text-align:right;" class="tg-2">Rp <?php echo ($data_hargaAktif->nominal_harga * array_sum($periode3)) ?>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
        </tr>
        <tr>
            <td class="tg-c3ow">JUMLAH</td>
            <td class="tg-c3ow"><?php echo array_sum($periode1)+ array_sum($periode2) + array_sum($periode3) ?> L</td>
            <td class="tg-c3ow"></td>
<<<<<<< HEAD
            <td style="text-align:right; padding-right:10px"  class="tg-2">Rp <?php echo $tot_setoran?></td>
            
=======
            <td style="text-align:right;" class="tg-2">Rp <?php echo $tot_setoran?></td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
        </tr>
        <tr>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
        </tr>
        <tr>
            <td colspan="2" class="tg-zv4m">PENERIMAAN KOTOR</td>
            <td class="tg-zv4m"></td>
<<<<<<< HEAD
            <td class="tg-zv4m" style="text-align:right; padding-right:10px">Rp <?php  echo $tot_setoran ?></td>
=======
            <td class="tg-zv4m">Rp <?php  echo $tot_setoran ?></td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
        </tr>
        <tr>
            <td class="tg-zv4m">POTONGAN</td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
        </tr>
        <tr>
            <td class="tg-15" colspan="2">Simpanan Wajib</td>
            <td class="tg-15">Rp 10.000</td>
            <td class="tg-15"></td>
        </tr>
        <tr>
            <td class="tg-15" colspan="2">Simpanan Sukarela</td>
<<<<<<< HEAD
            <td class="tg-15">Rp <?php echo $sim_sukarela ?></td>
=======
            <td class="tg-15">Rp <?php echo $simsuk ?></td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
            <td class="tg-15"></td>
        </tr>
        <tr>
            <td class="tg-15" colspan="2">Kesehatan Hewan</td>
<<<<<<< HEAD
            <td class="tg-15">Rp <?php echo $data_keswan ?></td>
=======
            <td class="tg-15">Rp <?php echo $keswan ?></td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
            <td class="tg-15"></td>
        </tr>
        <tr>
            <td class="tg-15" colspan="2">Dana Desa</td>
<<<<<<< HEAD
            <td class="tg-15">Rp <?php echo $data_dana_desa ?></td>
=======
            <td class="tg-15">Rp <?php echo $dana_desa ?></td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
            <td class="tg-15"></td>
        </tr>
        <tr>
            <td class="tg-15" colspan="2">Konsentrat</td>
<<<<<<< HEAD
            <td class="tg-15">Rp <?php echo $data_pakan ?></td>
=======
            <td class="tg-15">Rp <?php echo $tagihan_pakan ?></td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
            <td class="tg-15"></td>
        </tr>
        <tr>
            <td class="tg-15" colspan="2">Simpan Pinjam</td>
<<<<<<< HEAD
            <td class="tg-15">Rp <?php echo $data_angsuran ?></td>
=======
            <td class="tg-15">Rp <?php echo $tagihan_angsuran ?></td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
            <td class="tg-15"></td>
        </tr>
        <tr>
            <td class="tg-15" colspan="2">Toko</td>
<<<<<<< HEAD
            <td class="tg-15">Rp <?php echo $data_toko ?></td>
=======
            <td class="tg-15">Rp <?php echo $tagihan_toko ?></td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
            <td class="tg-15"></td>
        </tr>
        <tr>
            <td class="tg-15" colspan="2">POT. Lain Lain</td>
<<<<<<< HEAD
            <td class="tg-15"><?php echo $data_lain ?></td>
=======
            <td class="tg-15">-</td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
            <td class="tg-15"></td>
        </tr>
        <tr>
            <td class="tg-15" colspan="2">Simpanan Pokok</td>
            <td class="tg-15">-</td>
            <td class="tg-15"></td>
        </tr>
        <tr>
<<<<<<< HEAD
            <td class="tg-zv4m" colspan="3" >JUMLAH POTONGAN</td>
            <td class="tg-zv4m" style="text-align:right; padding-right:10px" ><?php $tot_potongan=(10000+$sim_sukarela+$data_keswan+$data_dana_desa+$data_pakan+$data_angsuran+$data_toko); echo "Rp ".$tot_potongan  ?></td>
        </tr>
        <tr>
            <td class="tg-zv4m" colspan="3">TOTAL PENDAPATAN BERSIH</td>
            <td class="tg-zv4m" style="text-align:right; padding-right:10px">Rp <?php echo $tot_setoran-$tot_potongan  ?></td>
=======
            <td class="tg-zv4m" colspan="2">JUMLAH POTONGAN</td>
            <td class="tg-zv4m" colspan="2"><?php $tot_potongan=(10000+$simsuk+$keswan+$dana_desa+$tagihan_pakan+$tagihan_angsuran+$tagihan_toko); echo "Rp ".$tot_potongan  ?></td>
        </tr>
        <tr>
            <td class="tg-zv4m" colspan="3">TOTAL PENDAPATAN BERSIH</td>
            <td class="tg-zv4m"><?php echo $tot_setoran-$tot_potongan  ?></td>
>>>>>>> 6b44dd0b784e06f8d40365a030bf39d209aa0539
        </tr>
        <tr>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
        </tr>
        <tr>
            <td class="tg-zv4m" colspan="3">KASEMBON,&nbsp;&nbsp;<?php echo date('d').' '.$bulan[$bln_gaji].' '.date('Y') ?></td>
            <td class="tg-zv4m"></td>
        </tr>
        <tr>
            <td class="tg-zv4m">PENERIMA</td>
            <td class="tg-zv4m">PETUGAS</td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
        </tr>
        <tr>
            <td class="tg-il3a">&nbsp</td>
            <td class="tg-il3a"></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
        </tr>
        <tr>
            <td class="tg-il3a">&nbsp</td>
            <td class="tg-il3a"></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
        </tr>
        <tr>
            <td class="tg-il3a">&nbsp</td>
            <td class="tg-il3a"></td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
        </tr>
        <tr>
            <td class="tg-zv4m"><?php echo strtoupper($identitas->nama)?> </td>
            <td class="tg-zv4m">Chusna Hidayati</td>
            <td class="tg-zv4m"></td>
            <td class="tg-zv4m"></td>
        </tr>
    </table>
</div>