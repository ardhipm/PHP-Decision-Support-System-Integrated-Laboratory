<?php
include_once "includes/koneksi.php";
$koneksi = new Koneksi();
$konek=$koneksi->getConnection();

include_once "includes/alternatif.inc.php";
$alt = new Alternatif($konek);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR : Tidak ada ID.');
$alt->id = $id;

if($alt->delete()){
	echo "<script>location.href='daftar_alternatif.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='daftar_alternatif.php';</script>";
}
?>