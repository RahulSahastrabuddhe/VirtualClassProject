<?php
// connection details
include ( 'includes/header1.php' );
//If your session isn't valid, it returns you to the login screen for protection
//retrive student details from the tbmembers table
$result=mysql_query("SELECT * FROM users WHERE username = '$_SESSION[username]'")
or die("There are no records to display ... \n" . mysql_error()); 
if (mysql_num_rows($result)<1){
    $result = null;
}
$row = mysql_fetch_array($result);
if($row)
 {
 // get data from db
 $firstname = $row['firstname'];
 $lastname = $row['lastname'];
 $username = $row['username'];
 $email = $row['email'];
 $department = $row['department'];
 $year = $row['year'];
 }
?>
<?php
// updating sql query
if (isset($_POST['update'])){
$firstname = strip_tags($_POST['firstname']);
 $lastname = strip_tags($_POST['lastname']);
 $username = strip_tags($_POST['username']);
 $email = strip_tags($_POST['email']);
 $department = strip_tags($_POST['department']);
 $year = strip_tags($_POST['year']);
 $password = strip_tags(md5($_POST['password']));
 $newpass = md5($password); //This will make your password encrypted into md5, a high security hash

$sql = mysql_query( "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email',department='$department',year='$year', password='$newpass' WHERE username = '$username'" )
        or die( mysql_error() );

// redirect back to profile
 header("Location: manage-profile.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Profile Management</title>
</head>
<body>
<div id="page">
<div id="header">
  <h1>MANAGE MY PROFILE</h1>
</div>
<div id="container">
<table>
<tr>
<td>
<table width="380" align="center">
<CAPTION><h3>MY PROFILE</h3></CAPTION>
<tr>
    <td>First Name:</td>
    <td><?php echo $firstname; ?></td>
</tr>
<tr>
    <td>Last Name:</td>
    <td><?php echo $lastname; ?></td>
</tr>
<tr>
    <td>email:</td>
    <td><?php echo $email; ?></td>
</tr>
<tr>
    <td>Department:</td>
    <td><?php echo $department; ?></td>
</tr>
<tr>
    <td>year:</td>
    <td><?php echo $year; ?></td>
</tr>

<tr>
    <td>Password:</td>
    <td>Encrypted</td>
</tr>

</table>
</td>
<td>
<table border="0" width="620" align="center">
<CAPTION><h3>UPDATE PROFILE</h3></CAPTION>
<form action="manage-profile.php?id=<?php echo $_SESSION['username']; ?>" method="post" onsubmit="return updateProfile(this)">
<table align="center">
<tr><td>First Name:</td><td><input type='text' name='firstname' value='<?php echo $firstname ?>' placeholder='Firstname ...'class="form-control" onclick='value=""'required/></td></tr>
<tr><td>Last Name:</td><td><input type='text' name='lastname' value='<?php echo $lastname ?>'  placeholder='Lastname ...'class="form-control" onclick='value=""'required/></td></tr>
<tr><td>Email:</td><td><input type="email" placeholder="Email..." name="email" value='<?php echo $email ?>' id="email"class="form-control" required><span id="status"></td></tr>
<tr><td>Password:</td><td><input type="password"class="form-control" placeholder="New Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required oninvalid="setCustomValidity('Password must contain at least 6 characters, including UPPER/lowercase and numbers')" onChange="try{setCustomValidity('')}catch(e){}"></td></tr>
<tr><td>Repeat Password:</td><td><input type="password" name="passwordrepeat"  placeholder='Repeat Password ...' class="form-control"onclick='value=""' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required oninvalid="setCustomValidity('Password must contain at least 6 characters, including UPPER/lowercase and numbers')" onChange="try{setCustomValidity('')}catch(e){}"/></td></tr>
<tr><td>Department:</td><td><select name="department">
                     <option value="IT">IT</option>
                     <option value="CSE">CSE</option>
                     <option value="EXTC">EXTC</option>
                     <option value="INST">INST</option>
                     </select></td></tr>
					 
					 
<tr><td>Year:</td><td><select name="year">
                     <option value="1">First Year</option>
                     <option value="2">Second Year</option>
                     <option value="3">Third Year</option>
                     <option value="4">Final Year</option>
                     </select></td></tr>

<tr><td>&nbsp;</td></td><td><input type="submit" name="update" value="Update Profile"></td></tr>
</table>
</form>
</td>
</tr>
</table>
<hr>
</div>
<div id="footer"> 
<?php
include ( 'includes/footer1.php' );
?>
</div>
</div>
</body>
</html>