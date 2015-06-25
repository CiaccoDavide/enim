<?php
	require_once './dbconnect.php';

	$username=$_GET['u'];
	$slot=$_GET['s'];

	$sql="SELECT inventory FROM inventories WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);

	$inv=json_decode($row['inventory'], true);

	if($inv[$slot][0]==0){//cassa
		$inv[$slot][0]=-1;
		//drop 3 gears and potion
		$invjson=json_encode($inv);
			$sql="UPDATE inventories SET inventory='$invjson' WHERE username='$username'";
			$result=mysqli_query($db, $sql);
	}else if($inv[$slot][0]==1){//pozione

	}else if($inv[$slot][0]==2){//gear

	}
?>
