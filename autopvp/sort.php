<?php
    require_once './dbconnect.php';

    $username=$_GET['u'];

    $sql="SELECT inventory FROM inventories WHERE username='$username'";
    $result=mysqli_query($db, $sql);
    $row=mysqli_fetch_array($result);

    $inv=json_decode($row['inventory'], true);
    usort($inv, function($a, $b) {
        return ($b[0]*100+$b[1]*10+$b[2]) - ($a[0]*100+$a[1]*10+$a[2]);
    });

    $invjson=json_encode($inv);
    $sql="UPDATE inventories SET inventory='$invjson' WHERE username='$username'";
    mysqli_query($db, $sql);
    echo $invjson;
    header('Content-type: application/json');
?>
