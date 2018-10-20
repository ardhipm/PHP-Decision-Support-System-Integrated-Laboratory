<?php
include_once 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Penunjang Keputusan</title>
	<style type="text/css">
	.btn-kriteria, .btn-alternatif{
		font-family: "Raleway", sans-serif;
		font-size: 15px;
		font-weight: bold;
		letter-spacing: 1px;
		display: inline-block;
		padding: 10px 32px;
		border-radius: 2px;
		transition: 0.5s;
		margin: 10px;
		color: #fff;
		width: 200px;
		height: 200px;
		margin-top: 120px;

	}

	.btn-kriteria {
		background: #0c2e8a;
		border: 2px solid #0c2e8a;
		margin-left: 384px;
	}

	.btn-kriteria:hover {
		background: none;
		color: #0c2e8a;
	}

	.btn-alternatif {
		background: #50d8af;
		border: 2px solid #50d8af;
	}

	.btn-alternatif:hover {
		background: none;
		color: #50d8af;
	}

	
}
</style>
</head>
<body>
	<div class="col-md-8 text-right">
		<button class = "btn btn-lg btn-kriteria" onclick="location.href='daftar_kriteria.php'">Data Kriteria</button>
		<button class = "btn btn-lg btn-alternatif" onclick="location.href='daftar_alternatif.php'">Data Alternatif</button>
	</div>
	
	<div class="col-md-12">
		<?php
		include_once 'footer.php'
		?>
	</div>
</body>
</html>
