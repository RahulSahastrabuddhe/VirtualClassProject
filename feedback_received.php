<?php
include ( 'includes/header1.php' );
?>

<html>
<body>
<h1>Database View:</h1>
<center>

<div id="body">
	<table width="80%" border="1">
    <tr>
	<td>data</td>
    <td>rating</td>
    </tr>
	
    <?php
	
	$sql="SELECT data, rating, teacher FROM teacherfeed where teacher='$user' ";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))
	{
		?>
        <tr>
        <td><?php echo $row['data'] ?></td>
        <td><?php echo $row['rating'] ?></td>
		
        </tr>
        <?php
	}		

	?>
    </table>
    
</div>
</center>
</body>
</html>
