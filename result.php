<?php
include ( 'includes/header1.php' );
?>
 <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<div class="main_wrapper">

<?php

$conn = mysql_connect("localhost", "root", "");
mysql_select_db("mars", $conn);
//search code



error_reporting(0);
if($_REQUEST['submit']){
$name = $_GET['name'];

if(empty($name)){
$make = '<h4>You must type a word to search!</h4>';
}else{
$make = '<h4>No match found!</h4>';
$sele = "SELECT * FROM videos WHERE video_title LIKE '%$name%' OR video_keywords LIKE '%$name%'OR uploaded_by LIKE '%$name%'";
$result = mysql_query($sele);
$count=mysql_num_rows($result);
if($mak = mysql_num_rows($result) > 0)
{
while($row = mysql_fetch_assoc($result)){
		$video_id = $row['video_id'];
		$thumbnail = $row['thumbnail'];
		$views = $row['views'];
         $uploaded_by = $row['uploaded_by'];
          $video_keywords = $row['video_keywords'];

						


		?>

		<div id="display" style=" margin-top:100px; margin-left:100px;"><?php /*?>
<a title="<?php echo $video_title;?>"href="watch.php?videoid=<?php echo $video_id;?>"><img src="data/users/videos/thumbnails/<?php echo $thumbnail; ?> " style=" width:220px; height:110px; border:3px solid #CC6600;";   /><br /></a><?php */?>

        <li>  <a title="<?php echo $video_title; ?>"href="watch.php?videoid=<?php echo $video_id;?>&tags=<?php echo $video_keywords; ?>&r=<?php echo $uploaded_by ; ?>"><img src="data/users/videos/thumbnails/<?php echo    $thumbnail;?>   " style="width:80px; "     /></a>


<?php 
		echo '<br> Title 						: '.$row['video_title'];
		echo '<br>Uploaded By 					: '.$row['uploaded_by'];
		echo'</a>';
		echo '<h4 > Views 						: '.$row['views'];
		echo '<h4 style="width:300px;"> Description						: '.$row['video_description'];

		echo '</h4>';
		?>
		
		<hr /></div>

<?php

	}
}else
{
echo'<h2> Search Result</h2>';

print ($make);
}
mysql_free_result($result);
mysql_close($conn);

		?><div id="show" style="float:left; margin-left:100px; margin-top:0px;"><strong><?php echo $count.'&nbsp;&nbsp;<i>Results Found...</i>';?></strong> </div><br />
<? 
}
}

?>



</div>
<style>
.main_wrapper
{
	width:600px;
	margin: 0 auto;
	border: solid 1px #cbcbcb;
	 background-color: #fff;
	 box-shadow: 0 0 15px #cbcbcb;
	-moz-box-shadow: 0 0 15px #cbcbcb;
	-webkit-box-shadow: 0 0 15px #cbcbcb;
	-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;
	padding:10px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:15px;
	color: #222;
}



</style>