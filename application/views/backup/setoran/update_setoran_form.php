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
        <form action="<?php echo $action.'/'.$id_anggota ?>" method="post">
        <table class="table table-bordered table-striped" id="example4">
            <thead>
                <tr>
                    <th>Tgl</th>
                    <th style=" text-align:center;">Setoran Pagi</th>
                    <th style=" text-align:center;">Setoran Sore</th>
                    <th style=" text-align:center;">Edit</th>
                    <th>Tgl</th>
                    <th style=" text-align:center;">Setoran Pagi</th>
                    <th style=" text-align:center;">Setoran Sore</th>
                    <th style=" text-align:center;">Edit</th>
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
                    <th><?php echo $start++ ?></th>
                    <form action="<?php echo $action.'/'.$id_anggota ?>" method="post">
                    <td style=" text-align:center; ">
                    <?php 
                    if (empty($sesi1)) {
                        $hsl=0;
                    } else {
                        foreach ($sesi1 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $hsl= $key->jml_setoran;
                            break;
                            }else {
                             $hsl=0;   
                            }
                        }
                    }?> <input  type="number" value="<?php echo $hsl ?>" class="form-control" onkeypress="return handleEnter(this, event)"  id=<?php echo $i.'P' ?> name=<?php echo $i.'P' ?> > <?php
                    
                    ?><?php 
                    ?></td>
                    <td style=" text-align:center;">
                    <?php 
                    if (empty($sesi2)) {
                        $hsl=0;
                    } else {
                        foreach ($sesi2 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $hsl= $key->jml_setoran;
                            break;
                            }else {
                             $hsl=0;   
                            }
                        }
                    } echo $hsl;                                
                    ?>
                    </td>
                    <td style=" text-align:center;"><?php  
                    if (empty($sesi1)) {
                        $hsl1=0;
                    } else {
                        foreach ($sesi1 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $id1= $key->id_setoran;
                            break;
                            }else {
                               $id1=null; 
                            }
                        }
                    }                                          
                    if (empty($sesi2)) {
                        $hsl2=0;
                    } else {
                        foreach ($sesi2 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $id2= $key->id_setoran;
                            break;
                            }else {
                             $id2=null;
                            }
                        }
                    } 
                    if (empty($sesi1)) {
                        
                    }else{
                        if ($id1==!null or $id2==!null) { ?>
                            <td><button type="submit">simpan</button></td>
                        <?php }
                    }
                    ?> </form> <?php
                    $i++;
                    ?></td>

                    <!-- side 2 -->
                    <?php if ($i >= $hari) {
                        break;
                    } ?>
                    <th><?php echo $start++ ?></th>
                    <td style=" text-align:center; ">
                    <?php 
                    if (empty($sesi1)) {
                        $hsl=0;
                    } else {
                        foreach ($sesi1 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $hsl= $key->jml_setoran;
                            break;
                            }else {
                             $hsl=0;   
                            }
                        }
                    } echo $hsl;
                    
                    ?><?php 
                    ?></td>
                    <td style=" text-align:center;">
                    <?php 
                    if (empty($sesi2)) {
                        $hsl=0;
                    } else {
                        foreach ($sesi2 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $hsl= $key->jml_setoran;
                            break;
                            }else {
                             $hsl=0;   
                            }
                        }
                    } echo $hsl;                                
                    ?>
                    </td>
                    <td style=" text-align:center;"><?php  
                    if (empty($sesi1)) {
                        $hsl1=0;
                    } else {
                        foreach ($sesi1 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $id1= $key->id_setoran;
                            break;
                            }else {
                               $id1=null; 
                            }
                        }
                    }                                          
                    if (empty($sesi2)) {
                        $hsl2=0;
                    } else {
                        foreach ($sesi2 as $key) {
                            if (date('j',strtotime($key->tgl))==$i){
                                $id2= $key->id_setoran;
                            break;
                            }else {
                             $id2=null;
                            }
                        }
                    } 
                    if (empty($sesi1)) {
                        
                    }else{
                        if ($id1==!null or $id2==!null) { ?>
                            <a href="<?php echo site_url('setoran/edit/'.$id1.'/'.$id2) ?>" >Edit</a>
                        <?php }
                    }?>
                    </td>
                    
                </tr>
                
                
                <?php }
                ?> 
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