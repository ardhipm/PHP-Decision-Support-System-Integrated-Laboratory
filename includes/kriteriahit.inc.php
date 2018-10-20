<?php
class Krihit {

	private $conn;
	private $table_name ="ilab_hitung_kriteria";

	public $nak,$bb,$hak,$ra;

	public function __construct($db){
	$this->conn = $db;
}

function insert($a,$b,$c) {
	$query="insert into ".$this->table_name." values ('$a','$b','','$c','$_SESSION[id_pengguna]')";
	$stmt=$this->conn->prepare($query);

	if($stmt->execute()){
		return true;
	}else{
		return false;
	}
}



function update2($a,$b,$c){
	$query="update ".$this->table_name." set hasil_kriteria='$a' where kriteria_pertama='$b' and kriteria_kedua='$c' and id_pengguna='$_SESSION[id_pengguna]'" ;
	$stmt=$this->conn->prepare($query);

	if($stmt->execute()){
		return true;
	}else{
		return false;
	}
}

function update3($a,$b){
	$query = "update ilab_data_kriteria set jumlah_kriteria='$a' where id_kriteria='$b' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare($query);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}

function update4($a,$b){
		
		$query = "update ilab_data_kriteria set bobot_kriteria='$a' where id_kriteria='$b' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare($query);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}


function readAll(){
	$query="select * from ".$this->table_name." where id_pengguna='$_SESSION[id_pengguna]'";
	$stmt=$this->conn->prepare($query);
	$stmt->execute();

	return $stmt;
}

function readAll2(){
	$query="select * from ilab_data_kriteria where id_pengguna='$_SESSION[id_pengguna]'";
	$stmt=$this->conn->prepare($query);
	$stmt->execute();

	return $stmt;
}

	function readAll3($a, $b){

		$query = "SELECT * FROM ".$this->table_name." where kriteria_pertama = '$a' and kriteria_kedua = '$b' and id_pengguna='$_SESSION[id_pengguna]' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->ra = $row['nilai_kriteria'];
	}

function countAll(){
	$query="select * from ilab_data_kriteria where id_pengguna='$_SESSION[id_pengguna]'";
	$stmt=$this->conn->prepare($query);
	$stmt->execute();

	return $stmt->rowCount();
}

function sum1($a){

		$query = "SELECT sum(nilai_kriteria) as jumkr FROM ".$this->table_name." where kriteria_kedua = '$a' and id_pengguna = '$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->nak = $row['jumkr'];
	}

function sum2($a){

		$query = "SELECT sum(hasil_kriteria) as jumkr2 FROM ".$this->table_name." where kriteria_kedua = '$a' and id_pengguna = '$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->nak = $row['jumkr2'];
	}

function sum3(){
	$query="select sum(bobot_kriteria) as bobkri from ilab_data_kriteria where id_pengguna='$_SESSION[id_pengguna]'";
	$stmt=$this->conn->prepare($query);
	$stmt->execute();

	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	$this->bb=$row['bobkri'];
}

function avg($a){

		$query = "SELECT avg(hasil_kriteria) as avgkr FROM ".$this->table_name." where kriteria_pertama = '$a' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->hak = $row['avgkr'];
	}

function update($a,$b,$c){

		$query = "UPDATE  ".$this->table_name."  SET nilai_kriteria = '$b' WHERE kriteria_pertama = '$a' and kriteria_kedua = '$c' and id_pengguna='$_SESSION[id_pengguna]'";

		$stmt = $this->conn->prepare($query);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	

	function delete(){
	
		$query = "DELETE FROM " . $this->table_name;
		
		$stmt = $this->conn->prepare($query);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>


