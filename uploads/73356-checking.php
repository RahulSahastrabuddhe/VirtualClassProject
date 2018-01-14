<?php

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("videobox", $conn);


if(isSet($_POST['email']))

{

$email = $_POST['email'];



$sql_check = mysql_query("select id from users where email='".$email."'") or die(mysql_error());



if(mysql_num_rows($sql_check))

{

echo '<font color="red" style="margin-left:105px;"><STRONG>'.$email.'</STRONG> is not available.</font>';

}

else

{

echo 'OK';

}



}



?>

<?php

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("videobox", $conn);


if(isSet($_POST['username']))

{

$username= $_POST['username'];



$sql_check = mysql_query("select id from users where username='".$username ."'") or die(mysql_error());



if(mysql_num_rows($sql_check))

{

echo '<font color="red" style="margin-left:105px;"><STRONG>'.$username .'</STRONG> is not available.</font>';

}

else

{

echo 'OK';

}



}



?>