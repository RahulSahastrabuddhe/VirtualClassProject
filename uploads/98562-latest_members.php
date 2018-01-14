<?php
include ( 'includes/header1.php' );
?>
<br /><br /><br />
<?php 
 if (!isset($_SESSION['username'])){
     echo"<h3>You Need To Login To view our Members...!</h3>";
	 echo'<br>';
     echo'<h4>Already a Member&nbsp;...?&nbsp;';echo '<a href="login.php">Login Here...!</a> ';
	 echo'&nbsp;No...&nbsp;?&nbsp;';echo '<a href="join.php">Join us Now...!</a> </h4>';
	 }else{

$get_users = mysql_query("SELECT * FROM users ORDER by date_joined DESC");
if (mysql_num_rows($get_users) == 0) {
	echo "There are no users yet!";
}
else {
	while ($row = mysql_fetch_assoc($get_users)) {
		$id = $row['id'];
		$firstn=$row['firstname'];
		$lastn=$row['lastname'];
		$username = $row['username'];
		$date_joined=$row['date_joined'];
		$user=$row['username'];
		$profile_pic = $row['profile_pic']; 

		$join=$firstn.'&nbsp;'.$lastn;
		 if ($profile_pic == '') {
 echo "<img src='./data/users/images/icons/avatar.png' height='120'>";
 }
 else {
 echo "<img src='profile_picture/$profile_pic' height='120' width='150'style='
border:3px solid #CC9900;'>";
 }
	//echo'<h3>';echo'<img src="images/avatar.png"><br>';	echo $join."<br /></h3>";
	print'Member Since:';echo $date_joined ; print'<br>';
	?>
			  <a href="profile.php?u=<?php echo  $user;?>">view profile</a>|<a href="this_channel.php?cc=<?php echo  $user;?>">view channel</a>
	<?php
	
	echo'<hr>';
	}
}
?>

<?php  } ?>