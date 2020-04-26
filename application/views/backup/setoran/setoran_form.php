<!doctype html>
<html>
    <body>
       
        <form action="<?php echo $action.'/'.$id_anggota ?>" method="post">
        <table class="table table-bordered table-striped" id="example4">
            <thead>
                <tr>
                    <th>Tgl</th>
                    <th style=" text-align:center;">Setoran Pagi</th>
                    <th style=" text-align:center;">Setoran Sore</th>
                    <th>Tgl</th>
                    <th style=" text-align:center;">Setoran Pagi</th>
                    <th style=" text-align:center;">Setoran Sore</th>
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
                    <th> <?php echo $start++ ?></th>
                    <td><input  type="number" placeholder="0" class="form-control" onkeypress="return handleEnter(this, event)"  id=<?php echo $i.'P' ?> name=<?php echo $i.'P' ?> ></td>
                    <td><input type="number" placeholder="0" class="form-control" onkeypress="return handleEnter(this, event)" id=<?php echo $i.'S' ?> name=<?php echo $i++.'S' ?> ></td>
                    <?php if ($i >= $hari) {
                        break;
                     }?>
                    <th> <?php echo $start++ ?></th>
                    <td><input type="number" placeholder="0" class="form-control" onkeypress="return handleEnter(this, event)" id=<?php echo $i.'P' ?> name=<?php echo $i.'P' ?> ></td>
                    <td><input type="number" placeholder="0" class="form-control" onkeypress="return handleEnter(this, event)" id=<?php echo $i.'S' ?> name=<?php echo $i.'S' ?> ></td>
                </tr>
            <?php } ?>
                <div class="col-md-3">
                <button type="submit" class="btn btn-primary btn-block"> simpan </button>
                </div>
            </tbody>
            
        </table>
        
        
	</form>
    </body>
</html>

<script>
function nextField(event){
    if(event.keyCode == 13  || event.which == 13){
  document.getElementById('Jumlah').focus();
    } 
}
</script>
<script type="text/javascript">           
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