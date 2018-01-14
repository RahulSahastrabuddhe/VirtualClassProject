<?php
include ( 'includes/header1.php' );
?>
<html lang="en">

<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<body>
<?php if (isset($_SESSION['username'])){?>
		<div id="three-column" class="container">
			
			<div class="tbox1">
				<div class="box-style box-style01">
				  <div class="content">
					  <a href="attendance2.php" class="image image-full"><img src="images/live1.png" alt="" /> </a>
				    <h2 align="center">Check your own attendance </h2>
						<p align="justify">You can join a class and attend the respective lecture via this feature. </p>
				        <div align="center"><a href="stream.php" class="button-style">Click Here</a> </div>
					</div>
				</div>
				
			</div>
			<div class="tbox2">
				<div class="box-style box-style02">
				  <div class="content">
					  <a href="attendance.php" class="image image-full"><img src="images/qa2.png" alt="" /></a>
				    <h2 align="center">Check attendance of your lecture</h2>
						<p align="justify">A Question and Answer feature provided via a chat interface.</p>
				        <div align="center"><a href="attendance.php" class="button-style">Click Here</a> </div>
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
