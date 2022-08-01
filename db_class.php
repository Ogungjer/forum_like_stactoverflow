<?php
class DB{

	private $host = 'localhost';
	private $username = 'soloweb';
	private $passeword = 'Solomone100%';
	private $database = 'proje_lw';
	private $db;

	public function __construct($host = null, $username = null, $passeword = null, $database = null){

		if($host != null){
			$this->host = $host;
			$this->username = $username;
			$this->passeword = $passeword;
			$this->database = $database;
		}
		try{
		$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this
			->passeword, array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
			));
		}catch(PDOException $e){
			die('<h1>Impossible de se connecter à la base de donnee</h1>');
		}
	}
	public function query($sql, $data = array()){ 
    
		$req = $this->db->prepare($sql);
        $req->execute($data);
        
       return $req->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>
