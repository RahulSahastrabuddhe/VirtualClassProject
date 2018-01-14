<?php
include ( 'includes/header1.php' );
if(isset($_POST['btn']))
{    
$user=$_SESSION['username'];
$name =$_POST['name'];
$message =$_POST['message'];
$sql="INSERT INTO contact(name,message,sender) VALUES('$name','$message','$user')";
		mysql_query($sql);
}
?>
<html>
<body>
<center>
<br><br>
<form action="contact.php" method="post" enctype="multipart/form-data">
  Contact me:<br>
  <select name="name">
  <option>Rahul</option>
  <option>Arjun</option>
  <option>Maruf</option>
  <option>Supriya</option>
  <br><br>
  &nbsp;
  <label>
  Message:<br>
  <input type="text" name="message" >
  </label>
  <br><br>
  <button class="button" type="submit" name="btn">Submit</button>

</form> 
</center>

</body>
</html>
<br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

<br><br>
<br><br>
<br><br>
<br>
<?php
include ( 'includes/footer1.php' );
?>