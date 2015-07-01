<?php
	require_once './dbconnect.php';

	$username=$_GET['u'];
	$level=$_GET['l'];

	$sql="SELECT inventory FROM inventories WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);

	$inv=json_decode($row['inventory'], true);

	$tipo=$rar=0;
	$tipo=floor((rand(0,8)));
	if($tipo==0){//cassa
		$rar=floor(rand(0,3599));
		if($rar<3)         $rar=5;
		else if($rar<40)   $rar=4;
		else if($rar<180)  $rar=3;
		else if($rar<560)  $rar=2;
		else if($rar<1500) $rar=1;
		else              $rar=0;

		while($i<sizeof($inv)){
			if($inv[$i][0]==-1){
				$inv[$i][0]=0;//gear_code
				$inv[$i][2]=$rar;//rarità
				break;
			}$i++;
		}
	}else if($tipo<3){//pozione
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
	}else{//gear
		$rar=floor(rand(0,3599));
		if($rar<3)         $rar=5;
		else if($rar<40)   $rar=4;
		else if($rar<180)  $rar=3;
		else if($rar<560)  $rar=2;
		else if($rar<1500) $rar=1;
		else              $rar=0;

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


	$invjson=json_encode($inv);
		$sql="UPDATE inventories SET inventory='$invjson' WHERE username='$username'";
		mysqli_query($db, $sql);



	function pDD($num){//tieni solo 2 cifre decimali - parsaDueDecimali
	  return floor(100*$num)/100;
	}


?>
