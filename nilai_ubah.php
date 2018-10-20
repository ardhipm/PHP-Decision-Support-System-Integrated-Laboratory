<?php
include_once 'includes/koneksi.php';
$koneksi = new Koneksi();
$db = $koneksi->getConnection();
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR : no ID');
include_once 'includes/nilai.inc.php';
$nil= new Nilai($db);
$nil->id=$id;

$nil->readOne();

if($_POST){
	$nil->jm = $_POST['jm'];
	$nil->kt = $_POST['kt'];

	if($nil->update()){
		echo "<script>location.href='nilai.php'</script>";
	} else{
		?>
		<script>alert('Data gagal diubah')</script>
		<?php
	}
}
		?>


<!DOCTYPE html>
<html lang = "en">
<head>
	<title>Ubah Nilai Preferensi </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
	<div class="col-md-4">
		<p style="margin-bottom:10px;">
			<strong style="font-size:18pt;"><span class="fa fa-pencil"></span> Ubah Nilai Preferensi</strong>
		</p>
		<div class="panel panel-default" style="margin-top: 10px;">
			<div class="panel-body">

				<form method="post">
					<div class="form-group">
						<label for="kt">Jumlah Nilai</label>
						<input type="text" class="form-control" id="jm" name="jm" value="<?php echo $nil->jm; ?>" width = "50%">
					</div>

					<div class="form-group">
						<label for="kt">Keterangan Nilai</label>
						<input type="text" class="form-control" id="kt" name="kt" value="<?php echo $nil->kt; ?>" width = "50%">
					</div>
					<button type="submit" class="btn btn-default" style="background: #0c2e8a; margin-right: 10px;color: white""><span class="fa fa-edit"></span> Ubah</button>
					<button type="button" onclick="location.href='nilai.php'" class="btn btn-default" style="background: #50d8af;"><span class="fa fa-history"></span> Kembali</button>
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