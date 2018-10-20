 <?php
 include_once 'includes/nilai.inc.php';
 include "includes/koneksi.php";
 $koneksi = new Koneksi();
 $db = $koneksi->getConnection();
 $nil = new Nilai($db);
 $read = $nil->readAll();
 $count = $nil->countAll();
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Nilai Prefensi</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    <form method="post">
       <div class="row">
          <div class="col-md-6 text-left" style="margin-top: 20px;">
             <strong style="font-size:18pt;, margin-left: 10px;"><span class="fa fa-trophy"></span> Data Nilai Preferensi</strong>
         </div>
         <div class="col-md-6 text-right" style="margin-top: 20px;">
             <button type="button" onclick="location.href='input_nilai.php'" class="btn-tambah"><span class="fa fa-clone"></span> Tambah Data</button>
         </div>
     </div>
     <br/>

     <table width="100%" border = "1" class="table table-bordered table-striped" id="tabeldata">
        <thead>
            <tr>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th>Nilai</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </tfoot>

        <tbody>
            <?php
            while ($row = $read->fetch(PDO::FETCH_ASSOC)){
                ?>
                <tr>
                    <td style="vertical-align:middle;"><?php echo $row['jum_nilai'] ?></td>
                    <td style="vertical-align:middle;"><?php echo $row['ket_nilai'] ?></td>
                    <td class="text-center" style="vertical-align:middle;">
                        <a href="nilai_ubah.php?id=<?php echo $row['id_nilai'] ?>" class="btn btn-default" style="background: #0c2e8a;color: white;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a href="nilai_hapus.php?id=<?php echo $row['id_nilai'] ?>" onclick="return confirm('Yakin ingin menghapus data')" class="btn btn-default" style="background: #50d8af"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>

    </table>
</form>	
<div>
    <a href = "logout.php" class ="btn btn-default" style="background: #0c2e8a; color: white;">Logout</a>
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