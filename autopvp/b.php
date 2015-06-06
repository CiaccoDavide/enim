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




	echo '<br>'.$user_atk;









	/*alla fine della battaglia:
		-sottrai 1 a tutti i potion timers a meno che non siano già a 0
	*/


?>