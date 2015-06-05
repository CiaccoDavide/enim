<?php
	require_once './dbconnect.php';

	$username=$_GET['username'];

	$sql="SELECT gear FROM gears WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);
	echo $row['gear'];

	header('Content-type: application/json');
?>