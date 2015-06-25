<?php
	require_once './dbconnect.php';

	$username=$_GET['u'];
	$slot=$_GET['s'];

	$sql="SELECT inventory FROM inventories WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);

	$inv=json_decode($row['inventory'], true);

	if($inv[$slot][0]==-1){}
	else if($inv[$slot][0]==0){//cassa

	}else if($inv[$slot][0]==1){//pozione

	}else if($inv[$slot][0]==2){//gear

	}
?>
