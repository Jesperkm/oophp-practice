<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
<title>Jesper Login Form</title>
<?php include "incl/class_lib.php"; ?>
</head>

<body>
<div id="wrapper">


<section class="loginclass">
		<div class="form-wrap">
			<h1>Login Form PHP</h1>
			<form action="index.php" method="post" autocomplete="off">
				<input type="hidden" name="submitted" value="true" />	
				<h2>Login</h2>
				<p><input type="text" placeholder="Username" name="user" size="30"></p>
				<p><input type="password" placeholder="Password" name="pass" size="30"></p>
				<input type="submit" name="submit" value="Login" id="submit" />
			<form>
				<div id="register"><a href="register.php">Register</a></div>
				<div id="answer">
					<?php 
					if (isset($_POST["submitted"])) {
						$user = new user($_POST["user"], $_POST["pass"]);
						$user->LogMeIn();
					}
					?>
				</div>
		</div>
</section>



</div>
</body>

</html>