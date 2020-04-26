<!doctype html>
<html>
    <body>
        <div class="row" style="margin-bottom: 10px">
            
            <div class="col-md-1 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="float-sm-right">
                <form action="<?php echo site_url('setoran/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('setoran'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Anggota</th>
		<th>Tgl</th>
		<th>Sesi</th>
		<th>Jml Setoran</th>
		<th>Action</th>
            </tr><?php
            foreach ($setoran_data as $setoran)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $setoran->id_anggota ?></td>
			<td><?php echo $setoran->tgl ?></td>
			<td><?php echo $setoran->sesi ?></td>
			<td><?php echo $setoran->jml_setoran ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('setoran/read/'.$setoran->id_setoran),'Read'); 
				echo ' | '; 
				echo anchor(site_url('setoran/update/'.$setoran->id_setoran),'Update'); 
				echo ' | '; 
				echo anchor(site_url('setoran/delete/'.$setoran->id_setoran),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('setoran/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>