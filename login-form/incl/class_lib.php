<?php 

	class user {

		public $user;
		public $pass; 


		public function __construct($username, $password) {
			$this->user = $username;
			$this->pass = $password;
		} //ends construct


		public function LogMeIn() {
			//Validate Email
			if (!filter_var($this->user, FILTER_VALIDATE_EMAIL)) {
				echo "invalid email!";
			} 

			else {
				//connect to DB
			    $connect = mysqli_connect("localhost","user","","logmein");

			    //Avoid SQL injection and store the user in myuser
			    $myuser = mysqli_real_escape_string($connect, $this->user);

			    //Check user "myuser" in database
				$user = mysqli_query($connect, "SELECT * FROM register WHERE username = '" .$myuser. "' ");

				//Output from database to variable "row"
			    $row = mysqli_fetch_array($user, MYSQLI_ASSOC);

			    //Check connection
			    if (mysqli_connect_errno()) {
			          echo "Failed to connect to MySQL: " . mysqli_connect_error();
			    }
			    //Validate if the input is equal to the database
			    elseif ($this->user == $row["Username"] && $this->pass == $row["Password"]) {
			        echo "Login succeded!";
			    }
			    //If validation fails, give user error message 
			    else {
			        echo "Incorrect username or password!";
		    	}

			} //ends else statement

		} //ends method LogMeIn


		public function register() {
			//connect to DB
			$connect = mysqli_connect("localhost","user","","logmein");

			//set var data for later validation
			$check = "SELECT * FROM register WHERE Username = '$this->user'";
			$rs = mysqli_query($connect,$check);
			$data = mysqli_fetch_array($rs, MYSQLI_NUM);
				
			//Validate Email
			if (!filter_var($this->user, FILTER_VALIDATE_EMAIL)) {
					echo "invalid email!";
			}

			//Check if user exist
			elseif ($data[0] > 1) {
				exit("User already exists");
			}

			//Insert into Database
			else {
				$sqlinsert = mysqli_query($connect, "INSERT INTO register (Username, Password) VALUES ('".$this->user."', '".$this->pass."')");

				//Message if succeded
				if ($sqlinsert == true) {
					echo "You have been registered succesfully!";
				}

			} //ends else statement

		} //ends method register

	} //ends class user	

 ?>