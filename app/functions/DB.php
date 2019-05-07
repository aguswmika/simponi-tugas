<?php 
class DB
{

	private $conn;

	static private $instance = NULL;

	function __construct($host, $user, $pass, $db)
	{
		try {
			$this->conn = new PDO('mysql:host='.$host.';dbname='.$db.';', $user, $pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			'Database Error! : '.$e->getMessage();
		}
	}

	static function getInstance($host, $user, $pass, $db){
		if(!isset(self::$instance)){
			self::$instance = new DB($host, $user, $pass, $db);
		}

		return self::$instance;
	}

	static function connection(){
		return self::$instance->conn;
	}
}