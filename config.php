<?php
	//$con=mysql_connect("localhost","root","") or die("Connection is not connect, please try aging");
	//$selectDb = mysql_select_db("bank") or die("Database is not select");
	@session_start();
	@session_start() or die();
	$con=mysqli_connect("localhost","root","","myquestions") or die("Connection is not connect, please try aging");

?>
