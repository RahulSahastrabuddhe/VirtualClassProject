<?php
include ( 'includes/header1.php' );
?>
<?php 
$getvideos = mysql_query("SELECT * FROM videos WHERE uploaded_by='$user' ");
$numrows = mysql_num_rows($getvideos);
if ($numrows == 0) {
	die("You haven't uploaded a video yet.");
}
?>
	<center><h2><?php echo'You have altogether &nbsp;' .$numrows;?><? print'Videos';?></h2></center>

<br /><br /><br />

		 <?php if (!isset($_SESSION['username'])){?>
    <?php  echo"Login to view your videos";}
	else{
	?>
	
<?php
$getvideos = mysql_query("SELECT * FROM videos WHERE uploaded_by='$user'");
$numrows = mysql_num_rows($getvideos);
if ($numrows == 0) {
	die("You haven't uploaded a video yet.");
}


else {
	while($row = mysql_fetch_assoc($getvideos)) {
		$title = $row['video_title'];
		$desc = $row['video_description'];
		$keywords = $row['video_keywords'];
		$uploaded_by = $row['uploaded_by'];
		$privacy = $row['privacy'];
		$date_uploaded = $row['date_uploaded'];
		$thumbnail = $row['thumbnail'];
		$video_id = $row['video_id'];
		$deleted = $row['deleted'];
		//if ($deleted == "no") {
		?>
		<div class="main_wrapper">

	<strong style="font-family:'Courier New', Courier, monospace;">Title:	<?php  echo $title; ?></strong>

		<div class="myvideosdiv">
			<div style="float: left;">
				<img src="data/users/videos/thumbnails/<?php echo $thumbnail; ?>" width="150" height="80"/>
			</div>
			<br><br><br>
			<div class="myvideosdiv_desc"></div><br />
			<div><a href="edit_video.php?videoid=<?php echo $video_id; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span>Edit Video</button></a></a> | <a href="upload_thumbnail.php?videoid=<?php echo $video_id; ?>"><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-zoom-in"></span>Edit Thumbnail</button></a></a> | <a href="delete_video.php?videoid=<?php echo $video_id; ?>"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle">Delete Video</span></button></a></div>
			<div class="myvideosdiv_tags"><strong style="font-family:'Courier New', Courier, monospace;">Tags:</strong> <?php echo $keywords; ?></div><strong style="font-family:'Courier New', Courier, monospace;">Description:<?php echo $desc; ?></strong><hr>
		</div>
		<?php
	//}
	//else {
	//	echo "";
	//}

	}
}
}
?>

</div>


<style>
.main_wrapper
{
	width:800px;
	margin: 0 auto;
	border: solid 1px #cbcbcb;
	 background-color: #FFF;
	 box-shadow: 0 0 15px #cbcbcb;
	-moz-box-shadow: 0 0 15px #cbcbcb;
	-webkit-box-shadow: 0 0 15px #cbcbcb;
	-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;
	font-family:Verdana, Geneva, sans-serif;
	font-size:15px;
	color: #222;
}


p {
	margin: 0 0 2em;
}
h1 {
	margin: 0;
}
a {
	color: #339;
	text-decoration: none;
}
a:hover {



</style>