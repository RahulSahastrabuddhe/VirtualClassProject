<?php
include ( 'includes/header1.php' );
if(isset($_POST['btn-upload']))
{    
     
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";
	$user=$_SESSION['username'];
	$subject =$_POST['subject'];
	
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql="INSERT INTO fileupload(username,subject,file,type,size) VALUES('$user','$subject','$final_file','$file_type','$new_size')";
		mysql_query($sql);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='fileupload.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='fileupload.php?fail';
        </script>
		<?php
	}
}

if(isset($_POST['search']))
{    
	$subject1=$_POST['subject1'];
}

if(isset($_POST['delete']))
{    
	$file=$_POST['file'];
	$query = "DELETE FROM  fileupload WHERE   file='$file'"; 
	$dir="uploads"; 
	unlink($dir.'/'.$file);
	$result = mysql_query($query) or die(mysql_error());
	echo "successfully deleted";
}

if(isset($_POST['add']))
{    
	$sub=$_POST['tsubject'];
	$query = "INSERT INTO tsubject(username,subject) VALUES('$user','$sub')"; 
	$result = mysql_query($query) or die(mysql_error());
	echo "Subject Added successfully";
}
?>



<?php   
	$username = $_SESSION['username'];
	$query = mysql_query("SELECT * FROM users where username='$username'");
	$row=mysql_fetch_array($query);
?>

<?php if ($row['role']=='Teacher'){?>
    <html>
	<body>
	<h1>Select The subjects You Teach:</h1>
	<center>
		<form action="fileupload.php" method="post" enctype="multipart/form-data">
			<select name="tsubject">   
			<option value="" disabled selected>Subject List</option>                       
			<?php
				$query = mysql_query("SELECT * FROM subjects"); 
				while($row=mysql_fetch_array($query))
					{
					echo "<option>".$row['subject']."</option>";
					}
			echo "</select>";
?>
			</select>

		<button type="submit" name="add">ADD</button>
		</form>
	</center>
	</body>
	</html>
<?php }else{ ?>
<?php } ?>

<html>
	<head>
	<title>File Uploading With PHP and MySql</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	</head>
	<body>
	<div id="header"> </div>
	<h1>Upload Files:</h1>
	<center>
	<div id="body">
	<form action="fileupload.php" method="post" enctype="multipart/form-data">	
		<select name="subject">      
		<option value="" disabled selected>Select subject</option>	
		<?php $username = $_SESSION['username'];
			$query = mysql_query("SELECT * FROM users where username='$username'");
			$row=mysql_fetch_array($query);
		?>
		<?php if ($row['role']=='Teacher'){?>
		<?php
        $result=mysql_query("SELECT * FROM users WHERE username = '$_SESSION[username]'")
        or die("There are no records to display ... \n" . mysql_error()); 
        if (mysql_num_rows($result)<1)
		{
			$result = null;
        }
        $row = mysql_fetch_array($result);
        if($row)
        {
			$department = $row['department'];
			$year = $row['year'];
        }
        $query = mysql_query("SELECT * FROM tsubject "); 
        while($row=mysql_fetch_array($query)){
        echo "<option>".$row['subject']."</option>";
        }
        echo "</select>";
		?>
		<?php }else{ ?>
		<?php
        $result=mysql_query("SELECT * FROM users WHERE username = '$_SESSION[username]'")
        or die("There are no records to display ... \n" . mysql_error()); 
        if (mysql_num_rows($result)<1)
		{
			$result = null;
        }
        $row = mysql_fetch_array($result);
        if($row)
        {
			$department = $row['department'];
			$year = $row['year'];
        }
        $query = mysql_query("SELECT * FROM subjects where department='$department' AND year='$year'"); 
        while($row=mysql_fetch_array($query))
		{
			echo "<option>".$row['subject']."</option>";
        }
        echo "</select>";
		?>
		<?php } ?>
		</select>
		<input type="file" name="file" />
		<button type="submit" name="btn-upload">upload</button>
		</form>
		<br /><br />
		<?php
			if(isset($_GET['success']))
			{
		?>
			<label>File Uploaded Successfully...  </label>
        <?php
			}
			else if(isset($_GET['fail']))
			{
		?>
			<label>Problem While File Uploading !</label>
        <?php
			}
			else
			{}
		?>
	</div>
	</center>
	</body>
	</html>

<html>
	<body>
		<h1>Select the file you want to delete:</h1>
		<center>
			<form action="fileupload.php" method="post" enctype="multipart/form-data">
				<select name="file">   
				<option value="" disabled selected>Select file to delete</option>                       
				<?php
					$query = mysql_query("SELECT * FROM fileupload where username = '$_SESSION[username]'"); 
					while($row=mysql_fetch_array($query))
					{
						echo "<option>".$row['file']."</option>";
					}
					echo "</select>";
				?>
				</select>

				<button type="submit" name="delete">Submit</button>
			</form>
		</center>
	</body>
</html>



<html>
	<body>
		<h1>Database View:</h1>
		<div id="body">
		<center>
			<form action="fileupload.php" method="post" enctype="multipart/form-data">
			<select name="subject1">   
			<option value="" disabled selected>Select subject</option>
			<?php   
				$username = $_SESSION['username'];
				$query = mysql_query("SELECT * FROM users where username='$username'");
				$row=mysql_fetch_array($query);
			?>
			<?php 
				if ($row['role']=='Teacher'){
			?>    
			<?php
				$user=$_SESSION['username'];
				$query = mysql_query("SELECT * FROM tsubject where username='$user'"); 
				while($row=mysql_fetch_array($query))
				{
					echo "<option>".$row['subject']."</option>";
				}
				echo "</select>";
		
			?>
			<?php }else{ ?>		
			<?php
				$result=mysql_query("SELECT * FROM users WHERE username = '$_SESSION[username]'")
				or die("There are no records to display ... \n" . mysql_error()); 
				if (mysql_num_rows($result)<1)
				{
					$result = null;
				}
				$row = mysql_fetch_array($result);
				if($row)
				{
					$department = $row['department'];
					$year = $row['year'];
				}
				$query = mysql_query("SELECT * FROM subjects where department='$department' AND year='$year'"); 
				while($row=mysql_fetch_array($query))
				{
					echo "<option>".$row['subject']."</option>";
				}
				echo "</select>";
		
			?>
			<?php } ?>
			</select>

		<button type="submit" name="search">Submit</button>
		</form>

	</center>


	<table width="80%" border="1">
		<tr>
			<td>File Name</td>
			<td>File Type</td>
			<td>File Size(KB)</td>
			<td>View</td>
		</tr>
	
    <?php
	$sql="SELECT * FROM fileupload where subject='$subject1'";
	$result_set=mysql_query($sql);
	while($row=mysql_fetch_array($result_set))
	{
		?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
	}
	?>
    </table>
</div>
</br></br></br></br></br></br></br></br></br></br>
</body>
</html>

<?php

include ( 'includes/footer1.php' );
?>