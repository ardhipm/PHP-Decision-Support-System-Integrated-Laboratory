<?php
include_once 'header.php';
include_once 'includes/kriteria.inc.php';
$pro = new Kriteria($db);
$stmt = $pro->readAll();
$count = $pro->countAll();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Daftar Kriteria</title>
</head>
<style type="text/css">
	.btn-tambah{
		font-family: "Raleway", sans-serif;
		font-size: 15px;
		font-weight: bold;
		letter-spacing: 1px;
		border-radius: 2px;
		padding: 5px;
		transition: 0.5s;
		margin: 10px;
		text-align: center;
		color: #000;

	}

	.btn-tambah {
		background: #50d8af;
		border: 2px solid #50d8af;
	}

	.btn-tambah:hover {
		background: none;
		color: #50d8af;
	}
	margin: 20px;

	
}
</style>
<body>
		<div class="col-md-12">
<form method="post">
	<div class="row" style="margin-left: 10px;">
		<div class="col-md-6 text-left" style="margin-top: 20px;">
			<strong style="font-size:18pt;"><span class="fa fa-bank"></span> Data Kriteria</strong>
		</div>
		<div class="col-md-6 text-right" style="margin-top: 20px;">
			<button type="button"  onclick="location.href='input_kriteria.php'" class="btn-tambah"><span class="fa fa-plus-circle"></span> Tambah Data</button>
		</div>
	</div>
	<br/>


		<table class="table table-striped table-bordered" id="tabeldata">
			<thead>
				<tr>

					<th>ID Kriteria</th>
					<th>Nama Kriteria</th>
					<th>Bobot Kriteria</th>
					<th width="150px">Aksi</th>
				</tr>
			</thead>

			<tfoot>
				<tr>

					<th>ID Kriteria</th>
					<th>Nama Kriteria</th>
					<th>Bobot Kriteria</th>
					<th>Aksi</th>
				</tr>
			</tfoot>

			<tbody>
				<?php
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>

						<td style="vertical-align:middle;"><?php echo $row['id_kriteria'] ?></td>
						<td style="vertical-align:middle;"><?php echo $row['nama_kriteria'] ?></td>
						<td style="vertical-align:middle;"><?php echo number_format ($row['bobot_kriteria'], 3,'.',',') ?></td>
						<td style="text-align:center;vertical-align:middle;">
							<a href="daftar_kriteria_ubah.php?id=<?php echo $row['id_kriteria'] ?>" class="btn btn-default btn-a" style="background: #0c2e8a; "><span class="glyphicon glyphicon-pencil" style="color: white;" aria-hidden="true"></span></a>
							<a href="daftar_kriteria_hapus.php?id=<?php echo $row['id_kriteria'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-default" style="background: #50d8af; "><span class="glyphicon glyphicon-trash"aria-hidden="true"></span></a>
						</td>
					</tr>
					<?php
				}
				?>
			</tbody>

		</table>
	</div>
</form>
</div>
<?php
include_once 'footer.php'
?>
</body>
</html>
