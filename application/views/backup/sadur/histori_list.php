<div class="row">
    <div class="col-md-6">
    <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pakan Masuk</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <table id="example5" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width: 1px; text-align:center;">No</th>
                    <th style="width: 90px; text-align: center">Bahan Baku</th>
                    <th style="text-align:center;">Pakan Masuk</th>
                    <th style="text-align:center;">Tgl</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $start=1; foreach ($data_pakan as $data) {
                        if ($data->stk_masuk <> null) {?>
                            <tr>
                            <td><?php echo $start++ ?></td>
                            <td><?php echo $data->nama_bahan?></td>
                            <td><?php echo $data->stk_masuk?></td>
                            <td> <?php echo $data->tgl ?></td>
                            <td>
                                <a href=<?php echo site_url('sadur/editMasuk/'.$data->id_stk) ?>>Ubah</a>
                            </td>
                        </tr>
                        <?php }        
                    } ?>
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pakan Sadur</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <table id="example4" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width: 1px; text-align:center;">No</th>
                    <th style="text-align: center">Bahan Baku</th>
                    <th style="text-align:center;">Pakan Sadur</th>
                    <th style="text-align:center;">Tgl</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                    <?php $start=1; foreach ($data_pakan as $data) {
                        if ($data->jml_pakai <> null) {?>
                            <tr>
                            <td><?php echo $start++ ?></td>
                            <td><?php echo $data->nama_bahan?></td>
                            <td><?php echo $data->jml_pakai?></td>
                            <td><?php echo $data->tgl?></td>
                            <td>
                                <a href=<?php echo site_url('sadur/editPakai/'.$data->id_stk) ?>>Ubah</a>
                            </td>
                        </tr>
                        <?php }        
                    } ?>
                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.col -->
</div>
