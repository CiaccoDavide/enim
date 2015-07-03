<?php
	require_once './dbconnect.php';

	$username=$_GET['u'];
	$slot=$_GET['s'];
	$level=$_GET['l'];

	$sql="SELECT inventory FROM inventories WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);

	$inv=json_decode($row['inventory'], true);

	$tipo=$inv[$slot][1];//usato da pozioni e gear
	$rar=$inv[$slot][2];

	if($inv[$slot][0]==0){//cassa
		$inv[$slot][0]=-1;//free chest slot
		//drop 3 gears and potion
		$i=0;
		for($ng=0;$ng<3;$ng++){
		while($i<sizeof($inv)){
			if($inv[$i][0]==-1){
				$inv[$i][0]=2;//gear_code
				$inv[$i][1]=floor((rand(0,5)));//tipo di gear
				$inv[$i][2]=$rar;//rarità
				$inv[$i][3]=0;//enanchement
				$inv[$i][4]=abs(floor((rand($level-6,$level))));//lvl

				$inv[$i][5]=pDD(((((rand(0,15*$inv[$i][4]))+16+10*($inv[$i][4]-1))*pow(1.1,$inv[$i][4])/16)*(($rar+1)+$inv[$i][3])));//atk
				$inv[$i][6]=pDD(((((rand(0,15*$inv[$i][4]))+16+10*($inv[$i][4]-1))*pow(1.1,$inv[$i][4])/16)*(($rar+1)+$inv[$i][3])));//def

				$inv[$i][7]=pDD(0.5*((2/6)+abs((88/6)*(1-((11-$inv[$i][3])*(6-$inv[$i][2])*(101-abs(((rand($level-3,$level))))))/6666))));//crit max_eff=90% (max 10% per gear)
				if($inv[$i][7]>15/2) $inv[$i][7]=15/2;
				$inv[$i][8]=pDD(0.5*((5/6)+abs((55/6)*(1-((11-$inv[$i][3])*(6-$inv[$i][2])*(101-abs(((rand($level-3,$level))))))/6666))));//mf max_mf=60% (max 10% per gear)
				if($inv[$i][8]>10/2) $inv[$i][8]=10/2;
				$inv[$i][9]=pDD(0.5*(abs(floor((rand(($level+1)*4,($level+1)*8))))/6));//expps

				break;
			}$i++;
		}
		}
		// drop 1 potion
		$i=0;
		$rar=0;
		while($i<sizeof($inv)){
			if($inv[$i][0]==-1){
				$inv[$i][0]=1;//potion_code
				$inv[$i][1]=floor(rand(0,4));//tipo di pozione
				$rar=floor(rand(0,99));
				if($rar<10)        $inv[$i][2]=2;
				else if($rar<35)   $inv[$i][2]=1;
				else              $inv[$i][2]=0;
				break;
			}$i++;
		}
		//store back the $inv
		$invjson=json_encode($inv);
			$sql="UPDATE inventories SET inventory='$invjson' WHERE username='$username'";
			mysqli_query($db, $sql);
	}else if($inv[$slot][0]==1){//pozione

		$inv[$slot][0]=-1;//free used potion slot

		$sql2="SELECT gear FROM gears WHERE username='$username'";
		$result2=mysqli_query($db, $sql2);
		$row2=mysqli_fetch_array($result2);
		$gear=json_decode($row2['gear'], true);

		$gear[6][$tipo]+=($rar+1);

		$invjson=json_encode($inv);
			$sql="UPDATE inventories SET inventory='$invjson' WHERE username='$username'";
			mysqli_query($db, $sql);
		$gearjson=json_encode($gear);
			$sql="UPDATE gears SET gear='$gearjson' WHERE username='$username'";
			mysqli_query($db, $sql);



	}else if($inv[$slot][0]==2){//gear

		if($level<$inv[$slot][4])break;

		$sql2="SELECT gear FROM gears WHERE username='$username'";
		$result2=mysqli_query($db, $sql2);
		$row2=mysqli_fetch_array($result2);
		$gear=json_decode($row2['gear'], true);

		$tmp=0;
	    if($gear[$tipo][0]==-1)$inv[$slot][0]=-1;
	    $tmp=$gear[$tipo][0];
	    $gear[$tipo][0]=$inv[$slot][2];
	    $inv[$slot][2]=$tmp;
	    $tmp=$gear[$tipo][1];
	    $gear[$tipo][1]=$inv[$slot][3];
	    $inv[$slot][3]=$tmp;
	    $tmp=$gear[$tipo][2];
	    $gear[$tipo][2]=$inv[$slot][4];
	    $inv[$slot][4]=$tmp;
	    $tmp=$gear[$tipo][3];
	    $gear[$tipo][3]=$inv[$slot][5];
	    $inv[$slot][5]=$tmp;
	    $tmp=$gear[$tipo][4];
	    $gear[$tipo][4]=$inv[$slot][6];
	    $inv[$slot][6]=$tmp;
	    $tmp=$gear[$tipo][5];
	    $gear[$tipo][5]=$inv[$slot][7];
	    $inv[$slot][7]=$tmp;
	    $tmp=$gear[$tipo][6];
	    $gear[$tipo][6]=$inv[$slot][8];
	    $inv[$slot][8]=$tmp;
	    $tmp=$gear[$tipo][7];
	    $gear[$tipo][7]=$inv[$slot][9];
	    $inv[$slot][9]=$tmp;


		$invjson=json_encode($inv);
			$sql="UPDATE inventories SET inventory='$invjson' WHERE username='$username'";
			mysqli_query($db, $sql);
		$gearjson=json_encode($gear);
			$sql="UPDATE gears SET gear='$gearjson' WHERE username='$username'";
			mysqli_query($db, $sql);
	}



	function pDD($num){//tieni solo 2 cifre decimali - parsaDueDecimali
	  return floor(100*$num)/100;
	}


?>
