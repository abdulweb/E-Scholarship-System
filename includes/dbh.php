<?php
/**
* 
*/
class dbh
{
	private $servername;
	private $username;
	private $password;
	private $dbname;
	public function connect(){
		$this->servername ='localhost';
		$this->username ='abdulweb';
		$this->password ='rosot';
		$this->dbname ='zamScholarship';

		$conn = new mysqli($this->servername,$this->username, $this->password,$this->dbname );

		return $conn;
	}

	// function __construct(argument)
	// {
	// 	# code...
	// }

}
$object = new dbh();
