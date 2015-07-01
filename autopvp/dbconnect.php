<?php
	$db=mysqli_connect('localhost','admin','pwd','autopvp');
	if(mysqli_connect_errno()) echo "Failed to connect to MySQL: ".mysqli_connect_error();
	date_default_timezone_set('Europe/Rome');
?>
