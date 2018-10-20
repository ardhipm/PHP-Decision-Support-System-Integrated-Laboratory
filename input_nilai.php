<?php
if($_POST){
	
	include_once 'includes/nilai.inc.php';
	$eks = new Nilai($db);

	$eks->jm = $_POST['jm'];
	$eks->kt = $_POST['kt'];
	
	if($eks->insert()){
		echo "<script>location.href='nilai.php'</script>";
	} else{
		?>
		<script>alert('Data gagal ditambahkan')</script>
		<?php
	}
}
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Nilai Preferensi</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class = "col-md-4">
		<p style = "margin-top: 10px;">
			<strong style="font-size: 18pt;"><span class="fa fa-pencil"></span>Tambah Nilai Preferensi</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method = "post">
					<div class = "form-group">
						<label for="eks"> Jumlah Nilai </label>
						<input type="text" class="form-control" id="jm" name="jm" required>
					</div>
					<div class = "form-group">
						<label for="eks"> Keterangan Nilai </label>
						<input type="text" class="form-control" id="kt" name="kt" required>
					</div>
					<button type= "submit" class="btn btn-default" style="background: #0c2e8a;color: white;"><span class="fa fa-edit"></span> Simpan</button>
					<button type="button" onclick="location.href='nilai.php'" class="btn btn-default" style="background: #50d8af"><span class="fa fa-history"></span> Kembali</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<?php
	include_once 'footer.php';
	?>
</div>
</body>
</html>                            