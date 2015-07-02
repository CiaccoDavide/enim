<?php
	require_once './dbconnect.php';

	$username=$_GET['username'];

	$sql="SELECT exp,expmax,lvl FROM users WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);
	$level=$row['lvl'];
	echo '['.$row['exp'].','.$row['expmax'].','.$row['lvl'].','.$row['rank'].','.$row['wins'].','.$row['losses'].','.$row['credits'].']';

	echo '<br>';

	$sql="SELECT username FROM users WHERE username<>'$username' AND lvl=$level ORDER BY RAND() LIMIT 1";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);
	$opponent=$row[0];

	$sql="SELECT gear FROM gears WHERE username='$username'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);
	$user_gear=json_decode($row[0]);
	$sql="SELECT * FROM gears WHERE username='$opponent'";
	$result=mysqli_query($db, $sql);
	$row=mysqli_fetch_array($result);
	$opponent_gear=json_decode($row[1]);

	echo '<br>';
echo $username.' vs '.$opponent.'<br>';
    //                      0       1       2     3    4    5    6     7
//array inv: [tipo][tipo][rar][enanchement][lvl][atk][def][crit][mf][expps]

/* USER STATS */
	$user_atk=0;
	$multi_atk=1;
	for($i=0;$i<6;$i++)$user_atk+=$user_gear[$i][3];
	if($user_gear[6][0]>0)$multi_atk=2;
	$user_atk*=$multi_atk;

	$user_def=0;
	$multi_def=1;
	for($i=0;$i<6;$i++)$user_def+=($user_gear[$i][1]+1)*$user_gear[$i][4];
	if($user_gear[6][1]>0)$multi_def=2;
	$user_def*=$multi_def;

	$user_crit=0;
	$multi_crit=1;
	for($i=0;$i<6;$i++)$user_crit+=($user_gear[$i][1]+1)*$user_gear[$i][5];
	if($user_gear[6][2]>0)$multi_crit=2;
	$user_crit*=$multi_crit;

	$user_mf=0;
	$multi_mf=1;
	for($i=0;$i<6;$i++)$user_mf+=($user_gear[$i][1]+1)*$user_gear[$i][6];
	if($user_gear[6][3]>0)$multi_mf=2;
	$user_mf*=$multi_mf;

	$user_exp=0;
	$multi_exp=1;
	for($i=0;$i<6;$i++)$user_exp+=($user_gear[$i][1]+1)*$user_gear[$i][7];
	if($user_gear[6][4]>0)$multi_exp=2;
	$user_exp*=$multi_exp;

/* OPPONENT STATS */
	$user_atk=0;
	$multi_atk=1;
	for($i=0;$i<6;$i++)$user_atk+=($user_gear[$i][1]+1)*$user_gear[$i][3];
	if($user_gear[6][0]>0)$multi_atk=2;
	$user_atk*=$multi_atk;

	$user_def=0;
	$multi_def=1;
	for($i=0;$i<6;$i++)$user_def+=($user_gear[$i][1]+1)*$user_gear[$i][4];
	if($user_gear[6][1]>0)$multi_def=2;
	$user_def*=$multi_def;

	$user_crit=0;
	$multi_crit=1;
	for($i=0;$i<6;$i++)$user_crit+=($user_gear[$i][1]+1)*$user_gear[$i][5];
	if($user_gear[6][2]>0)$multi_crit=2;
	$user_crit*=$multi_crit;

	$user_mf=0;
	$multi_mf=1;
	for($i=0;$i<6;$i++)$user_mf+=($user_gear[$i][1]+1)*$user_gear[$i][6];
	if($user_gear[6][3]>0)$multi_mf=2;
	$user_mf*=$multi_mf;

	$user_exp=0;
	$multi_exp=1;
	for($i=0;$i<6;$i++)$user_exp+=($user_gear[$i][1]+1)*$user_gear[$i][7];
	if($user_gear[6][4]>0)$multi_exp=2;
	$user_exp*=$multi_exp;


	$opponent_atk=0;
	$multi_atk=1;
	for($i=0;$i<6;$i++)$opponent_atk+=($opponent_gear[$i][1]+1)*$opponent_gear[$i][3];
	if($opponent_gear[6][0]>0)$multi_atk=2;
	$opponent_atk*=$multi_atk;

	$opponent_def=0;
	$multi_def=1;
	for($i=0;$i<6;$i++)$opponent_def+=($opponent_gear[$i][1]+1)*$opponent_gear[$i][4];
	if($opponent_gear[6][1]>0)$multi_def=2;
	$opponent_def*=$multi_def;

	$opponent_crit=0;
	$multi_crit=1;
	for($i=0;$i<6;$i++)$opponent_crit+=($opponent_gear[$i][1]+1)*$opponent_gear[$i][5];
	if($opponent_gear[6][2]>0)$multi_crit=2;
	$opponent_crit*=$multi_crit;

	$opponent_mf=0;
	$multi_mf=1;
	for($i=0;$i<6;$i++)$opponent_mf+=($opponent_gear[$i][1]+1)*$opponent_gear[$i][6];
	if($opponent_gear[6][3]>0)$multi_mf=2;
	$opponent_mf*=$multi_mf;

	$opponent_exp=0;
	$multi_exp=1;
	for($i=0;$i<6;$i++)$opponent_exp+=($opponent_gear[$i][1]+1)*$opponent_gear[$i][7];
	if($opponent_gear[6][4]>0)$multi_exp=2;
	$opponent_exp*=$multi_exp;

echo '<br>';
echo 'Atk: '.($user_atk).' vs '.($opponent_atk).'<br>';
echo 'Def: '.($user_def).' vs '.($opponent_def).'<br>';
echo 'Crit: '.($user_crit).' vs '.($opponent_crit).'<br>';
echo 'MF: '.($user_mf).' vs '.($opponent_mf).'<br>';
echo 'Exp: '.($user_exp).' vs '.($opponent_exp).'<br>';
echo '<br>';


	$user_damage_dealt=0;
	$opponent_damage_dealt=0;
	for($i=0;$i<10;$i++){
		/*turno user*/
		$rand=rand(0,100);
		if($rand<$user_crit) $user_damage_dealt_temp=$user_atk; //se crit un attacco passa senza difesa e ne passa un altro con la difesa
		if($opponent_def>=$user_atk) $effetto=0.4; //40%
		else $effetto=pDD(0.4+(((1-$opponent_def/$user_atk)/100)*60));
		if($effetto>1)$effetto=1;
		$user_damage_dealt_temp+=$user_atk*$effetto;
		$user_damage_dealt+=$user_damage_dealt_temp;

		/*turno opponent*/
		$rand=rand(0,100);
		if($rand<$opponent_crit) $opponent_damage_dealt_temp=$opponent_atk; //se crit un attacco passa senza difesa e ne passa un altro con la difesa
		if($user_def>=$opponent_atk) $effetto=0.4; //40%
		else $effetto=pDD(0.4+(((1-$user_def/$opponent_atk)/100)*60));
		if($effetto>1)$effetto=1;
		$opponent_damage_dealt_temp+=$opponent_atk*$effetto;
		$opponent_damage_dealt+=$opponent_damage_dealt_temp;

echo 'Round '.$i.': '.($user_damage_dealt_temp).' vs '.($opponent_damage_dealt_temp).'<br>';
	}
echo 'Result: '.($user_damage_dealt).' vs '.($opponent_damage_dealt).'<br>';


	/*alla fine della battaglia:
		-sottrai 1 a tutti i potion timers a meno che non siano già a 0
	*/
function pDD($num){//tieni solo 2 cifre decimali - parsaDueDecimali
	return floor(100*$num)/100;
}

?>
