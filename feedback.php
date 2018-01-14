<?php
include ( 'includes/header1.php' );

if (isset($_POST['feedback']))
{
	$link = mysqli_connect("localhost", "root", "", "mars"); 
	if($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$username = $_SESSION['username'];
	$teacher = mysqli_real_escape_string($link, $_REQUEST['teacher']);
	$subject = mysqli_real_escape_string($link, $_REQUEST['subject']);
	$rating = mysqli_real_escape_string($link, $_REQUEST['rating']);
	$data = mysqli_real_escape_string($link, $_REQUEST['data']);

	if($subject==NULL)
	{
		$query = mysql_query("SELECT * FROM teacherfeed where username = '$_SESSION[username]' and teacher='$teacher'"); 
		if($row=mysql_fetch_array($query)!=NULL)
		{
			$sql = "UPDATE teacherfeed set rating='$rating', data='$data' WHERE username='$username' and teacher='$teacher'";		
		}
		else
		{
			$sql = "INSERT INTO teacherfeed (username, teacher, rating, data) VALUES ('$username','$teacher', '$rating', '$data')";
		}
	
	
		if(mysqli_query($link, $sql))
		{
			echo "<center><h1>"."feedback submitted successfully."."</h1></center>";
		}	 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}	

	if($teacher==NULL)
	{
		$query = mysql_query("SELECT * FROM subjectfeed where username = '$_SESSION[username]' and subject='$subject'"); 
		if($row=mysql_fetch_array($query)!=NULL)
		{
			$sql = "UPDATE subjectfeed set rating='$rating', data='$data' WHERE username='$username' and subject='$subject'";		
		}
		else
		{
			$sql = "INSERT INTO subjectfeed (username, subject, rating, data) VALUES ('$username','$subject', '$rating', '$data')";
		}
	
		if(mysqli_query($link, $sql))
		{
			echo "<center><h1>"."feedback submitted successfully."."</h1></center>";
		}
		else
		{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}

	if($teacher!=NULL && $subject!=NULL)
	{
		echo "<center><h1>"."moron you've selected both"."</h1></center>";
	}
	mysqli_close($link);
}
?>
				   
<script type="text/javascript">
function toggleSelect(id)
{
    if (id == 'subject')
    {
          document.getElementById('teacher').style['display'] = 'none';
          document.getElementById('subject').style['display'] = 'block';
    }

    if (id == 'teacher')
    {
          document.getElementById('subject').style['display'] = 'none';
          document.getElementById('teacher').style['display'] = 'block';
    }
}
</script>

<html>
<center>
	<head>
	<title>Contact Us</title>
	<link rel="stylesheet" type="text/css" href="freecontactform.css">
	</head>
	<body>
	              <form name="freecontactform" method="post" action="feedback.php" >
	                <table width="400" class="freecontactform">
	                  <tr>
	                    <td colspan="2"> 
	                      <div class="freecontactformheader">Feedback Form</div>
	                       <div class="freecontactformmessage">Fields marked with <span class="required_star"> * </span> are mandatory.</div>	 </td>
	                   </tr>
	                  
	                   <tr>
	                    <td valign="top">
	                      <label for="label" class="required">Please Select <span class="required_star"> * </span></label>
						  </td>
	                    <td valign="top">

                        <input type='radio' name='role' value='teacher' onClick="toggleSelect('teacher');" checked='1' /><label for='teacher'>Teacher</label>
                        <input type='radio' name='role' value='subject' onClick="toggleSelect('subject');" /><label for='subject'>Subject</label>


						<select id='teacher' name='teacher'  style='display: block;'>
						<option></option>
						<?php
							$query = mysql_query("SELECT * FROM users where role='Teacher'"); 
							while($row=mysql_fetch_array($query)){
							echo "<option>".$row['username']."</option>";
							}
							echo "</select>";
						?>

						<select id='subject' name='subject' style='display: none;'>
						<option></option>
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

    
	                </td>
	                </br>
				    </tr>
	                <tr>
						<td valign="top">
							<label for="Your_Message" class="required">Your Message<span class="required_star"> * </span></label>            
						</td>
						<td valign="top">
							<textarea style="width:230px;height:160px" name="data" id="Your_Message" maxlength="200" required></textarea>	     
						</td>
	                </tr>
	                <tr>
                        <td valign="top"><label ><strong>Rating</strong></label></td>
	                    <td valign="top"><label>
	                      <select name="rating">
                            <option>Excellent</option>
                            <option>Very Good</option>
                            <option>Good</option>
                            <option>Fair</option>
                            <option>Unsatisfactory</option>
                          </select>
						</label></td>
                    </tr>
	                <tr>
	                    <td colspan="2" style="text-align:center" \>
		<section id="buttons">
		  <input type="reset" name="reset" id="resetbtn" class="resetbtn" value="Reset">
		  <label>
		  <input type="submit" name="feedback"  value="Submit" >
		  </label>
		  <br style="clear:both;">
		</section></td>
	              </tr>
                    </table>

	              </form>
	</body>
</center>

	</html>



<html>
<body>

<div id="footer"> 
<?php
include ( 'includes/footer1.php' );
?>
</div>

</body>
</html>


<style>
.freecontactform {
width: 460px;
font-family: arial;
border: 1px solid #AAA;
padding:10px;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
}
.freecontactformheader {
font-size:18px;
font-weight:bold;
padding-top:10px;
padding-bottom:10px;
text-align:center;
}
.freecontactformmessage {
text-align:center;
padding-bottom:10px;
}
.freecontactform td {
padding:4px;
font-size:12px;
}
.freecontactform p {
padding:4px;
}
.freecontactform label {
padding:4px;
}
.freecontactform label {
padding-right:10px
}
.required {
font-weight:bold;
}
.required_star {
font-weight:bold;
color:#F00;
}
.not-required {
font-weight:normal
}
.antispammessage {
padding:10px;
border-top:1px solid #AAA;
border-bottom:1px solid #AAA;
font-weight:bold 
}
.antispamquestion {
font-weight:normal;
}
</style>