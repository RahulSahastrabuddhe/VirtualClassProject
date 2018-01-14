<?php
include ( 'includes/header1.php' );
?>
<?php

if(isset($_POST['btn-view']))
{    
	$subject=$_POST['subject'];
}
?>


<html>
<head>
  <meta charset="utf-8" />
  <title>jQuery UI Auto Suggesstion Demo</title>
  <!-- we need jquery library and jquery ui library and jquery css to run this sciprt-->
  <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>-->
  <link href="bootstrap/autosuggest/jquery-ui.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/latest_videos.css" />   
	
  <script src="bootstrap/autosuggest/jquery-1.9.1.js"></script>
  <script src="bootstrap/autosuggest/jquery-ui.js"></script>
  <script>
	$(document).ready(function(){
		$( "#suggestionbox" ).autocomplete({
			source: "suggetsSearch.php"
		});
	})
  </script>
</head>
<body>
    
    <div align="left">
		<blockquote>
			<p align="left">
			<br>
			<br>
			<br>  
				  
			
				  
				  
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php 
				if (isset($_SESSION['username']))
				{
					echo' <font color="#fff">'; echo"&nbsp;&nbsp;&nbsp;</font><a class='button10'href='upload.php' style='float:right;margin-top:10px;text-align:center;'>Upload video<a>";
				}
				else
				{ 
					echo"";
				}
				?>
				<?php
				if (isset($_SESSION['username']))
				{
					echo' <font color="#fff">'; echo "";echo"&nbsp;&nbsp;&nbsp;</font><a title='Videos in watch later' href='playlist.php'><img src='images/watch.png'> <a>";
				}
				?>
				<?php
				if (isset($_SESSION['username']))
				{
					echo' <font color="#fff">'; echo"&nbsp;&nbsp;&nbsp;</font><a class='button10'href='my_videos.php' style='float:left;margin-top:10px;text-align:center;'>My Videos<a>";
				}
				?>
				
				<?php
				if (isset($_SESSION['username']))
				{	
				?>
<html>
<body>

		<form action="latest_videos.php" method="post" >

<select name="subject">   

<option value="" disabled selected>Select subject</option>                       
<option></option>
	<?php
        $result=mysql_query("SELECT distinct subject FROM videos")
        or die("There are no records to display ... \n" . mysql_error()); 
        if (mysql_num_rows($result)<1){
        $result = null;
        }
        while($row=mysql_fetch_array($result)){
        echo "<option>".$row['subject']."</option>";
        }
        echo "</select>";
		
    ?>
    </select>

<button type="submit" name="btn-view">Submit</button>
	</form>

	

</body>
</html>
				
				<?php	
				}
				?>
				
			</p>
		</blockquote>
		<br>
		<br>
	</div>

</body>
</html>

<br /><br /><br />

<?php

    if(!isset($_POST['btn-view'])){
	$get_videos = mysql_query("SELECT * FROM videos ORDER by date_uploaded DESC");
	}
	else{$get_videos = mysql_query("SELECT * FROM videos where subject='$subject' ORDER by date_uploaded DESC");}
	if (mysql_num_rows($get_videos) == 0) 
	{
		echo "There are no videos yet!";
	}
	else
	{
		
		while ($row = mysql_fetch_assoc($get_videos)) 
		{
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
?>
		
<html>
<body>
	<div id="video" >
		<div class="myvideosdiv" style="max-height: 90px; float:left; margin-left:-5px;">
			<li class="image big">
			<a title="<?php echo $video_title; ?>"href="watch.php?videoid=<?php echo $video_id;?>&tags=<?php echo $video_keywords; ?>&r=<?php echo $uploaded_by ; ?>""><img src="data/users/videos/thumbnails/<?php echo    $thumbnail;?> "  style="float:right;   /></a> 
			
			<div class="myvideosdiv_desc"></div><br />
			<font color="#fff" style="font-family:"Verdana, Arial, Helvetica, sans-serif;"> <li style="background:#000">&nbsp;&nbsp;<font  color="#fff"style="background:"><strong>Video Views:&nbsp;&nbsp;</strong></font><strong   style="background:#990066;  padding-top:1px;  padding-right:4px;"> <?php echo $views; ?><br /></li></strong><br /><font color="#003399"><strong style="color:#222"><?php if (isset($_SESSION['username'])){?> <a title="ADD TO WATCH LATER" href="watch_later.php?videoid=<?php echo $video_id; ?> &user=<?php echo $_SESSION['username'] ;?>&t=<?php echo $video_title; ?>&pic=<?php $thumbnail;?>"><img src="images/watch1.png"></a><?php }?><?php  echo substr( $video_title,0,19);?><br /><?php  echo substr( $video_title,19,20);?></strong></font>
		</div>
	<?php
	
		}
	}
	
	
	?>

</div>
</hr><br><br><br>
<center>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<a  href="view_more.php" class="button4"  style="float: left;margin-left:600px;">More Videos </a>
</center>
<br><br>
</body>
</html>

