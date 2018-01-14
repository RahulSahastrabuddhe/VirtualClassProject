<?php
include ( 'includes/header1.php' );
?>
<?php
$sql1="SELECT * FROM tattendance ";
	$result1=mysql_query($sql1);
	while($row1=mysql_fetch_array($result1))
	{
		$ttime=$row1['ttime'];
		$tusername=$row1['tusername'];
		$date=$row1['date'];
		$sql2="SELECT * FROM attendance ";
     	$result2=mysql_query($sql2);
		while($row2=mysql_fetch_array($result2))
	{

		$stime=$row2['stime'];
		$sdate=$row2['date'];
		$stusername=$row1['tusername'];
		$username=$row1['username'];
		
		if( $tusername==$stusername && $date==$sdate )
		{
		$temp1=30*$ttime;
		$temp2=40*$stime;
		if ($temp1 <= $temp2)
		{
			$sql2 = "UPDATE attendance SET status='p1' WHERE username='$username' AND date='$sdate'";
			mysql_query($sql2);
			echo "Success  ";
		    echo "$temp1";
			echo "$temp2";
		}
		
		}
		else
		{
			echo "no records selected";
		}
	}
	}
	
?>