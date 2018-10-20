<?php
include_once "header.php";
if ($_POST){


	include_once "includes/alternatif.inc.php";
	$eks = new Alternatif($db);
	$eks->id = $_POST['id'];
	$eks->nm = $_POST['nm'];

		if($eks->insert()){
		echo "<script>location.href='daftar_alternatif.php'</script>";
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
	<title>Input Alternatif</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<p style="margin-bottom: 10px;">
			<strong style="font-size: 18pt;"><span class="fa fa-plus-square"></span> Tambah Alternatif</strong>
		</p>
		<div class = "panel panel-info">
			<div class = "panel body">

				<form method = "post">
					<div class = "form-group">
						<label>ID Alternatif</label>
						<select class="form-control" id="id" name="id" style="height: 35px;">
							<option>A1</option>
							<option>A2</option>
							<option>A3</option>	
							<option>A4</option>
							<option>A5</option>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Alternatif</label>
						<input type="text" class="form-control" id="nm" name="nm" required>
					</div>
					<button type="submit" class="btn btn-default" style="background: #0c2e8a; color: white;"><span class="fa fa-save"></span> Simpan</button>
					<button type="button" onclick="location.href='daftar_alternatif.php'" class="btn btn-default" style="background: #50d8af"><span class="fa fa-history"></span> Kembali</button>
				</form>

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

