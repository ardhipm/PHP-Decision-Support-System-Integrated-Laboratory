<?php
include_once "includes/koneksi.php";
$koneksi = new Koneksi();
$konek=$koneksi->getConnection();

$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: no ID');
include_once 'includes/nilai.inc.php';
$nil= new Nilai($konek);

$nil->id=$id;

if($nil->delete()){
	echo "<script>location.href='nilai.php'</script>";
}else{
?>
<script>alert('Data gagal dihapus')</script>
<?php
}
?>