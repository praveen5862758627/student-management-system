<?php 
  class Database {
    // DB Params
    private $host = 'mysql';
    private $db_name = 'sms';
    private $username = 'root';
    private $password = 'Devilbox138@';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
	
	public   function decrypt($sData){
$url_id=base64_decode($sData);

//$url_id=$sData;
$id=(double)$url_id/543544.456;
return $id;
}
  }
  
  

  