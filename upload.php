<?php
include ('includes/header1.php');

if (isset($_FILES['video'])) {
  $title = $_POST['video_title'];
  $desc = $_POST['video_description'];
  $keywords = $_POST['video_keywords'];
  $privacy = @$_POST['privacy'];
  if (!empty($title) || ($desc) || ($keywords) || ($privacy)) {
   $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
   $video_id = substr(str_shuffle($chars), 0, 15);
   $video_id = md5($video_id);
   $subject= $_POST['subject'];
   

   
   
  }
  else
  {
   die('empty fields');
  }
   if (($_FILES['video']['type']=='video/mp4')) {
   $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
   $random_directory = substr(str_shuffle($chars), 0, 15);

   if (file_exists('data/users/videos/' . $random_directory . ''.$_FILES['video']['name'])) {
     echo 'video exists';
   }
   else
   {

   move_uploaded_file($_FILES['video']['tmp_name'],'data/users/videos/' . $random_directory . ''.$_FILES['video']['name']);
   $img_name = $_FILES['video']['name'];
   $filename = "data/users/videos/".$random_directory.$_FILES['video']['name'];
   $md5_file = md5_file($filename);
 $check_md5 = mysql_query("SELECT file_md5 FROM videos WHERE file_md5='$md5_file'");
 

 
   if (mysql_num_rows($check_md5) != 0) {
     unlink($filename);
    die("This is a duplicate upload");
   }else {
        $date = date("F j, Y");

            $insert = mysql_query("INSERT INTO videos(id,video_title,video_description,video_keywords,uploaded_by,privacy,date_uploaded,md5,views,video_id,file_md5,file_location,subject) VALUES ('','$title','$desc','$keywords','$user','$privacy','$date','md5','0','$video_id',' $md5_file',' $filename','$subject')");
   die('The video was uploaded successfully');

   
   mysql_query("UPDATE videos SET file_md5='$md5_file' WHERE video_id='$video_id'");
   }
   }
   }

}
?>
<?php if (isset($_SESSION['username'])){?>
</br></br></br></br></br></br>

<form action='upload.php' method='POST' enctype='multipart/form-data'">
Video Title: <input type='text' name='video_title' maxLength="40"class="form-control"required   /><br />
Video Description:<br />
<textarea rows='10' cols='40' name='video_description'maxLength="200" required></textarea><br />
Video Keywords: eg:song,movie etc<input type='text' name='video_keywords'class="form-control"  value=''required /><br />

Privacy: <input type='radio' name='privacy' value='Public' /> Public &nbsp;&nbsp; <input type='radio' name='privacy' value='Private' /> Private<br />
<input type='file' name='video' value='Upload Your Video'class="form-control file"required><br />
            

			
<select name="subject">      
		<option value="" disabled selected>Select subject</option>	
		<?php $username = $_SESSION['username'];
			$query = mysql_query("SELECT * FROM users where username='$username'");
			$row=mysql_fetch_array($query);
		?>
		<?php if ($row['role']=='Teacher'){?>
		<?php
        $result=mysql_query("SELECT * FROM users WHERE username = '$_SESSION[username]'")
        or die("There are no records to display ... \n" . mysql_error()); 
        if (mysql_num_rows($result)<1)
		{
			$result = null;
        }
        $row = mysql_fetch_array($result);
        if($row)
        {
			$department = $row['department'];
			$year = $row['year'];
        }
        $query = mysql_query("SELECT * FROM tsubject "); 
        while($row=mysql_fetch_array($query)){
        echo "<option>".$row['subject']."</option>";
        }
        echo "</select>";
		?>
		<?php }else{ ?>
		<?php
        $result=mysql_query("SELECT * FROM users WHERE username = '$_SESSION[username]'")
        or die("There are no records to display ... \n" . mysql_error()); 
        if (mysql_num_rows($result)<1)
		{
			$result = null;
        }
        $row = mysql_fetch_array($result);
        if($row)
        {
			$department = $row['department'];
			$year = $row['year'];
        }
        $query = mysql_query("SELECT * FROM subjects where department='$department' AND year='$year'"); 
        while($row=mysql_fetch_array($query))
		{
			echo "<option>".$row['subject']."</option>";
        }
        echo "</select>";
		?>
		<?php } ?>
		</select>
					
			
			
			
<input type='submit' name='submit'  value='Upload Now &uarr;'  class="btn-info"style="font-family:'Courier New', Courier, monospace; width:370px;height:40px;font-weight:bold;">
</form>

<?php }else{
echo"You need to Login to Upload Videos";}
?>
