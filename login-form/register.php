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
			<h1>Register</h1>
			<form action="register.php" method="post" autocomplete="off">
				<input type="hidden" name="submitted" value="true" />
				<h2>Register now!</h2>
				<p><input type="text" placeholder="Username" name="user" size="30"></p>
				<p><input type="password" placeholder="Password" name="pass" size="30"></p>
				<input type="submit" name="submit" value="Submit" id="submit" />
			<form>
				<div id="register"><a href="index.php">Back</a></div>
				<div id="answer">
					<?php 
					if (isset($_POST["submitted"])) {
						$newuser = new user($_POST["user"], $_POST["pass"]);
						$newuser->register();
					}
					?>
				</div>
		</div>
</section>

</div>
</body>

</html>