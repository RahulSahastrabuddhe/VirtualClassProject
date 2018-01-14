<?php
session_start();
include ( 'includes/connect_to_mysql.php' );
$user = "";
if (isset($_SESSION['username'])) {
 $user = $_SESSION['username'];
}
else
{
 $user = "";
}
?>
<?php
error_reporting(0);
if(isset($_POST['register'])) {
$error = "";

 $date = date("m d Y");
 $firstname = strip_tags($_POST['firstname']);
 $lastname = strip_tags($_POST['lastname']);
 $username = strip_tags($_POST['username']);
 $email = strip_tags($_POST['email']);
 $password1 = strip_tags(md5($_POST['password']));
 $password2 = strip_tags(md5($_POST['passwordrepeat']));
 $role = strip_tags($_POST['role']);
 $department = strip_tags($_POST['department']);
 $year = strip_tags($_POST['year']);

 
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
 if ($password1 != $password2) {
 $error = 'The passwords don\'t match!';
 }
 else
 {
 //Register the user
 $register = mysql_query("INSERT INTO users(firstname,lastname,username,email,password,dob,locked,role,department,year) VALUES('$firstname','$lastname','$username','$email','$password1','10','no','$role','$department','$year')") or die(mysql_error());
 $username = strip_tags($_POST['username']);
 $password = strip_tags(md5($_POST['password']));
 // echo $username;
 $check_username = mysql_query("SELECT username FROM users WHERE username='$username'");
 $numrows = mysql_num_rows($check_username);
 if ($numrows != 1) {
  echo 'That User does not exist';
 }
 else
 {
  $check_password = mysql_query("SELECT password FROM users WHERE password='$password' && username='$username'");
  while ($row = mysql_fetch_assoc($check_password)) {
   $password_db = $row['password'];
   
   if ($password_db == $password) {
     $_SESSION['username'] = $username;
    header("Location: index.php");
   }
  }
 }
 }
 }
 }
}
 //verify user login_form
if (isset($_POST['username'])&&($_POST['password'])) {
  $username = strip_tags($_POST['username']);
  $password = strip_tags(md5($_POST['password']));
 // echo $username;
 $check_username = mysql_query("SELECT username FROM users WHERE username='$username'");
 $numrows = mysql_num_rows($check_username);
 if ($numrows != 1) {
  echo 'That User does not exist';
 }
 else
 {
  $check_password = mysql_query("SELECT password FROM users WHERE password='$password' && username='$username'");
  while ($row = mysql_fetch_assoc($check_password)) {
   $password_db = $row['password'];
   
   if ($password_db == $password) {
     $_SESSION['username'] = $username;
    header("Location: index.php");
   }
  }
 }
} 
?>



<SCRIPT type="text/javascript" src="checkinguser.js"></SCRIPT>
<SCRIPT type="text/javascript">

$(document).ready(function(){
$("#username").change(function() { 
var usrN = $("#username").val();
if(usrN.length >= 4)
{


    $.ajax({  
    type: "POST",  
    url: "checking.php",  
    data: "username="+ usrN,  
    success: function(msg){  
   
   $("#statuspass").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#username").removeClass('object_error'); 
		$("#username").addClass("object_ok");
		$(this).html('<img src="images/success.png" align="absmiddle">&nbsp;OK<');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); 
		$("#username").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#statuspass").html('<font color="red" style="margin-left:125px;">something went wrong <strong></strong> .</font>');
	$("#username").removeClass('object_ok'); 
	$("#username").addClass("object_error");
	}

});

});

//-->
</SCRIPT>
  

<SCRIPT type="text/javascript" src="checkinguser.js"></SCRIPT>
<SCRIPT type="text/javascript">



$(document).ready(function(){

$("#email").change(function() { 

var usr = $("#email").val();

if(usr.length >= 4)
{

    $.ajax({  
    type: "POST",  
    url: "checking.php",  
    data: "username="+ usrN,  
    success: function(msg){  
   
   $("#statuspass").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#username").removeClass('object_error'); 
		$("#username").addClass("object_ok");
		$(this).html('<img src="images/success.png" align="absmiddle">&nbsp;OK<');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); 
		$("#username").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#statuspass").html('<font color="red" style="margin-left:125px;">something went wrong <strong></strong> .</font>');
	$("#username").removeClass('object_ok'); 
	$("#username").addClass("object_error");
	}

});

});

//-->
</SCRIPT>


<head>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/mainfont.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<div id="wrapper-bg">
	<div id="wrapper">
		<div id="header" class="container">
			<div id="logo">
				<h1><a href="index.php"><span>ILLUMI</span>NOUS</a></h1>
			</div>
			<div id="menu">
				<ul>
					<li class="active"><a href="index.php" accesskey="1" title="">Home</a></li>
					
					<li><a href="about.php" accesskey="3" title="">About Us</a></li>
					<li><a href="contact.php" accesskey="4" title="">Contact Us</a></li>
					
					
					<?php if (isset($_SESSION['username'])){?>
			        <li><a href="manage-profile.php">Edit Profile</a></li>
					<li><a href="logout.php">Logout</a></li>
					
					<?php   $username = $_SESSION['username'];
					        $query = mysql_query("SELECT * FROM users where username='$username'");
							$row=mysql_fetch_array($query);
											    ?>
					<?php if ($row['role']=='Teacher'){?>
			        <li><a href="feedback_received.php">Feedback Received</a></li>
					<?php }else{ ?>
					<?php } ?>
					
			        <?php }else{ ?>
					
					<li><a id="modal_trigger" href="#modal" accesskey="5" >Login</a></li>
                      
					
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
	
	<div id="modal" class="popupContainer" style="Display: none;">
	<div style="height:400px;overflow:scroll;overflow-x:hidden;overflow-y:scroll;">
	<header class="popupHeader">
			<span class="header_title">Login</span>
			<span class="modal_close"><i class="fa fa-times"></i></span>
		</header>
		
		<section class="popupBody">
			<!-- Social Login -->
			<div class="social_login">
				</br></br></br></br></br>
				<div class="action_btns">
					<div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
					<div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
				</div>
			</div>

			<!-- Username & Password Login form -->
			<div class="user_login">
				<form action='index.php' method='POST'>
					<label>Username</label>
					<input type='text' name='username' id="username" placeholder='Username ...'class="form-control" onclick='value=""'required/><p />

					<br />

					<label>Password</label>
					<input type='password' name='password'  id="password"placeholder='Password ...'class="form-control" onclick='value=""'required/><p />

					<br />

					<div class="checkbox">
						<input id="remember" type="checkbox" />
						<label for="remember">Remember me on this computer</label>
					</div>

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><input type='submit' name='submit' class="btn-warning" value='Login &rarr;'style="font-family:'Courier New', Courier, monospace; width:100px;height:40px;font-weight:bold;"  /> </a></div>
					</div>
				</form>

				<a href="#" class="forgot_password">Forgot password?</a>
			</div>

			<!-- Register Form -->
			<div class="user_register">
			
			
				<form action='index.php' method='POST' >
				    <input type='radio' name='role'  class="form-control" onClick="toggleSelect('student');" checked='1' value="Student"/>Student 
					<input type='radio' name='role'  class="form-control" onClick="toggleSelect('teacher');" value="Teacher" />Teacher </p>
					<input type='text' name='firstname' placeholder='Firstname ...'class="form-control" onclick='value=""'required/></p>					
					<input type='text' name='lastname'  placeholder='Lastname ...'class="form-control" onclick='value=""'required/></p>										
					<input type='text' name="username" id="username"  placeholder='Registration number'class="form-control" onclick='value=""'required/><span id="statuspass"></span></p>
					<input type="email" placeholder="Email..." name="email" id="email"class="form-control" required><span id="status"></span></p>
					<input type="password"class="form-control" placeholder="New Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required oninvalid="setCustomValidity('Password must contain at least 6 characters, including UPPER/lowercase and numbers')" onChange="try{setCustomValidity('')}catch(e){}"></p>
					<input id="pass2" type="password" name="passwordrepeat"  placeholder='Repeat Password ...' class="form-control"onclick='value=""' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required oninvalid="setCustomValidity('Password must contain at least 6 characters, including UPPER/lowercase and numbers')" onChange="try{setCustomValidity('')}catch(e){}"/><br>
					
					
					</p>
					 <select name="department">
                     <option value="IT">IT</option>
                     <option value="CSE">CSE</option>
                     <option value="EXTC">EXTC</option>
                     <option value="INST">INST</option>
                     </select>

                    </p>					 
					<select id='student' name="year">
					 <option value=" ">           </option>            
                     <option value="1">First Year</option>
                     <option value="2">Second Year</option>
                     <option value="3">Third Year</option>
                     <option value="4">Final Year</option>
                     </select><br />

					<div class="action_btns">
						<div class="one_half"><a href="#" class="btn back_btn"><i class="fa fa-angle-double-left"></i> Back</a></div>
						<div class="one_half last"><input type='submit' name='register' class="btn-warning" value='SignUp &rarr;'style="font-family:'Courier New', Courier, monospace; width:100px;height:40px;font-weight:bold;"  /> </a></div>
				
					</div>
				</form>
			</div>
		</section>
	</div>
	</div>
</div>
<script type="text/javascript">


window.onload = function() {
 var myInput = document.getElementById('pass2');
 myInput.onpaste = function(e) {
   e.preventDefault();
 }
}

function toggleSelect(id)
{
    if (id == 'student')
    {
          
          document.getElementById('student').style['display'] = 'block';
		  document.getElementById('teacher').style['display'] = 'none';
    }

    if (id == 'teacher')
    {
          document.getElementById('student').style['display'] = 'none';
		  document.getElementById('teacher').style['display'] = 'block';
    }
}
</script>
<script type="text/javascript">
	$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

	$(function(){
		// Calling Login Form
		$("#login_form").click(function(){
			$(".social_login").hide();
			$(".user_login").show();
			return false;
		});

		// Calling Register Form
		$("#register_form").click(function(){
			$(".social_login").hide();
			$(".user_register").show();
			$(".header_title").text('Register');
			return false;
		});

		// Going back to Social Forms
		$(".back_btn").click(function(){
			$(".user_login").hide();
			$(".user_register").hide();
			$(".social_login").show();
			$(".header_title").text('Login');
			return false;
		});

	})
</script>
</body>
</html>