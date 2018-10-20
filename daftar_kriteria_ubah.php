<?php
include_once 'header.php';
include_once 'includes/nilai.inc.php';

$id = isset($_GET['id']) ?  $_GET['id'] : die('ERROR: Tidak ada ID.');

include_once 'includes/kriteria.inc.php';
$eks = new Kriteria($db);

$eks->id = $id;

$eks->readOne();

if($_POST){

	$eks->nm = $_POST['nm'];
	
	if($eks->update()){
		echo "<script>location.href='daftar_kriteria.php'</script>";
	} else{
		return false;
	}
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Ubah Kriteria </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="col-md-4">
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Kriteria</strong>
		</p>
		<div class="panel panel-default" style="margin-top: 10px;">
			<div class="panel-body">

				<form method="post">
					<div class="form-group">
						<label for="kt">Nama Kriteria</label>
						<input type="text" class="form-control" id="nm" name="nm" value="<?php echo $eks->nm; ?>" width = "50%">
					</div>
					<button type="submit" class="btn btn-default" style="background: #0c2e8a; margin-right: 10px;color: white"><span class="fa fa-edit" style="color: white"></span> Ubah</button>
					<button type="button" onclick="location.href='daftar_kriteria.php'" class="btn btn-default" style="background: #50d8af;"><span class="fa fa-history"></span> Kembali</button>
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