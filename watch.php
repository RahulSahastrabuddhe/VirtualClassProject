<?php ob_start(); 
error_reporting(0);
?>
<html>
 <head>
 <link href="http://vjs.zencdn.net/4.0/video-js.css" rel="stylesheet">
 <script src="http://vjs.zencdn.net/4.0/video.js"></script>
 <link href="bootstrap/videojs/video-js.css" rel="stylesheet">
 <script src="bootstrap/videojs/video.js"></script>
 <style>
video {
    
    
     /* and all the browser variants of this */
}
.style1 {
	color: #000000;
	font-weight: bold;
}
 </style>


 </head>
<body>
<?php
include('includes/functions.php');
include ( 'includes/header1.php' );
$videoid = $_GET['videoid'];
$check = mysql_query("SELECT * FROM videos WHERE video_id='$videoid'");
if (mysql_num_rows($check) == 1) {
while($row = mysql_fetch_assoc($check)) {  // This data is only specific to the video itself
           $id = $row['id'];
           $video_title = $row['video_title'];
           $video_description = $row['video_description'];
           $video_keywords = $row['video_keywords'];
           $uploaded_by = $row['uploaded_by'];
           $privacy = $row['privacy'];
           $date_uploaded = $row['date_uploaded'];
           $views = $row['views'];
		   //$profile_pic=$row['profile_pic'];
           $video_id = $row['video_id'];
           $videosrc = $row['file_location'];
           $newviews = $views + 1;
           $updateviews = mysql_query("UPDATE videos SET views='$newviews' WHERE video_id='$videoid'") or die(mysql_error());
		   $update= mysql_query("UPDATE watch SET watched='YES' WHERE videoid='$videoid '") or die(mysql_error());

}
?>
<h1  style="float: left; margin-left:40px; margin-top:-50px; groove #666;" > <?php echo $video_title; ?></h1><br><br><br>
<div  style="float: left; margin-left:40px; margin-top:-50px; border:1px  groove #666;">
<video id="example _video_1"  class="video-js vjs-default-skin"  controls preload="auto" width="750" height="325" autoplay="true" data-setup='{"example_option":true}'>

 <!--   controls preload="auto" width="940" height="415"  autoplay="true" -->
  <!-- poster="http://video-js.zencoder.com/oceans-clip.png"-->
<source src="0.flv" type='video/x-flv' />
<source  src="<?php echo $videosrc; ?>" data-hd type="video/mp4"   >
Your browser doesn't support the HTML5 video tag.
<source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
<source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
<source src="http://video-js.zencoder.com/oceans-clip.mp4" type='video/mp4' />
<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
</video>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js "></script>
<div class="ticker">	
	<p style="background: #222; color:#FFFFFF; text-align:center; font-family:'Courier New', Courier, monospace;">
	<?php 
	$ranjit_karki_now = $_GET['r'];
    echo $ranjit_karki_now.'  videos';
	?>
   </p>	
<?php
$videoid = $_GET['videoid'];
$check = mysql_query("SELECT * FROM videos WHERE  video_id!='$videoid' And uploaded_by='$ranjit_karki_now ' ");
if (mysql_num_rows($check) < 2) {
echo"No more videos";
}else{
while($row = mysql_fetch_assoc($check)) {  // This data is only specific to the video itself
           $id = $row['id'];
           $video_title = $row['video_title'];
           $video_description = $row['video_description'];
           $video_keywords = $row['video_keywords'];
           $uploaded_by = $row['uploaded_by'];
           $privacy = $row['privacy'];
           $date_uploaded = $row['date_uploaded'];
           $views = $row['views'];
		   $thumbnail = $row['thumbnail'];
           $video_id = $row['video_id'];
           $videosrc = $row['file_location'];
        //   $newviews = $views + 1;
          // $updateviews = mysql_query("UPDATE videos SET views='$newviews' WHERE video_id='$videoid'") or die(mysql_error());
   ?>
    <ul id="ticker">
        <li>
          <div align="justify"><a title="<?php echo $video_title;?>"href="watch.php?videoid=<?php echo $video_id;?>&tags=<?php echo $video_keywords;?>&r=<?php echo $uploaded_by;?>"><img src="data/users/videos/thumbnails/video.png<?php echo $thumbnail;?>" style="width:80px; "/></a></div>
        </li>
    </ul>
<?php
 }
}
?>
</div>
<style>
.ticker {
    width: 200px;
	height: 275px;
	overflow: scroll;
	border: 1px solid #DDD;
	border-radius: 5px;
	box-shadow: 0px 0px 5px #DDD;
	background-color:  #F5F3E5;
	text-align: left;
	
}

.ticker h3 {
	padding: 0 0 10px 10px;
	border-bottom: 0px solid #A7A7A7;
}

ul {
    list-style: none;
    padding: 0;
    margin: 0;
 
}

ul li {
    list-style: none;
    height:50px;
    padding:7px;
    border-bottom: 0px solid #D6CFB8;
}
</style>

<script>
function ticker() {
    $('#ticker li:first').slideUp(function() {
        $(this).appendTo($('#ticker')).slideDown();
    });
}

setInterval(function(){ ticker(); }, 3000);
</script>
 
<?php

/* Check if already liked / disliked */
$check_l = mysql_query("SELECT * FROM ratings WHERE videoid='$videoid' AND username='$user'");
if (mysql_num_rows($check_l) != 0) {
  while($rating = mysql_fetch_assoc($check_l)) {
    $videoid_l = $rating['videoid'];
    $type = $rating['type'];
    $user_l = $rating['username'];

    $d = "";
    $d2 = "";
    
    if ($type == 'like') {
	//echo $type;
      $d = 'disabled';
    }
    else {
      $d2 = 'disabled';
    }

    /* Add ratings code */
//$ranjit_karki_now= $_GET['r'];

if (isset($_POST['like'])) {
  mysql_query("UPDATE ratings SET type='like' WHERE videoid='$videoid' AND username='$user'");
  header("Location: watch.php?videoid=$videoid");
}
if (isset($_POST['dislike'])) {
  mysql_query("UPDATE ratings SET type='dislike' WHERE videoid='$videoid' AND username='$user'  ");
  header("Location: watch.php?videoid=$videoid");
}

  }
}
else {
  $d = "";
  $d2 = "";
  /* Add ratings code */

if (isset($_POST['like'])) {
  mysql_query("INSERT INTO ratings VALUES ('','$videoid','like','$user')");
  header("Location: watch.php?videoid=$videoid");
}
if (isset($_POST['dislike'])) {
  mysql_query("INSERT INTO ratings VALUES ('','$videoid','dislike','$user')");
  header("Location: watch.php?videoid=$videoid");
}
}


/*calcuate completes here*/

/* Comment Post Code */
           if (isset($_POST['post_comment'])) {
           $comment_text = trim(htmlentities(strip_tags(mysql_real_escape_string($_POST['write_comment']))));
           $date_commented = date("d F Y");
           mysql_query("INSERT INTO comments VALUES ('','$user','$comment_text','$date_commented','$videoid')");
           }
           
          /* Calculate Likes */
           $total_width = 180;
           $green = 0;
           $red = 0;
           $get_likes = mysql_query("SELECT * FROM ratings WHERE videoid='$videoid' AND type='like'");
           $num_of_likes = mysql_num_rows($get_likes);

           $get_dislikes = mysql_query("SELECT * FROM ratings WHERE videoid='$videoid' AND type='dislike'");
           $num_of_dislikes = mysql_num_rows($get_dislikes);

           $total_num_db = $num_of_likes + $num_of_dislikes;

           if ($total_num_db == 0) {
            echo '';
           }
           else {

           $total_num = $num_of_likes + $num_of_dislikes;

           $width_of_one = $total_width / $total_num;
           $green  = $width_of_one * $num_of_likes;
           $red = $width_of_one * $num_of_dislikes;
         }

?><br /><br /><br />

<?php 
$totalcomment = mysql_query( "SELECT * FROM comments WHERE video_id='$videoid'" );
  $count=mysql_num_rows($totalcomment);
?>
<div style="float: left;width: 100%;margin: 10px 5px 10px 5px;">
           <div style="float: left; height: 5px; width: 275px;">
             <p>&nbsp;</p>
             <p align="center">&nbsp;</p>
             <div style="float: right; width: 50%; ">
              <div style="margin-top: -130px;">
                <?php  
			  $get_profile_pic = mysql_query("SELECT profile_pic FROM users WHERE username='$uploaded_by '");
              $numrows_profile_pic = mysql_num_rows($get_profile_pic);
             if ($numrows_profile_pic == 1) {
             while ($row = mysql_fetch_assoc($get_profile_pic)) {
           $profile_pic = $row['profile_pic']; 
 
            if ($profile_pic == '') {
            echo "<img src='./data/users/images/icons/avatar.png' height='120'>";
     		  
			  
			  
		}else{?>
                <?php  echo "<img src='profile_picture/$profile_pic' width='100' height='100'  style=' margin-top:-20px; float:left;  border:3px solid #FFCC00 '>";
		}}}
  ?>
                <span class="style1">Uploader:</span>&nbsp;  <a href="profile.php?u=<?php echo  $uploaded_by;?>"><?php  echo ''.$uploaded_by; ?></a>
		
		
		<br />
		
		
		
		
		<?php 
$totalcomment1 = mysql_query( "SELECT * FROM videos WHERE uploaded_by='". $video_id."'" );
  $count1=mysql_num_rows($totalcomment1);
            // $uploaded_by = $row['uploaded_by'];

 // echo $count1;
  
?>
		   
		
	<font color="#fff" style="float:right; margin-right:-300px; margin-top:5px; ">	&nbsp;&nbsp;views:<?php echo $views; ?><br />Comments:<?php echo $count;?></font>
	

		   <br />
		   
		   
<style type="text/css">
</style>
<script>
function CustomAlert(){
	this.render = function(dialog){
		var winW = window.innerWidth;
	    var winH = window.innerHeight;
		var dialogoverlay = document.getElementById('dialogoverlay');
	    var dialogbox = document.getElementById('dialogbox');
		dialogoverlay.style.display = "block";
	    dialogoverlay.style.height = winH+"px";
		dialogbox.style.left = (winW/2) - (550 * .5)+"px";
	    dialogbox.style.top = "100px";
	    dialogbox.style.display = "block";
		document.getElementById('dialogboxhead').innerHTML = "Alert!!!";
	    document.getElementById('dialogboxbody').innerHTML = dialog;
		document.getElementById('dialogboxfoot').innerHTML = '<button class="black" onclick="Alert.ok()">OK</button>';
	}
	this.ok = function(){
		document.getElementById('dialogbox').style.display = "none";
		document.getElementById('dialogoverlay').style.display = "none";
	}
}
var Alert = new CustomAlert();
</script>
</head>
<body>
<div id="dialogoverlay"></div>
<div id="dialogbox">
  <div>
    <div id="dialogboxhead"></div>
    <div id="dialogboxbody"></div>
    <div id="dialogboxfoot"></div>
  </div>
</div>
		   
		   
		   
		   

              <form action='watch.php?videoid=<?php echo $videoid; ?>' method='POST'>
                <?php if (isset($_SESSION['username'])){?>
                <input type='submit' name='like' class="black" value='Like' <?php echo $d; ?>>
                <input type='submit' name='dislike' class="black"value='Dislike' style="margin-top:0px; margin-right:-70px; float:right;" <?php echo $d2; ?>>
              </form>
			<?php }else{?> <font  color="#CCC"> 
			<?php
     echo"";
	 ?>
	 
	 
	<input  type="button" name='like' class="black" value='Like' onClick="Alert.render('Login to like this video...!')">
<!--
	 <input  type="button" name='like' class="black" value='Like'onClick="alert('Login To Like This Video')"?>-->	
	 <input  type="button" name='like' class="black" value='DisLike' onClick="Alert.render('Login to Dislike this video...!')" style="margin-top:0px;     margin-right:-70px; float:right;"  /> 

	<?php  }
      ?>
	  <br /><br />
	  </font><font  color="#CCC">
	  <div id="panel" style=" color:#FFFFFF;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Share this video...!</div>
	  </font>            </div>
            </div>
		
			
			
           <div style="float: right; width: <?php echo $total_width; ?>;">
           <div style="float: right; margin-right:-600px; width: <?php echo $red; ?>px; height: 3px; background-color:#FF0000; "></div>
           <div style="float: right; margin-right:-600px; width: <?php echo $green; ?>px; height: 3px; background-color: #0066FF;"></div>
           </div>
  </div>
		  
		   <br />
<div id="likedislike" style="float:right; margin-right:570px;  ">

<?php 
$likeDislike = mysql_query("SELECT * FROM ratings WHERE videoid='$videoid' And type='like'");
$count=mysql_num_rows($likeDislike);
print'<img src="data\users\images\icons/likes.png">:&nbsp;<font color="#fff">';echo $count;print'</font>&nbsp;';
$likeDislike1 = mysql_query("SELECT * FROM ratings WHERE videoid='$videoid' And type='dislike'");
$count1=mysql_num_rows($likeDislike1);
print'<img src="data\users\images\icons\dislikes.png">:&nbsp;<font color="#fff">';echo $count1; print'</font>';
?>

</div>




<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideDown("slow");
  });
});
</script>
 
<style> 
#panel,#flip
{
padding:0px;
text-align:center;
/*background-color:#e5eecc;
border:solid 1px #c3c3c3;*/

float:right;
margin-right:-200px;
}
#panel
{
padding:50px;
display:none;
float:right;


}

</style>

<!-- 
<div id="flip">Click to slide down panel</div>
<div id="panel">Display video description Here!</div>

-->

		  <!--THAT USER ALL VIDEOS-->  <br>
		  <br>
		  <br>
		  <?php
		   $tag = $_GET['tags'];
		   $videoid = $_GET['videoid'];
$check = mysql_query("SELECT * FROM videos WHERE video_id!='$videoid'AND video_keywords='$tag'    ");
if (mysql_num_rows($check) ==0) {
echo"<font color='#ccc''></font>";}
else{
while($row = mysql_fetch_assoc($check)) {  // This data is only specific to the video itself
  	    $id = $row['id'];
		$video_title = $row['video_title'];
		$video_description = $row['video_description'];
		$video_keywords = $row['video_keywords'];
		$uploaded_by = $row['uploaded_by'];
		$privacy = $row['privacy'];
		$views = $row['views'];
		$video_id = $row['video_id'];
		$thumbnail = $row['thumbnail'];
        
		 ?>
		  <div id="recomends" style="float:left; margin-left:40px; margin-top:80px; ;"><font color="#669900" style=" border:3px solid #FF00CC; <br><font color="#CC6600"><?php  echo substr( $video_title,0,17);?><?php echo".." ?></font><br>
     <a  title="<?php  echo $video_title; ?>"href="watch.php?videoid=<?php echo $video_id;?>&tags=<?php echo $video_keywords; ?>"><img src="data/users/videos/thumbnails/video.png<?php echo    $thumbnail;?> "  width="150" height="100" style="float:left; border:3px solid #999933; margin-right:-810PX;   /><font size="-1" style="margin-top:1000px; "><?php // echo $video_title;?></font>
	 </a>
	</div>
 
<?php 


 }}?>		  
		  

		   
           <div style="float: left; margin-left:150px; width: 100%; margin-top:150px;">		   
           <form action="watch.php?videoid=<?php echo $videoid; ?>" method="POST" name="form1">
		     <?php if (isset($_SESSION['username'])){?>
           <textarea name="write_comment"maxLength="200" rows="3" cols="50"required style="float: left; margin-left:-100px;"></textarea>
           <input type="submit" name="post_comment" value="Post Comment" class="black"  style="height: 67px; background:#222; color:#FFFFFF; float: left;">
           </form>
		   			  <?php }else{
					  ?>	 <font color="#993399"><?php 
//echo"Login To Comment";
}
?></font>
           </div>

 
		   

<?php


// This is the section of the watch page that isn't specific to the video

$select_comment = mysql_query( "SELECT * FROM comments WHERE video_id='$videoid' ORDER BY id DESC" );
if (mysql_num_rows($select_comment) != 0) {
 //The video has some comments
 while($r = mysql_fetch_assoc($select_comment)) {
           $id = $r['id'];
           $user_commented = $r['user_commented'];
           $comment = $r['comment'];
           $date_posted = $r['date_posted'];
		 
           ?>

           <div style="float: left;">
           <form action="watch.php?videoid=<?php echo $videoid; ?>" method="POST">

           </form>
           </div><br/><br /><br /><br />&nbsp;&nbsp;&nbsp;
           <div style="float:left; margin-left:0px; border: 1px  #0000;background-color:#222 ;min-height:100px; width:600px;">
<?php  
$select_pic = mysql_query( "SELECT * FROM users WHERE username='$user_commented'" );

             while ($row = mysql_fetch_assoc($select_pic)) {
             $profile_pic = $row['profile_pic']; 
 
            if ($profile_pic == '') {
           // echo "<img src='./data/users/images/icons/avatar.png' height='120'>";
     		 


echo'<img  src="images/1.gif" />';}else{?>
<?php  echo "<img src='profile_picture/$profile_pic' width='100' height='100'style='border:3px solid #FFCC00; ' >";
		}}
  ?>

&nbsp;&nbsp;<?php  echo "<font color='#fff'>On ".$date_posted;
 echo " <a href='#'>".$user_commented.'</a> said: <br />';
echo'<font>';
?>
<div id="nameDate_show" style=" background:; overflow: hidden;">
 <?php
 echo'<font color="#f2f2f2" style="width:400px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';echo $comment;
echo'</font>';
 ?>
 </div><br />
 </div>
 <br /><br />
<!--  <hr width="98%" style="height: 1px; border: none; border-top: 1px solid #CCCCCC"/>
--></div>
           <?php
}

} else {
 // The video has no comments

}
?>

<?php
}
else {
 header("Location: join.php");
}
?>
<!--Right side videos-->
<div id="right" style="float:right; margin-top:50px; margin-right:50px;">
<?php
//$tags=$_GET['tags'];
	//$ranjit_karki_now = $_GET['r'];
 $get_videos = mysql_query("SELECT * FROM videos ORDER by rand() limit 20");
if (mysql_num_rows($get_videos) == 0) {
	echo "There are no videos yet!";
}
else {
	while ($row = mysql_fetch_assoc($get_videos)) {
		$id = $row['id'];
		$video_title = $row['video_title'];
		$video_description = $row['video_description'];
		$video_keywords = $row['video_keywords'];
		$uploaded_by = $row['uploaded_by'];
		$privacy = $row['privacy'];
		$views = $row['views'];
		$video_id = $row['video_id'];
		$thumbnail = $row['thumbnail'];
		$deleted = $row['deleted'];
		$titPLUSviews='Title='.'&nbsp;'.$video_title.'&nbsp;'. 'And views='.$views;
		?>
		
		
			<div id="right1" style="float:right; color:#CC9900; text-align:center; margin-top:-1121px; margin-right:0px; ">

<?php  echo substr( $video_title,0,19);?><?php  echo ".."?><br><font color="#fff" size="-1">views:<?php  echo $views;?></font></div><a href="watch.php?videoid=<?php echo $video_id; ?> &tags=<?php echo $video_keywords; ?>&r=<?php echo $uploaded_by ; ?>"></font><img src="data/users/videos/thumbnails/video.png<?php echo $thumbnail;  ?>" width="150" height="80"  title="<?php echo $titPLUSviews;  ?>" <?php  //echo $video_title;  ?>style="float:right; margin-right:5px; margin-top:-1200px; border:3px solid #222; "><br><span style=" margin-top:-50px;"><?php // echo $video_title;  ?></span><BR /><br /><br /><br /><br /></a>

	
	
		
		

		<?php
	
	}
}

?>
 </li>

</div>


<style>
.black {
	color: #d7d7d7;
	border: solid 1px #333;
	background: #333;
	background: -webkit-gradient(linear, left top, left bottom, from(#666), to(#000));
	background: -moz-linear-gradient(top,  #666,  #000);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#666666', endColorstr='#000000');
	width:100px;
	height:30px;
	
	
	}
.black:hover {
	background: #000;
	background: -webkit-gradient(linear, left top, left bottom, from(#444), to(#000));
	background: -moz-linear-gradient(top,  #444,  #000);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#444444', endColorstr='#000000');
}
body
{
background:#F56D41;
}
.black:active {
	color: #666;
	background: -webkit-gradient(linear, left top, left bottom, from(#000), to(#444));
	background: -moz-linear-gradient(top,  #000,  #444);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#000000', endColorstr='#666666');
}


#dialogoverlay{
	display: none;
	opacity: .8;
	position: fixed;
	top: 0px;
	left: 0px;
	background: #222;
	width: 100%;
	z-index: 10;
}
#dialogbox{
	display: none;
	position: fixed;
	background: #fff;
*/	margin-top:150px;
	margin-left:-90px; 
	width:550px;
	z-index: 10;
}
#dialogbox > div{ background:#FFF; margin:8px; }
#dialogbox > div > #dialogboxhead{ background: #666; font-size:19px; padding:10px; color:#CCC; }
#dialogbox > div > #dialogboxbody{ background:#333; padding:20px; color:#FFF; }
#dialogbox > div > #dialogboxfoot{ background: #666; padding:10px; text-align:right; }

</style>

