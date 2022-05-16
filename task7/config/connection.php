<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json;charset=UTF-8");
header("Access-Control-Allow-Method:POST");
header("Access-Control-Allow-Headers:Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
session_start();

class dbConnection {

	private $dbhost = "localhost";
	private $dbname = "neotech_db";
	private $dbuser = "root";
	private $dbpassword = "";
	private $connection;

	/*Start: Database connection*/
	public function getConnection() {
		$this->connection = null;

		try {
			$this->connection = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname, $this->dbuser, $this->dbpassword);
		} catch (PDOException $e) {
			echo "Database connection fail " . $e->getMessage();
		}
		return $this->connection;
	}
}
?>