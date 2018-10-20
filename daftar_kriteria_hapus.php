<?php
include_once "includes/koneksi.php";
$koneksi = new Koneksi();
$konek = $koneksi->getConnection();
include_once "includes/kriteria.inc.php";
$kri = new Kriteria($konek);
$id = isset($_GET['id']) ? $_GET['id'] : die('ERRODR: Tidak ada ID.');
$kri->id=$id;
if($kri->delete()){
	echo "<script>location.href='daftar_kriteria.php';</script>";
} else{
	echo "<script>alert('Gagal Hapus Data');location.href='daftar_kriteria.php';</script>";
}
?>