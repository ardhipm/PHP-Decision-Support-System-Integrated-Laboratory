<?php
include_once 'header.php';
include_once 'includes/alternatif.inc.php';
$pro = new Alternatif($db);
$stmt = $pro->readAll();
$count = $pro->countAll();
?>

<html>
<head>
    <title>Daftar Alternatif</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</style>
</head>
    <style type="text/css">
    .btn-tambah{
        font-family: "Raleway", sans-serif;
        font-size: 15px;
        font-weight: bold;
        letter-spacing: 1px;
        display: inline-block;
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
			<strong style="font-size:18pt;"><span class="fa fa-bank"></span> Data Alternatif</strong>
		</div>
		<div class="col-md-6 text-right" style="margin-top: 20px;">
			<button type="button" onclick="location.href='input_alternatif.php'" class="btn-tambah"><span class="fa fa-clone"></span> Tambah Data</button>
		</div>
	</div>
	<br/>

	<table class="table table-striped table-bordered" id="tabeldata">
        <thead>
            <tr>

                <th>ID Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Hasil Akhir</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>

                <th>Id Alternatif</th>
                <th>Nama Alternatif</th>
                <th>Hasil Akhir</th>
                <th>Aksi</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            $no=1;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td style="vertical-align:middle;"><?php echo $row['id_alternatif'] ?></td>
                    <td style="vertical-align:middle;"><?php echo $row['nama_alternatif'] ?></td>
                    <td style="vertical-align:middle;"><?php echo number_format($row['hasil_akhir'],3,'.',',') ?></td>
                    <td style="text-align:center;vertical-align:middle;">
                       <a href="daftar_alternatif_ubah.php?id=<?php echo $row['id_alternatif'] ?>" class="btn btn-default" style="background: #0c2e8a; color: white; "><span class="glyphicon glyphicon-pencil"></span></a>
                       <a href="daftar_alternatif_hapus.php?id=<?php echo $row['id_alternatif'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-default" style="background: #50d8af;"><span class="glyphicon glyphicon-trash" ></span></a>
                   </td>
               </tr>
               <?php
           }
           ?>
       </tbody>

   </table>
</form>
</div>
<?php
include_once 'footer.php'
?>
</body>
</html>