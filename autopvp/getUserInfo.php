<?php
	require_once './dbconnect.php';

	$username=$_GET['username'];

	$sql="SELECT exp,expmax,lvl,rank,wins,losses,credits FROM users WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);
	echo '['.$row['exp'].','.$row['expmax'].','.$row['lvl'].','.$row['rank'].','.$row['wins'].','.$row['losses'].','.$row['credits'].']';

	header('Content-type: application/json');
?>
