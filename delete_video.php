<?php
include ( 'includes/header1.php' );
$videoid = $_GET['videoid'];

//mysql_query("UPDATE videos SET deleted='yes' WHERE video_id='$videoid'") or die(mysql_error());
mysql_query("DELETE from videos WHERE video_id='$videoid'") or die(mysql_error());
header("Location: my_videos.php");
?>