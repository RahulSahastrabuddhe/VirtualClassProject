<?php

$link = mysqli_connect("localhost", "root", "", "mars");
if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$stime=$_POST['stime'];
$username=$_POST['username'];
$tusername=$_POST['tusername'];
$date=$_POST['date'];
$time=$_POST['time'];


/*$sql1="SELECT * FROM tattendance where tusername='$tusername' AND date='$date'";
	$result1=mysql_query($sql1);
	while($row1=mysql_fetch_array($result1))
	{
		$ttime=$row1['ttime'];
		$temp1=3*$ttime;
		$temp2=4*$stime;
		if ($temp1 <= $temp2)
		{
			$sql = "INSERT INTO attendance (stime, username, tusername, date, time, status) VALUES ('$stime','$username','$tusername',now(),'$time','p')";

		}
		else
		{
		    $sql = "INSERT INTO attendance (stime, username, tusername, date, time, status) VALUES ('$stime','$username','$tusername',now(),'$time','a')";
	
		}
	}

*/


$sql = "INSERT INTO attendance (stime, username, tusername, date, time, status) VALUES ('$stime','$username','$tusername',now(),'$time','p')";

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