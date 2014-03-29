<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Training Classes</title>
	<?php include "class_lib.php"; ?>
</head>
<body>

<?php

 $jesper = new person("Jesper Martinussen");
 $nanna = new person("Nanna Madsen");

 echo "hej mit navn er: " . $jesper->get_name() . "<br />";
 echo "hejhejhejhej! Jeg er: " . $nanna->get_name();

?>

	
</body>
</html>