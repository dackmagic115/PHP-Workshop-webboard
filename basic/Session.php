<?php
	session_start();

	$username = $_POST['uname'];

	$_SESSION['uname'] = $username;
?>
<!DOCTYPE html>
<html>

<head>
    <title>PostForm</title>
</head>

<body>
	<div align="center">
	    <form action="/webboard/Session.php" method="POST">
	        Username:<br>
	        <input type="text" name="uname" >
	        <br><br>
	        <input type="submit" value="Submit">
	    </form>
	</div>
	
</body>

</html>