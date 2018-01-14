<?php
mysql_connect("localhost","root","");
mysql_select_db("mars");
include ( 'includes/header1.php' );

 $user = $_SESSION['username'];
$get_videos = mysql_query("SELECT * FROM watch where user='$user'AND watched='No'");
if (mysql_num_rows($get_videos) == 0) {
	echo "You  have no videos to watch later!";
}
else {
	while ($row = mysql_fetch_assoc($get_videos)) {
		$id = $row['id'];
		$video_title = $row['title'];
		$video_id = $row['videoid'];
		//$thumbnail = $row['thumbnail'];
	  // $video_description = $row['video_description'];
		//$video_keywords = $row['video_keywords'];
		//$uploaded_by = $row['uploaded_by'];

		 ?>
   			  <a href="watch.php?videoid=<?php  echo $video_id;?>">click to watch</a><?php echo $video_title ; ?>
		

      <?php 
	  
		echo'<br>';
		}
		}
		?>