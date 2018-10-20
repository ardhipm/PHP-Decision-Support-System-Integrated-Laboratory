<?php
include_once 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] :die ('ERROR: Tidak ada ID.');
include_once 'includes/alternatif.inc.php';
$alt = new Alternatif($db);
$alt->id = $id;
$alt->readOne();

if ($_POST){
	$alt->nm = $_POST['nm'];
	if($alt->update()){
		echo "<script>location.href='daftar_alternatif.php'</script>";
	}else{
		return false;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah ALternatif</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class = "col-md-4">
		<p style = "margin-top: 10px;">
			<strong style="font-size: 18pt;"><span class="fa fa-pencil"></span>Ubah Alternatif</strong>
		</p>
		<div class="panel panel-default">
			<div class="panel-body">
				<form method = "post">
					<div class = "form-group">
						<label for="alt"> Nama Alternatif </label>
						<input type="text" class="form-control" id="nm" name="nm" value="<?php echo $alt->nm; ?>" width="50%">
					</div>
					<button type= "submit" class="btn btn-default" style="background: #0c2e8a; color: white;"><span class="fa fa-edit"></span> Ubah</button>
					<button type="button" onclick="location.href='daftar_alternatif.php'" class="btn btn-default" style="background: #50d8af;"><span class="fa fa-history"></span> Kembali</button>
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