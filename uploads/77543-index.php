<?php
include ( 'includes/header1.php' );
$error = "";
if (@$_POST['register']) {
  $date = date("m d Y");
  
       $firstname = strip_tags($_POST['firstname']);
       $lastname = strip_tags($_POST['lastname']);
       $username = strip_tags($_POST['username']);
       $email = strip_tags($_POST['email']);
       $password1 = strip_tags($_POST['password']);
       $password2 = strip_tags($_POST['passwordrepeat']);
 
       $day = strip_tags($_POST['day']);
       $month = strip_tags($_POST['month']);
       $year = strip_tags($_POST['year']);
       $dob = "$day/$month/$year";
 
    if ($firstname == "") {
     $error = "Firstname cannot be left empty.";
    }
     else if ($lastname == "") {
      $error = "Lastname cannot be left empty.";
    }
    else if ($username == "") {
     $error = "Username cannot be left empty.";
    }
    else if ($email == "") {
    $error = "Email cannot be left empty.";
    }
    else if ($password1 == "") {
    $error = "Password cannot be left empty.";
    }
    else if ($password2 == "") {
    $error = "Repeat Password cannot be left empty.";
 }
 else if ($day == "") {
  $error = "The day you were born cannot be left empty.";
 }
 else if ($month == "") {
  $error = "The month you were born cannot be left empty.";
 }
 else if ($year == "") {
  $error = "The year you were born cannot be left empty.";
 }
 //Check the username doesn't already exist
 $check_username = mysql_query("SELECT username FROM users WHERE username='$username'");
 $numrows_username = mysql_num_rows($check_username);
 if ($numrows_username != 0) {
  $error = 'That username has already been registered.';
 }
 else
 {
  $check_email = mysql_query("SELECT email FROM users WHERE email='$email'");
 $numrows_email = mysql_num_rows($check_email);
 if ($numrows_email != 0) {
  $error = 'That email has already been registered.';
 }
 else
 {
  // $salt1 = "francis";
  // $salt1 = ($salt1);
  // $salt2 = "cookie";
  // $salt2 = ($salt2);
  // $salt3 = "php";
  // $salt3 =($salt3);
  // $password1 = $salt1.$password1.$salt3;
  // $password1 = ($password1.$salt2);
  // $password2 = $salt1.$password2.$salt3;
  // $password2 = ($password2.$salt2);
 if ($password1 != $password2) {
 $error = 'The passwords don\'t match!';
 }
 else
 {
 //Register the user
 $register = mysql_query("INSERT INTO users VALUES('','$firstname','$lastname','$username','$email','$password1','$dob','no','','$date')") or die(mysql_error());
 die('Registered successfully!');//kadm5_mo
 }
 }
 }
}
?>
<h2>Create Your Account</h2><!--
<form action='join.php' method='POST'>
<input type='text' name='firstname' value='Firstname ...' onclick='value=""'/><p />
<input type='text' name='lastname' value='Lastname ...' onclick='value=""'/><p />
<input type='text' name='username' value='Username ...' onclick='value=""'/><p />
<input type='text' name='email' value='Email ...' onclick='value=""'/><p />
<input type='text' name='password' value='Password ...' onclick='value=""'/><p />
<input type='text' name='passwordrepeat' value='Repeat Password ...' onclick='value=""'/><p />
<input type='text' name='day' value='' size='3' maxlength='2' onclick='value=""'/>
<input type='text' name='month' value='' size='6' maxlength='2' onclick='value=""'/>
<input type='text' name='year' value='' size='4' maxlength='4' onclick='value=""'/>--><p />

<!--<input type='submit' name='register' value='Create Your Account' />
--><?php echo $error; ?>
</form>