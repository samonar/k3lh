<!doctype html>
<html>
    <div class="card-body">
        <div class="tab-pane">
            <div class="post clearfix">
                <div class="user-block">
                <span class="username">
                    <h5>Nama Anggota : <?php echo $identitas->nama ?></h5>
                    <h6>No Anggota &nbsp  : <?php echo $identitas->id_anggota?></h6>
                    <h6>Pos   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp       : <?php echo $identitas->nm_pos ?></h6>
                    <h6>Setoran Bulan : <?php echo date('M')?></h6>
                </span>
                
                </div>
            </div>
        </div>
    </div>
    <body>
        <table class="table table-bordered table-striped" id="example4">
            <thead>
                <tr>
                    <th>Tgl</th>
                    <th style=" text-align:center;">Setoran Pagi</th>
                    <th style=" text-align:center;">Setoran Sore</th>
                    <th>aksi</th>
                    <th>Tgl</th>
                    <th style=" text-align:center;">Setoran Pagi</th>
                    <th style=" text-align:center;">Setoran Sore</th>
                    <th>aksi</th>
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
                <form action="<?php echo $action.'/'.$id_anggota ?>" method="post">
                    <th> <?php echo $start++ ?></th>
                    <?php 
                    if (empty($sesi1)) {
                        $hsl=null;
                    } else {
                        foreach ($sesi1 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $hsl= $key->jml_setoran;
                            break;
                            }else {
                             $hsl=null;   
                            }
                        }
                    }?>
                    <td><input value="<?php echo $hsl ?>"  type="number" step="0.1" min="0" class="form-control" onkeypress="return handleEnter(this, event)"  id=<?php echo $i.'P' ?> name=<?php echo $i.'P' ?> ></td>
                    <?php 
                    if (empty($sesi2)) {
                        $hsl2=null;
                    } else {
                        foreach ($sesi2 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $hsl2= $key->jml_setoran;
                            break;
                            }else {
                             $hsl2=null;   
                            }
                        }
                    }                                
                    ?>
                    <td><input value="<?php echo $hsl2 ?>"  type="number" step="0.1" min="0"  class="form-control" onkeypress="return handleEnter(this, event)" id=<?php echo $i.'S' ?> name=<?php echo $i++.'S' ?> ></td>
                    <td><button class="btn btn-success" type="submit">simpan</button></td>
                </form>
                    <?php if ($i > $hari) {
                        break;
                     }?>
                     <form action="<?php echo $action.'/'.$id_anggota ?>" method="post">
                    <th> <?php echo $start++ ?></th>
                    <?php 
                    if (empty($sesi1)) {
                        $hsl=null;
                    } else {
                        foreach ($sesi1 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $hsl= $key->jml_setoran;
                            break;
                            }else {
                             $hsl=null;   
                            }
                        }
                    }?>
                    <td><input value="<?php echo $hsl ?>" type="number" step="0.1" min="0" class="form-control" onkeypress="return handleEnter(this, event)" id=<?php echo $i.'P' ?> name=<?php echo $i.'P' ?> ></td>
                    <?php 
                    if (empty($sesi2)) {
                        $hsl2=null;
                    } else {
                        foreach ($sesi2 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $hsl2= $key->jml_setoran;
                            break;
                            }else {
                             $hsl2=null;   
                            }
                        }
                    }                                
                    ?>
                    <td><input value="<?php echo $hsl2 ?>" type="number" step="0.1" min="0" class="form-control" onkeypress="return handleEnter(this, event)" id=<?php echo $i.'S' ?> name=<?php echo $i.'S' ?> ></td>
                    <td><button class="btn btn-success" type="submit">simpan</button></td>
                    </form>
                </tr>
            <?php } ?>
                
            </tbody>
            
        </table>
        
        
	
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