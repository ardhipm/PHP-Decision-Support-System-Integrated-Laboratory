<?php
class Kriteria {

	private $conn;
	private $table_name = "ilab_data_kriteria";

	public $id, $nm, $bb, $hjb, $count;

	public function __construct($db){
		$this->conn = $db;

	}

	function insert(){
		$query = "insert into ".$this->table_name." values(?,?,'','','','$_SESSION[id_pengguna]','')";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->bindParam(2, $this->nm);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function insert2($a,$b){
		$query = "UPDATE ".$this->table_name." set hasil_jumlah_bobot='$a' where id_kriteria='$b' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function readAll(){
		$query = "select * from ".$this->table_name." where id_pengguna='$_SESSION[id_pengguna]' order by id_kriteria ASC";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function readKonsisten(){
		$query = "select * from ".$this->table_name." where keterangan = 'tidak konsisten' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function countKonsisten(){
		$query = "select * from ".$this->table_name." where keterangan = 'tidak konsisten' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		$this->count = $stmt->rowCount();
	}

	function  countAll(){
		$query = "select * from ".$this->table_name." where id_pengguna='$_SESSION[id_pengguna]' order by id_kriteria ASC";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt->rowCount();
	}

	function readOne(){
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_kriteria=? and id_pengguna = '$_SESSION[id_pengguna]' LIMIT 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->id = $row['id_kriteria'];
		$this->nm = $row['nama_kriteria'];
		$this->bb = $row['bobot_kriteria'];
	}

	function readSatu($a){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_kriteria='$a' and id_pengguna = '$_SESSION[id_pengguna]' LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nama_kriteria = :nm
				WHERE
					id_kriteria = :id
				and
					id_pengguna = '$_SESSION[id_pengguna]'";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':nm', $this->nm);
		$stmt->bindParam(':id', $this->id);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function sum(){
		$query = "SELECT sum(hasil_jumlah_bobot) as hasjubot from ".$this->table_name." where id_pengguna = '$_SESSION[id_pengguna]'";
		$stmt=$this->conn->prepare($query);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->hjb = $row['hasjubot'];
	}

	function delete(){
	session_start();
		$query = "DELETE FROM " . $this->table_name . " WHERE id_kriteria = ? and id_pengguna='$_SESSION[id_pengguna]'";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	function hapusell($ax){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_kriteria in $ax and id_pengguna = '$_SESSION[id_pengguna]'";
		
		$stmt = $this->conn->prepare($query);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>