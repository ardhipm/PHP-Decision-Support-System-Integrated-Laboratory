<?php
class Pengguna{
	
	private $conn;
	private $table_name = "ilab_pengguna";
	
	public $id;
	public $nl;
	public $un;
	public $pw;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	function insert(){
		
		$query = "insert into ".$this->table_name." values('',?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->nl);
		$stmt->bindParam(2, $this->un);
		$stmt->bindParam(3, $this->pw);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	
}
?>