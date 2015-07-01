<?php
/*RIGHT CLICK only REFINE*/
	require_once './dbconnect.php';

	$username=$_GET['u'];
	$slot=$_GET['s'];

	$sql="SELECT inventory FROM inventories WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);

	$inv=json_decode($row['inventory'], true);
	$tipo=$inv[$slot][1];//usato da pozioni e gear
	$rar=$inv[$slot][2];

	if($inv[$slot][0]==2){//gear
		$inv[$slot][0]=-1;
		$invjson=json_encode($inv);
			$sql="UPDATE inventories SET inventory='$invjson' WHERE username='$username'";
			mysqli_query($db, $sql);

		$lvl=$inv[$slot][4];
		$enanchement=$inv[$slot][3];
		$creditbonus=100*($rar+1)*(2*$lvl+1)*($enanchement+1);
			$sql="UPDATE users SET credits=credits+$creditbonus WHERE username='$username'";
			mysqli_query($db, $sql);
	}
?>
