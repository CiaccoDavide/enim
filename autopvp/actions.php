<?php
	require_once './dbconnect.php';

	$username='xenoma';
	$action=$_GET['a'];
	$sql="SELECT inventory FROM inventories WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);

	$inv=json_decode($row['inventory'], true);

	if($action==0){//drink all potions
		$sql2="SELECT gear FROM gears WHERE username='$username'";
		$result2=mysqli_query($db, $sql2);
		$row2=mysqli_fetch_array($result2);
		$gear=json_decode($row2['gear'], true);
		$i=0;
		while($i<sizeof($inv)){
			if($inv[$i][0]==1){
				$inv[$i][0]=-1;
				$tipo=$inv[$i][1];
				$gear[6][$tipo]+=($rar+1);
			}
			$i++;
		}
		$invjson=json_encode($inv);
			$sql="UPDATE inventories SET inventory='$invjson' WHERE username='$username'";
			mysqli_query($db, $sql);
		$gearjson=json_encode($gear);
			$sql="UPDATE gears SET gear='$gearjson' WHERE username='$username'";
			mysqli_query($db, $sql);
	}else if($action==1){//open all chests
		$level=$_GET['l'];//user level
		$s=0;
		while($s<sizeof($inv)){
			if($inv[$s][0]==0){
				$inv[$s][0]=-1;
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

						$inv[$i][7]=pDD((10/(11-$inv[$i][3]))/(7-$inv[$i][2]));//eff max_eff=60% (max 10% per gear)
						if($inv[$i][7]>10)$inv[$i][7]=10;
						$inv[$i][8]=pDD((10/(11-$inv[$i][3]))/(7-$inv[$i][2]));//mf max_mf=60% (max 10% per gear)
						if($inv[$i][8]>10)$inv[$i][8]=10;
						$inv[$i][9]=2;//expps

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
						$inv[$i][1]=floor(rand(0,5));//tipo di pozione
						$rar=floor(rand(0,99));
						if($rar<10)        $inv[$i][2]=2;
						else if($rar<35)   $inv[$i][2]=1;
						else              $inv[$i][2]=0;
						break;
					}$i++;
				}
			}
			$s++;
		}
		$invjson=json_encode($inv);
			$sql="UPDATE inventories SET inventory='$invjson' WHERE username='$username'";
			mysqli_query($db, $sql);
	}else if($action>1&&$action<8){
		$slot=0;
		$rar=$action-2;
		while($slot<sizeof($inv)){
			if($inv[$slot][0]==2&&$inv[$slot][2]==$rar){//gear
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
			$slot++;
		}
	}








?>
