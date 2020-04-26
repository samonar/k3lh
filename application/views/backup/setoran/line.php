<div class="col-md-9">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#bayar" data-toggle="tab">Pembayaran Susu</a></li>

                <li class="nav-item"><a class="nav-link " href="#hist_bayar" data-toggle="tab">Hist. Pembayaran Susu</a></li>
            </ul>
        </div> 
        
        <div class="card-body">
            <div class="tab-content">
            <div class="active tab-pane" id="bayar">
                <table class="table table-bordered " id="">
                    <thead>
                        <tr><th style="text-align:center;">Tanggal</th>
                        <th style="text-align:center;">Jumlah Susu</th>
                        <th style="text-align:center;">Harga @/L</th>
                        <th style="text-align:center;">Jumlah</th>
                    </tr></thead>
                    <tbody>
                                        <form action="http://localhost/kud_tl/gaji/gaji_peternak_action" method="POST"></form>
                        <tr>
                            <td style="text-align:center;">01 s/d 10</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">Rp 5550</td>
                            <td style="text-align:center;">Rp 0</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">11 s/d 20</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">Rp 5550</td>
                            <td style="text-align:center;">Rp 0</td>
                        </tr>
                        <tr>
                            <td style="text-align:center;">21 s/d 31</td>
                            <td style="text-align:center;">0</td>
                            <td style="text-align:center;">Rp 5550</td>
                            <td style="text-align:center;">Rp 0</td>
                        </tr>
                        <tr>
                            <th colspan="3" style="text-align:center;">Jumlah</th>
                            <td style="text-align:center;">Rp 0</td>
                            <input type="hidden" name="setoran" value="0">
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <th colspan="3">PENERIMAAN KOTOR</th> 
                            <td style="text-align:center;">Rp 0</td>
                        </tr>
                        <tr>
                            <th colspan="4">POTONGAN</th> 
                        </tr>
                        <tr>
                            <th style="text-align:center;">Simpanan Wajib</th>
                            <td colspan="3"><input type="hidden" class="form-control" name="simpanan_wajib" id="" value="10000">Rp 10.000</td>
                            <input type="hidden" class="form-control" name="id_anggota" id="" value="2">
                            
                        </tr>
                        <tr>
                            <th style="text-align:center;">Simpanan Sukarela</th>
                            <td colspan="3"><input type="hidden" class="form-control" name="simpanan_sukarela" id="" value="0">Rp 0 </td>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Kesehatan Hewan</th>
                            <td colspan="3"><input type="hidden" name="keswan" id="" value="0">Rp 0 </td>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Dana Desa</th>
                            <td colspan="3"><input type="hidden" name="dana_desa" id="" value="0">Rp 0</td>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Konsentrat</th>
                            <td colspan="3" class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control col-md-8" type="number" id="konsentrat" name="konsentrat" value="0" onkeypress="return handleEnter(this, event)" onchange="summation();"></td>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Simpan Pinjam</th>
                            <td colspan="3" class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input type="hidden" name="bunga" value="0">
                                <input class="form-control col-md-8" type="number" id="sp" name="sp" value="0" onkeypress="return handleEnter(this, event)" onchange="summation();">
                            </td>
                        
                        </tr>
                        <tr>
                            <th style="text-align:center;">Toko</th>
                            <td colspan="3" class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control col-md-8" type="number" id="toko" name="toko" value="0" onkeypress="return handleEnter(this, event)" onchange="summation();">
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center;">Potongan Lain</th>
                            <td colspan="3" class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div><input class="form-control col-md-8" type="number" id="potlain" name="potlain" value="0" onchange="summation();"></td>
                        </tr>
                        <tr>
                            <th colspan="2">JUMLAH POTONGAN</th>
                            
                            <th colspan="4" id="total" style="text-align:left;">Rp 10000</th>
                            
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <th colspan="3">TOTAL PENDAPATAN BERSIH</th>
                            <th id="totalbersih" style="text-align: center;">Rp -10000</th>
                        </tr>
                    </tbody>
                    <tbody><tr>
                    <td>
                        <a href="http://localhost/kud_tl/gaji" class="btn btn-secondary">cancel</a>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-info float-right">simpan</button>
                    </td>
                    </tr>
                    
                </tbody></table>
            </div>
            <div class=" tab-pane" id="hist_bayar">
            <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-bordered dataTable no-footer" id="example1" role="grid" aria-describedby="example1_info">
                <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 0px;">No</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 0px;">Nama</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label=" Tot. Pembayaran: activate to sort column ascending" style="width: 0px;"> Tot. Pembayaran</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Bulan: activate to sort column ascending" style="width: 0px;">Bulan</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 0px;">Aksi</th></tr></thead>
                <tbody>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    <tr role="row" class="odd">
                        <td class="sorting_1">1</td>
                        <td>budiman</td>
                        <td>6022379 </td>
                        <td>Apr-2020</td>
                        <td>
                        <a href="http://localhost/kud_tl/gaji/delete_gaji/49/2" onclick="return checkDelete()">Hapus</a>
                        <a href="http://localhost/kud_tl/gaji/bukti_gaji/49">Cetak</a>
                        </td>
                    </tr><tr role="row" class="even">
                        <td class="sorting_1">2</td>
                        <td>budiman</td>
                        <td>5577799 </td>
                        <td>Mar-2020</td>
                        <td>
                        <a href="http://localhost/kud_tl/gaji/delete_gaji/22/2" onclick="return checkDelete()">Hapus</a>
                        <a href="http://localhost/kud_tl/gaji/bukti_gaji/22">Cetak</a>
                        </td>
                    </tr><tr role="row" class="odd">
                        <td class="sorting_1">3</td>
                        <td>budiman</td>
                        <td>6061799 </td>
                        <td>Mar-2020</td>
                        <td>
                        <a href="http://localhost/kud_tl/gaji/delete_gaji/29/2" onclick="return checkDelete()">Hapus</a>
                        <a href="http://localhost/kud_tl/gaji/bukti_gaji/29">Cetak</a>
                        </td>
                    </tr><tr role="row" class="even">
                        <td class="sorting_1">4</td>
                        <td>budiman</td>
                        <td>6060799 </td>
                        <td>Mar-2020</td>
                        <td>
                        <a href="http://localhost/kud_tl/gaji/delete_gaji/36/2" onclick="return checkDelete()">Hapus</a>
                        <a href="http://localhost/kud_tl/gaji/bukti_gaji/36">Cetak</a>
                        </td>
                    </tr><tr role="row" class="odd">
                        <td class="sorting_1">5</td>
                        <td>budiman</td>
                        <td>6062299 </td>
                        <td>Mar-2020</td>
                        <td>
                        <a href="http://localhost/kud_tl/gaji/delete_gaji/43/2" onclick="return checkDelete()">Hapus</a>
                        <a href="http://localhost/kud_tl/gaji/bukti_gaji/43">Cetak</a>
                        </td>
                    </tr><tr role="row" class="even">
                        <td class="sorting_1">6</td>
                        <td>budiman</td>
                        <td>5577799 </td>
                        <td>Mar-2020</td>
                        <td>
                        <a href="http://localhost/kud_tl/gaji/delete_gaji/21/2" onclick="return checkDelete()">Hapus</a>
                        <a href="http://localhost/kud_tl/gaji/bukti_gaji/21">Cetak</a>
                        </td>
                    </tr><tr role="row" class="odd">
                        <td class="sorting_1">7</td>
                        <td>budiman</td>
                        <td>5577799 </td>
                        <td>Mar-2020</td>
                        <td>
                        <a href="http://localhost/kud_tl/gaji/delete_gaji/28/2" onclick="return checkDelete()">Hapus</a>
                        <a href="http://localhost/kud_tl/gaji/bukti_gaji/28">Cetak</a>
                        </td>
                    </tr><tr role="row" class="even">
                        <td class="sorting_1">8</td>
                        <td>budiman</td>
                        <td>6060799 </td>
                        <td>Mar-2020</td>
                        <td>
                        <a href="http://localhost/kud_tl/gaji/delete_gaji/35/2" onclick="return checkDelete()">Hapus</a>
                        <a href="http://localhost/kud_tl/gaji/bukti_gaji/35">Cetak</a>
                        </td>
                    </tr><tr role="row" class="odd">
                        <td class="sorting_1">9</td>
                        <td>budiman</td>
                        <td>6061799 </td>
                        <td>Mar-2020</td>
                        <td>
                        <a href="http://localhost/kud_tl/gaji/delete_gaji/42/2" onclick="return checkDelete()">Hapus</a>
                        <a href="http://localhost/kud_tl/gaji/bukti_gaji/42">Cetak</a>
                        </td>
                    </tr><tr role="row" class="even">
                        <td class="sorting_1">10</td>
                        <td>budiman</td>
                        <td>5577799 </td>
                        <td>Mar-2020</td>
                        <td>
                        <a href="http://localhost/kud_tl/gaji/delete_gaji/27/2" onclick="return checkDelete()">Hapus</a>
                        <a href="http://localhost/kud_tl/gaji/bukti_gaji/27">Cetak</a>
                        </td>
                    </tr></tbody>
            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 32 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1" data-dt-idx="5" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
            </div>
        </div>
    </div>
</div>

<div class="card">
  <div class="card-header no-border">
    <div class="d-flex justify-content-between">
      <h3 class="card-title">Grafik TS Susu</h3>
    </div>
  </div>
  <div class="card-body">
    <div class="d-flex">
    </div>
    <!-- /.d-flex -->

    <div class="position-relative mb-4">
      <canvas id="visitors-chart" height="350"></canvas>
    </div>

    <div class="d-flex flex-row justify-content-end">
      <span class="mr-2">
        <i class="fa fa-square text-primary"></i>Tahun Ini
      </span>

      <span>
        <i class="fa fa-square " style="color:#ffa500"></i>Tahun Lalu
      </span>
    </div>
  </div>
</div>