<?php
include ( 'includes/header1.php' );
?>
<html lang="en">

<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<body>
	<div id="banner" class="container">
		  <?php include "slideshow.html" ?>
		</div>
		<div id="three-column" class="container">
			<header>
				<h2 align="center"><strong>These are our Services:</strong></h2>
				<?php if (isset($_SESSION['username'])==0){?>
				<h4 align="center" ><strong>Please Login To Enjoy Our Full Services.</strong></h4>
				<?php } else{ ?>
				<?php } ?>
			</header>
			<div class="tbox1">
				<div class="box-style box-style01">
				  <div class="content">
					  <a href="latest_videos.php" class="image image-full"><img src="images/video1.png" alt="" /> </a>
				    <h2 align="center">SHORT VIDEOS </h2>
						<p align="justify">You can clear your basic concepts related to the subject in a pinch of time in this segment. </p>
				        <div align="center"><a href="latest_videos.php" class="button-style">Click Here</a> </div>
					</div>
				</div>
			</div>
			<div class="tbox2">
				<div class="box-style box-style02">
					<div class="content">
					  <a href="fileupload.php" class="image image-full"><img src="images/file.png" alt="" /></a>
					  <h2 align="center">FILE SHARING</h2>
						<p align="justify">You can upload files as well as download the uploaded files with respect to the course. </p>
		                <div align="center"><a href="fileupload.php" class="button-style">Click Here</a> </div>
				  </div>
				</div>
			</div>
			<div class="tbox3">
				<div class="box-style box-style03">
				  <div class="content"> <a href="feedback.php" class="image image-full"><img src="images/mail.png" alt=""></a>
					  <h2 align="center">FEEDBACK</h2>
						<p align="justify">You can provide your feedback about the Teachers or the Subjects in this feature. </p>
						<div align="center"><a href="feedback.php"" class="button-style">Click Here</a> </div>
					</div>
				</div>
			</div>
		</div>
		<?php if (isset($_SESSION['username'])){?>
		<div id="three-column" class="container">
			
			<div class="tbox1">
				<div class="box-style box-style01">
				  <div class="content">
					  <a href="stream.php" class="image image-full"><img src="images/live1.png" alt="" /> </a>
				    <h2 align="center">Video Broadcasting </h2>
						<p align="justify">You can join a class and attend the respective lecture via this feature. </p>
				        <div align="center"><a href="stream.php" class="button-style">Click Here</a> </div>
					</div>
				</div>
				
			</div>
			<div class="tbox2">
				<div class="box-style box-style02">
				  <div class="content">
					  <a href="#" class="image image-full"><img src="images/qa2.png" alt="" /></a>
				    <h2 align="center">Q&amp;A </h2>
						<p align="justify">A Question and Answer feature provided via a chat interface.</p>
				        <div align="center"><a href="#" class="button-style">Click Here</a> </div>
					</div>
				</div>
			</div>
			<div class="tbox3">
				<div class="box-style box-style03">
				  <div class="content"> <a href="attend.php" class="image image-full"><img src="images/original2.png" alt=""></a>
					  <h2 align="center">Attendance Check</h2>
						<p align="justify">You can check your attendance for the lectures which you have attended.</p>
						<div align="center"><a href="attend.php" class="button-style">Click Here</a> </div>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
		<div id="page">
			<div id="content"></div>
			<div id="sidebar"></div>
		</div>
<?php
include ( 'includes/footer1.php' );
?>
</body>
</html>
