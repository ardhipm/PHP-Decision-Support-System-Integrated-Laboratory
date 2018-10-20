<?php
class Althit{
	
	private $conn;
	private $table_name = "ilab_hitung_alternatif";
	
	public $kp;
	public $nak;
	public $hak;
	public $kk;
	public $bb;
	public $kri;
	public $jak;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert($a,$b,$c,$d){
		
		$query = "insert into ".$this->table_name." values('$a','$b','','$c','$d','$_SESSION[id_pengguna]')";
		$stmt = $this->conn->prepare($query);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}

	function insert2($a,$b,$c,$d,$e){
		
		$query = "update ".$this->table_name." set hasil_alternatif = '$a' where alternatif_pertama = '$b' and alternatif_kedua = '$c' and id_kriteria='$d' and id_pengguna='$e'";
		$stmt = $this->conn->prepare($query);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}



	function insert3($a, $b, $c,$d){

		$query = "insert into ilab_perhitungan_alternatif values('$a','$b','$c','','','','$d')";
		$stmt = $this->conn->prepare($query);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	function insert4($a, $b, $c){
		
		$query = "update ilab_perhitungan_alternatif set skor_alterntif='$a' where id_alternatif='$b' and id_kriteria='$c' and id_pengguna = '$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare($query);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}

	function insert5($a, $b, $c){
		
		$query = "update ilab_perhitungan_alternatif set jumlah_alternatif='$a' where id_alternatif='$b' and id_kriteria='$c' and id_pengguna = '$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare($query);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}

	

	function insert6($a,$b,$c){
		$query = "UPDATE ilab_perhitungan_alternatif set hasil_jumlah_skor='$a' where id_alternatif='$b' and id_kriteria='$c' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function insert7(){

		$query = "UPDATE ilab_perhitungan_alternatif
				SET 
					hasil_alternatif = :ha
				WHERE
					id_alternatif = :ia 
				AND
					id_kriteria = :ik
				AND
				id_pengguna='$_SESSION[id_pengguna]'";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':ha', $this->ha);
		$stmt->bindParam(':ia', $this->ia);
		$stmt->bindParam(':ik', $this->ik);
		

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function insert8(){

		$query = "UPDATE 
					ilab_data_alternatif
				SET 
					hasil_akhir = :has1
				WHERE
					id_alternatif = :ia
				AND
				id_pengguna='$_SESSION[id_pengguna]'";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(':has1', $this->has1);
		$stmt->bindParam(':ia', $this->ia);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function insert9($a,$b){
		$query="UPDATE ilab_data_alternatif
		SET hasil_akhir='$a' where WHERE
					id_alternatif = '$b'
				AND
				id_pengguna='$_SESSION[id_pengguna]'";

		$stmt = $this->conn->prepare($query);

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}


	function insert10($a,$b){
		$query = "UPDATE ilab_data_kriteria set keterangan='$a' where id_kriteria='$b' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function readAll(){

		$query = "SELECT * FROM ilab_data_alternatif where id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	function readAlternatif($a){

		$query = "SELECT * FROM ilab_data_alternatif where id_alternatif='$a' and id_pengguna = '$_SESSION[id_pengguna]' ";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}

	function readAll1($a, $b, $c){

		$query = "SELECT * FROM ".$this->table_name." where alternatif_pertama = '$a' and alternatif_kedua = '$b' and id_kriteria='$c' and id_pengguna='$_SESSION[id_pengguna]' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->kp = $row['nilai_alternatif'];
	}

	function readAll2(){

		$query = "SELECT * FROM ilab_data_alternatif where id_pengguna = '$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}

	function readAll3($a, $b){

		$query = "SELECT * FROM ilab_perhitungan_alternatif where id_alternatif='$a' and id_kriteria='$b' and id_pengguna = '$_SESSION[id_pengguna]' LIMIT 0,1";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->jak = $row['jumlah_alternatif'];
	}

		function readAll4($a){
		$query = "select * from ilab_perhitungan_alternatif where id_kriteria='$a' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function readAll5($a,$b){
		$query= "select * from ilab_perhitungan_alternatif where id_alternatif='$a' and id_kriteria='$b' and id_pengguna='$_SESSION[id_pengguna]' ";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function readAll6(){
		$query="select nama_alternatif,hasil_akhir from ilab_data_alternatif where id_pengguna='$_SESSION[id_pengguna]' order by hasil_akhir desc";
		$stmt=$this->conn->prepare($query);
		$stmt->execute();

		return $stmt;
	}

	function countAll(){

		$query = "SELECT * FROM ilab_data_alternatif where id_pengguna = '$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt->rowCount();
	}

	function sum1($a,$b){

		$query = "SELECT sum(nilai_alternatif) as jumkr FROM ".$this->table_name." where alternatif_kedua = '$a' and id_kriteria='$b' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->nak = $row['jumkr'];
	}
	
	function sum2($a,$b){

		$query = "SELECT sum(hasil_alternatif) as jumkr2 FROM ".$this->table_name." where alternatif_kedua = '$a' and id_kriteria = '$b' and id_pengguna='$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->nak = $row['jumkr2'];
	}
	
	function sum3($a){

		$query = "SELECT sum(skor_alterntif) as bbkr FROM ilab_perhitungan_alternatif where id_kriteria='$a' and id_pengguna = '$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->bb = $row['bbkr'];
	}

		function sum4($a){
		$query = "SELECT sum(hasil_jumlah_skor) as hasjukor from ilab_perhitungan_alternatif where id_kriteria='$a' and id_pengguna = '$_SESSION[id_pengguna]'";
		$stmt=$this->conn->prepare($query);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->hjk = $row['hasjukor'];
	}

	function sum5($a){
		
		$query = "SELECT sum(hasil_alternatif) as hsl FROM ilab_perhitungan_alternatif WHERE id_alternatif='$a' and id_pengguna='$_SESSION[id_pengguna]' LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->execute();

		return $stmt;
	}

	function readAvg($a,$b){

		$query = "SELECT avg(hasil_alternatif) as avgkr FROM ".$this->table_name." where alternatif_pertama = '$a' and id_kriteria='$b' and id_pengguna = '$_SESSION[id_pengguna]'";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->hak = $row['avgkr'];
	}

	function readKri($a){

		$query = "SELECT * FROM ilab_data_kriteria where id_kriteria='$a' and id_pengguna='$_SESSION[id_pengguna]' ";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->kri = $row['nama_kriteria'];
	}
	
	// update the product
	function update($a,$b,$c,$d){

		$query = "UPDATE  ".$this->table_name."  SET nilai_alternatif = '$b' WHERE alternatif_pertama = '$a' and alternatif_kedua = '$c' and id_kriteria = '$d' and id_pengguna = '$_SESSION[id_pengguna]'";

		$stmt = $this->conn->prepare($query);
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete the product
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