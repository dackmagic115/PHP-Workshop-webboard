<?php 
		$firstname = $_POST["fname"];
	$lastname = $_POST["lname"];

?>
<!DOCTYPE html>
<html>

<head>
    <title>PostForm</title>
</head>

<body>
	<div align="center">
	    <form action="/webboard/PostForm.php" method="POST">
	        First name:<br>
	        <input type="text" name="fname" >
	        <br>
	        Last name:<br>
	        <input type="text" name="lname" >
	        <br><br>
	        <input type="submit" value="Submit">
	    </form>
	</div>
	<div align="center">
		<h1><?= $firstname." ".$lastname;?></h1>
	</div>
</body>

</html>