<div class="card-body">
	<div class="tab-content">
		<div class="tab-pane active " id="settings">
			<form action="<?php echo $action ?>" method="POST" class="col-md-8">
			
				<div class="form-group">
				<?php if (empty($anggota->id_anggota)) { ?>
					<label for="inputName" class="col-sm-4 control-label">ID ANGGOTA</label>
				<?php } ?>
				<div class="col-sm-10">
					<input type="<?php if (isset($anggota->id_anggota)) { echo "hidden";} ?>" name="id_anggota" value="<?php if (isset($anggota->id_anggota)) {
						echo $anggota->id_anggota;
					} ?>" class="form-control" required >
				</div>
				</div>

				<div class="form-group">
				<label for="inputName" class="col-sm-4 control-label">NAMA ANGGOTA</label>

				<div class="col-sm-10">
					<input type="text" name="nama" value="<?php if (isset($anggota->nama)) {
						echo $anggota->nama;
					} ?>" class="form-control" required >
				</div>
				</div>

				<div class="form-group">
				<label for="inputName" class="col-sm-4 control-label">JENIS ANGGOTA</label>

				<div class="col-sm-10">
					<input type="text" name="jns_anggota" value="<?php if (isset($anggota->jns_anggota)) {
						echo $anggota->jns_anggota;
					} ?>" class="form-control" required >
				</div>
				</div>
				
				<div class="form-group">
				<label for="inputName" class="col-sm-4 control-label">Pos</label>

				<div class="col-sm-10">
					<select name="id_pos" id="" class="form-control" required>
					<?php foreach ($pos as $pos) {?>
							<option value="<?php echo $pos->id_pos ?>" <?php if (isset($anggota->id_pos)) {
								echo "selected";
							}?>> <?php echo $pos->nm_pos?> </option>
						<?php } ?>
					</select>
				</div>
				</div>

				<div class="form-group">
				<label for="inputName2" class="col-sm-4 control-label">JUMLAH SAPI PERAH</label>

				<div class="col-sm-10">
					<input type="text" name="sapi_perah" value="<?php if (isset($anggota->sapi_perah)) {
						echo $anggota->sapi_perah;
					}?>" class="form-control" required id="inputName2" >
				</div>
				</div>
				<div class="form-group">
				<label for="inputExperience" class="col-sm-4 control-label">JUMLAH SAPI KERING</label>

				<div class="col-sm-10">
					<input type="text" name="sapi_kering" value="<?php if (isset($anggota->sapi_kering)) {
						echo $anggota->sapi_kering;
					}?>" class="form-control" required >
				</div>
				</div>

				<div class="form-group">
				<label for="inputSkills" class="col-sm-4 control-label">JUMLAH SAPI PEDET</label>

				<div class="col-sm-10">
					<input type="text" name="sapi_pedet" value="<?php if (isset($anggota->sapi_pedet)) {
						echo $anggota->sapi_pedet;
					}?>" class="form-control" required id="inputSkills" placeholder="Skills">
				</div>
				</div>
				
				<div class="card-footer col-md-8">
					<button type="submit" class="btn  btn-primary">Simpan</button>
					<a href="<?php echo site_url('anggota')?>" class="btn btn-secondary  float-right">Batal</a>
                </div>
					
		

			</form>
		</div>
		<!-- /.tab-pane -->
	</div>
	<!-- /.tab-content -->
</div>