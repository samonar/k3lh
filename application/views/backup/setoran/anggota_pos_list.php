<!doctype html>
<html>
    <body>
        <div class="card-body">
        <table class="table table-bordered table-striped" id="example1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Anggota</th>
                    <th>Nama Anggota</th>
                    <th>Pos</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $start=0;
                foreach ($list_anggota_pos->result() as $list)
                { ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td width="100px"><?php echo $list->id_anggota ?></td>
                    <td><?php echo $list->nama ?></td>
                    <td><?php echo $list->nm_pos ?></td>
                    <td style="text-align:center" width="200px">
                        <?php 
                            echo anchor(site_url('setoran/create/'.$list->id_anggota),'Read'); 
                        ?>
                    </td>
                </tr>
               <?php } ?>
            </tbody>
        </table>
        </div>    
    </body>
</html>