<?php

	$firstname = $_POST["fname"];
	$lastname = $_POST["lname"];


?>
<!DOCTYPE html>
<html>
<head>
	<title>แสดงผล</title>
</head>
<body>
	<div align="center">
		<h1><?= $firstname." ".$lastname;?></h1>
	</div>
</body>
</html>