<?php
error_reporting(0);
mysql_connect("localhost","root","");
mysql_select_db("mars");


$videoid=$_GET['videoid'];
$username=$_GET['user'];
$title=$_GET['t'];
$thumbnail=$_GET['pic'];





$sql=mysql_query("INSERT INTO  watch(id,user,videoid,title,thumbnail,watched)values('id','$username','$videoid','$title','$thumbnail ','No')");    

if($sql){
echo"Added to watch later";
}else{
echo"Error";
}

?>
