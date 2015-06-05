<?php
	require_once './dbconnect.php';

	$username=$_GET['username'];

	$sql="SELECT inventory FROM inventories WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);
	echo $row['inventory'];

	header('Content-type: application/json');
?>