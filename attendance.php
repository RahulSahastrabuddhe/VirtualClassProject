<?php
include ( 'includes/header1.php' );
?>

<html>
<body>
<h1>Database View:</h1>
<center>

<form action="attendance.php" method="post" enctype="multipart/form-data">
		<label><h2> Choose Date :</h2><input type="date" name="date"></label>
		<button type="submit" name="submit">Submit</button>
		</form>



<div id="body">
	<table width="80%" border="1">
    <tr>
	<td>username</td>
    <td>date</td>
    <td>start time</td>
    <td>time watched</td>
    </tr>
	
    <?php
	if(isset($_POST['submit'])){
	$date=$_POST['date'];
	$sql="SELECT * FROM attendance where tusername='$user' and date='$date' order by date";
	$result_set=mysql_query($sql);
	
	while($row=mysql_fetch_array($result_set))
	{
		?>
        <tr>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><?php echo $row['time'] ?></td>
		<td><?php echo $row['stime'] ?></td>
        </tr>
        <?php
	}
	}
	else{
	$sql="SELECT * FROM attendance where tusername='$user' order by date";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))
	{
		?>
        <tr>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td><?php echo $row['time'] ?></td>
		<td><?php echo $row['stime'] ?></td>
        </tr>
        <?php
	}		
	}
	?>
    </table>
    
</div>
</center>
</body>
</html>
