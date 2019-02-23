<?php 
	session_start();

	session_destroy();

	header("location:/webboard/login.php");
	exit();
?>