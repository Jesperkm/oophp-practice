<?php 

class user {

	public $user;
	private $pass;

	private $db;
	private $stmt;


	public function __construct($username, $password) {
		$this->user = $username;
		$this->pass = $password;
		$pdo = new PDO("mysql:host=localhost;dbname=logmein;charset=utf8", "user", "password");
	}

	public function LogMeIn() {
		# Validate Email
		if (!filter_var($this->user, FILTER_VALIDATE_EMAIL)) {
			return false;
		}
			
	    # Check user "myuser" in database

	    # It's a good idea to specify what you want from the database instead of
	    # using *, which ends up being two queries. 1 to find what columns you want
	    # and another to get the data
		$query = "SELECT username, password FROM register WHERE username = :username";
		$this->stmt = $this->db->prepare($query);
		
		# Prepared statements your friend
		$this->stmt->bindParam(":username", $this->user, PDO::PARAM_STR);
		$this->stmt->execute();
		if($this->stmt->rowCount() == 1) {
			$data = $this->stmt->fetch(PDO::FETCH_ASSOC);
			if(password_verify($data["password"], $this->pass)) {
				return true;
			}
		}

	}


	public function register() {
		if($this->checkUserExists()) {
			return false; # User already exists
		}

		# User PHP's password hashing
		# https://php.net/manual/en/function.password-hash.php
		$pass = password_hash($this->pass, PASSWORD_DEFAULT);

		$query = "INSERT INTO register (username, password)
		VALUES (:username, :password)";
		$this->stmt = $this->db->prepare($query);
		$this->stmt->bindParam(":username", $this->user, PDO::PARAM_STR);
		$this->stmt->bindParam(":password", $pass, PDO::PARAM_STR);
		$this->stmt->execute();
		return true;
	}

	private function checkUserExists() {
		$query = "SELECT username FROM register WHERE username = :username";
		$this->stmt = $this->db->prepare($query);
		$this->stmt->bindParam(":username", $this->user, PDO::PARAM_STR);
		$this->stmt->execute();
		if($this->stmt->rowCount() > 0) {
			return true;
		}
	}

} //ends class user	
