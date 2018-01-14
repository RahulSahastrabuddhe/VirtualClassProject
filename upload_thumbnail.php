<?php
include ( 'includes/header1.php' );
$videoid = $_GET['videoid'];
if (isset($_FILES['thumbnail'])) {
   if (($_FILES['thumbnail']['type']=='image/jpeg') || ($_FILES['thumbnail']['type']=='image/png') || $_FILES['thumbnail']['type']=='image/gif') {
   $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';                                                                             
   $random_directory = substr(str_shuffle($chars), 0, 15);

   if (file_exists('data/users/videos/thumbnails/' . $random_directory . ''.$_FILES['thumbnail']['name'])) {
     echo 'image exists';
   }
   else
   {
   move_uploaded_file($_FILES['thumbnail']['tmp_name'],'data/users/videos/thumbnails/' . $random_directory . ''.$_FILES['thumbnail']['name']);
   $img_name = $_FILES['thumbnail']['name'];
   $thumbnail = $random_directory.$img_name;
   $assoc_profile_pic = mysql_query("UPDATE videos SET thumbnail='$thumbnail' WHERE video_id='$videoid'");
   die('The image was uploaded successfully');

   }
   }
   if (($_FILES['thumbnail']['type']=='image/jpeg') || ($_FILES['thumbnail']['type']=='image/png') || $_FILES['thumbnail']['type']=='image/gif') {

   }
   else
   {
    die('Invalid File');
   }

}
?><br /><br /><br /><br /><br /><br /><br /><br /><br />
<h2>Upload your channel image</h2>
<form action='upload_thumbnail.php?videoid=<?php echo $videoid; ?>' method='POST' enctype='multipart/form-data'>
<input type='file' name='thumbnail' value='Upload your Image'>
<input type='submit' name='submit' value='Upload Image'>
</form>