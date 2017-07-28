<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

class DBController {							

	private $db;
	private $usersTable = "gmailUser";

	function __construct() {
		$servername = "localhost";
		$username = "gmailBasicLogin";
		$password = "gmailBasicLogin";
		$dbname = "basicGmailLogin";

		// Create connection
		$this->db = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$this->db) {
		    die("Connection failed: ".mysqli_connect_error());
		}
	}

	function __destruct() {
		$this->db->close();
   	}
	
	function isNewUser($userId) {
		$sql = "SELECT id FROM ".$this->usersTable." WHERE id = ".$userId; 
		$result = $this->db->query($sql);

		return ($result->num_rows == 0)?true:false;
	}

	function addUser($newUser){
		$sql = "INSERT INTO ".$this->usersTable.
				" VALUES (".$newUser->id.",'".$newUser->name."','".$newUser->link."','".$newUser->picture."','".$newUser->email."')";

		$this->db->query($sql);
	}

}

?>
