<!-- <!DOCTYPE html>
<html>
<head>
	<title>Cari Stok Pakan</title>
</head>
<body>
<form action="<?= base_url('StokPakan/cari') ?>" method="post">
	<label>Input Bulan</label><br>
	<input type="month" name="tgl"><br>
	<input type="submit" value="Cari">
</form>
</body>
</html> -->


<script async src="//jsfiddle.net/Kz2sW/1/embed/"></script>

<div class="input-append date" id="datepicker" data-date="02-2012" 
         data-date-format="mm-yyyy">

	 <input  type="text" readonly="readonly" name="date" >	  
	 <span class="add-on"><i class="icon-th"></i></span>	  
    </div>	

<script type="text/javascript">
	$(function(){
		$("#datepicker").datepicker({
  format: "mm-yyyy",
  viewMode: "months",
  minViewMode: "months"
});

	});
</script>
