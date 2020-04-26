<style type="text/css">
  @page{margin:0.5cm;}

.tg .tg-op59{font-weight:bold;text-decoration:underline;font-size:12px;color:#000000;border-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-3spw{font-size:12px;color:#000000;border-color:#ffffff;text-align:left;}
.tg .tg-2{font-size:12px}
.tg .tg-002f{font-size:15px;color:#000000;border-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-16kt{font-size:20px;color:#000000;border-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-z6sj{text-decoration:underline;font-size:13px;color:#000000;border-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-3pyi{font-size:12px}
.tg .tg-us33{font-size:12px}

</style>

<?php if (empty($data_angsuranAktf)) {
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
                // echo $data->pokok;
        }
        }

$sisaTagihan=($tot_tagihan  - array_sum($sum_angsuran));
?>

<div  id="outtable">
    <table class="tg" style="undefined; width: 505px">
    <tr>
        <th class="tg-002f" colspan="4">KOPERASI UNIT DESA</th>
    </tr>
    <tr>
        <td class="tg-16kt" colspan="4">"TANI LUHUR"</td>
    </tr>
    <tr>
        <td class="tg-002f" colspan="4">KUD TANI LUHUR KASEMBON</td>
    </tr>
    <tr>
        <td class="tg-z6sj" colspan="4">BADAN HUKUM No. 4515/BH./II/1980</td>
    </tr>
    <tr>
        <td class="tg-002f" colspan="4">No. Telp. (0341) 327626</td>
    </tr>
    <tr>
        <td class="tg-ikqu" colspan="4">&nbsp;</td>
    </tr>
    <tr>
        <td class="tg-op59" colspan="4">PERMOHONAN PINJAMAN</td>
    </tr>
    <tr>
        <td class="tg-3spw">NAMA</td>
        <td class="tg-3pyi">: <?php echo strtoupper($identitas->nama) ?></td>
        <td class="tg-3spw" colspan="2"></td>
    </tr>
    <tr>
        <td class="tg-3spw">ALAMAT</td>
        <td class="tg-3pyi">: <?php echo strtoupper($identitas->nm_pos) ?></td>
        <td class="tg-3spw" colspan="2"></td>
    </tr>
    <tr>
        <td class="tg-3spw">NOMOR ANGGOTA</td>
        <td class="tg-3pyi">: <?php echo $identitas->id_anggota ?></td>
        <td class="tg-3spw" colspan="2"></td>
    </tr>
    <tr>
        <td class="tg-3spw">BESARNYA PERMOHONAN</td>
        <td class="tg-3pyi">: RP <?php echo $pinjaman_baru->nominal ?></td>
        <td class="tg-3spw"></td>
        <td class="tg-ikqu"></td>
    </tr>
    <tr>
        <td class="tg-3spw">JAMINAN</td>
        <td class="tg-3pyi" colspan="2">: BPKB/ MOTOR / MOBIL</td>
        
    </tr>
    <tr>
        <td class="tg-3spw">NOMOR POL</td>
        <td class="tg-3pyi">:</td>
        <td class="tg-3spw" colspan="2"></td>
    </tr>
    <tr>
        <td class="tg-3spw">SANGGUP MENGANGSUR</td>
        <td class="tg-3pyi">: <?php echo $pinjaman_baru->angsuran ?> Kali</td>
        <td class="tg-3spw"></td>
        <td class="tg-3spw"></td>
    </tr>
    <tr>
        <td class="tg-3spw">DISETUJUI SEBESAR</td>
        <td class="tg-3pyi">: Rp <?php echo $pinjaman_baru->nominal ?></td>
        <td class="tg-3spw"></td>
        <td class="tg-3spw"></td>
    </tr>
    <tr>
        <td class="tg-3spw">POTONGAN ADMINISTRASI</td>
        <td class="tg-3pyi">: Rp <?php echo $pinjaman_baru->nominal*0.01 ?></td>
        <td class="tg-3spw"></td>
        <td class="tg-3spw"></td>
    </tr>
    <tr>
        <td class="tg-3spw">PELUNASAN</td>
        <td class="tg-3pyi">: Rp <?php echo $sisaTagihan?></td>
        <td class="tg-3spw"></td>
        <td class="tg-3spw"></td>
    </tr>
    <tr>
        <td class="tg-3spw">LAIN-LAIN</td>
        <td class="tg-3pyi">: Rp</td>
        <td class="tg-3spw"></td>
        <td class="tg-3spw"></td>
    </tr>
    <tr>
        <td class="tg-3spw" colspan="4"></td>
    </tr>
    <tr>
        <td class="tg-3spw">YANG DITERIMA</td>
        <td class="tg-3pyi">: Rp <?php echo ($pinjaman_baru->nominal -($pinjaman_baru->nominal * 0.01) - $sisaTagihan ) ?></td>
        <td class="tg-3spw"></td>
        <td class="tg-3spw"></td>
    </tr>
    <tr>
        <td class="tg-3spw" colspan="4"></td>
    </tr>
    <tr>
        <td class="tg-3spw" colspan="4">SANGGUP MENAATI PERATURAN-PERATURAN KUD/KOPERASI</td>
    </tr>
    <tr>
        <td class="tg-3spw"></td>
        <td class="tg-3pyi"></td>
        <td class="tg-3spw"></td>
        <td class="tg-3spw"></td>
    </tr>
    <tr>
        <td class="tg-2"></td>
        <td class="tg-2"></td>
        <td class="tg-2" colspan="2" style="text-align: right;padding-right: 10px;">Kasembon,<?php echo date('d').' '.date('M').' '.date('Y')?> </td>
    </tr>
    <tr>
        <td class="tg-3spw"></td>
        <td class="tg-3pyi"></td>
        <td class="tg-3spw"></td>
        <td class="tg-3pyi" >KEPALA BAGIAN</td>
    </tr>
    <tr>
        <td class="tg-3pyi">PEMINJAM</td>
        <td class="tg-3pyi"></td>
        <td class="tg-3pyi"></td>
        <td class="tg-3pyi" style="padding-left:10px">Simpan Pinjam</td>
    </tr>
    <tr>
        <td class="tg-3spw">&nbsp;</td>
        <td class="tg-3pyi"></td>
        <td class="tg-3spw"></td>
        <td class="tg-3spw">&nbsp;</td>
    </tr>
    <tr>
        <td class="tg-3spw">&nbsp;</td>
        <td class="tg-3pyi"></td>
        <td class="tg-3spw"></td>
        <td class="tg-3spw">&nbsp;</td>
    </tr>
    <tr>
        <td class="tg-3spw">&nbsp;</td>
        <td class="tg-3pyi"></td>
        <td class="tg-3spw"></td>
        <td class="tg-3spw">&nbsp;</td>
    </tr>
    <tr>
        <td class="tg-3pyi"><?php echo strtoupper($identitas->nama) ?></td>
        <td class="tg-3pyi"></td>
        <td class="tg-3pyi"></td>
        <td class="tg-3pyi" style="padding-left:30px">YULIS</td>
    </tr>
    </table>
</div>
