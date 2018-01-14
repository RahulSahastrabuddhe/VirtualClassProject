<?php

$link = mysqli_connect("localhost", "root", "", "mars");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$ttime=$_POST['ttime'];
$tusername=$_POST['tusername'];
$date=$_POST['date'];
$time=$_POST['time'];

$sql = "INSERT INTO tattendance (tusername, date, time, ttime) VALUES ('$tusername',now(),'$time','$ttime')";
if(mysqli_query($link, $sql))
{
    echo "Records inserted successfully.";
} 
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>