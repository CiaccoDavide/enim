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

echo 'Atk: '.($user_gear[0][3]+$user_gear[1][3]+$user_gear[2][3]+$user_gear[3][3]+$user_gear[4][3]+$user_gear[5][3]).' vs '.($opponent_gear[0][3]+$opponent_gear[1][3]+$opponent_gear[2][3]+$opponent_gear[3][3]+$opponent_gear[4][3]+$opponent_gear[5][3]).'<br>';
echo 'Atk: '.($user_gear[0][4]+$user_gear[1][4]+$user_gear[2][4]+$user_gear[3][4]+$user_gear[4][4]+$user_gear[5][4]).' vs '.($opponent_gear[0][4]+$opponent_gear[1][4]+$opponent_gear[2][4]+$opponent_gear[3][4]+$opponent_gear[4][4]+$opponent_gear[5][4]).'<br>';
echo 'Atk: '.($user_gear[0][5]+$user_gear[1][5]+$user_gear[2][5]+$user_gear[3][5]+$user_gear[4][5]+$user_gear[5][5]).' vs '.($opponent_gear[0][5]+$opponent_gear[1][5]+$opponent_gear[2][5]+$opponent_gear[3][5]+$opponent_gear[4][5]+$opponent_gear[5][5]).'<br>';
echo 'Atk: '.($user_gear[0][6]+$user_gear[1][6]+$user_gear[2][6]+$user_gear[3][6]+$user_gear[4][6]+$user_gear[5][6]).' vs '.($opponent_gear[0][6]+$opponent_gear[1][6]+$opponent_gear[2][6]+$opponent_gear[3][6]+$opponent_gear[4][6]+$opponent_gear[5][6]).'<br>';
echo 'Atk: '.($user_gear[0][7]+$user_gear[1][7]+$user_gear[2][7]+$user_gear[3][7]+$user_gear[4][7]+$user_gear[5][7]).' vs '.($opponent_gear[0][7]+$opponent_gear[1][7]+$opponent_gear[2][7]+$opponent_gear[3][7]+$opponent_gear[4][7]+$opponent_gear[5][7]).'<br>';


    //                      0       1       2     3    4    5    6     7
//array inv: [tipo][tipo][rar][enanchement][lvl][atk][def][crit][mf][expps]
//AGGIUNGERE I MOLTIPLICATORI DELLE POZIONI!!!
	$user_atk=0;
	$multi_atk=$multi_def=1;
	for($i=0;$i<6;$i++)
		$user_atk+=($user_gear[i][1]+1)*$user_gear[i][3];
	if($user_gear[6][0]>0)$multi_atk=2;
	$user_atk*=$multi_atk;

	$user_def=0;
	$multi_def=1;
	for($i=0;$i<6;$i++)
		$user_def+=($user_gear[i][1]+1)*$user_gear[i][4];
	if($user_gear[6][1]>0)$multi_def=2;
	$user_atk*=$multi_def;




//	echo '<br>'.$user_atk;









	/*alla fine della battaglia:
		-sottrai 1 a tutti i potion timers a meno che non siano già a 0
	*/


?>
