<?php 
	include_once("includes/header.php"); 
	if($_SESSION['user_details']['user_level_id'] == 2) {
		$heading = "PROFESSOR";
	} else {
		$heading = "STUDENT";
	}
?>
<style>
.btn-circle {
  width: 156px;
  height: 156px;
  text-align: center;
  padding: 6px 0;
  line-height: 1.42;
  border-radius: 90px;
  color: #fff;
  background: #57889c;
  background-color: #57889c;
  font-size: 18px;
  font-weight: 700;
}
.btn-circle div{
  margin-top: 40px;
}
.mydash {
	border:1px solid #57889c;
	padding:10px;
	margin:10px;
}
.col-lg-2 {
	width:14.667%;
}
</style>      

	<div id="blue">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
				<h4><?=$heading?> ADMINISTRATION DASHBOARD</h4>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!--  bluewrap -->
	<?php if($_SESSION['user_details']['user_level_id'] == 3) {?>
	<div class="container w">
		<div class="row">
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="assignment-report.php" class="btn btn-default btn-circle"><div>View<br>Assignment</div></a>	
			</div><!--/.col-->	
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="announcement-report.php" class="btn btn-default btn-circle"><div>View<br>Annoucement</div></a>	
			</div><!--/.col-->
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="event-report.php" class="btn btn-default btn-circle"><div>View<br>Events</div></a>	
			</div><!--/.col-->				
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="subject-report.php" class="btn btn-default btn-circle"><div>View<br>Subjects</div></a>	
			</div><!--/.col-->				
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="files-report.php" class="btn btn-default btn-circle"><div>View<br>File</div></a>	
			</div><!--/.col-->
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="inbox-message.php?tab3=active" class="btn btn-default btn-circle"><div style="margin-top:55px">Messages</div></a>	
			</div><!--/.col-->
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="student-quiz-report.php" class="btn btn-default btn-circle"><div style="margin-top:55px">My Quiz</div></a>	
			</div><!--/.col-->
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="lib/login.php?act=logout" class="btn btn-default btn-circle"><div style="margin-top:55px">Logout</div></a>	
			</div><!--/.col-->				
		</div><!-- row -->				  

		<br>
		<br>
	</div>
	<?php } ?>
	<?php if($_SESSION['user_details']['user_level_id'] == 2) {?>
	<div class="container w">
		<div class="row">
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="class.php" class="btn btn-default btn-circle"><div>Class<br>Management</div></a>	
			</div><!--/.col-->	
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="quiz.php" class="btn btn-default btn-circle"><div>Quiz<br>Management</div></a>	
			</div><!--/.col-->	
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="assignment.php" class="btn btn-default btn-circle"><div>Assignment<br>Management</div></a>	
			</div><!--/.col-->	
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="announcement.php" class="btn btn-default btn-circle"><div>Annoucement<br>Management</div></a>	
			</div><!--/.col-->
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="event.php" class="btn btn-default btn-circle"><div>Events<br>Management</div></a>	
			</div><!--/.col-->				
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="subject.php" class="btn btn-default btn-circle"><div>Subjects<br>Management</div></a>	
			</div><!--/.col-->				
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="files.php" class="btn btn-default btn-circle"><div>File<br>Management</div></a>	
			</div><!--/.col-->
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="inbox-message.php?tab3=active" class="btn btn-default btn-circle"><div style="margin-top:55px">Messages</div></a>	
			</div><!--/.col-->
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="user.php?user_id=<?=$_SESSION['user_details']['user_id']?>" class="btn btn-default btn-circle"><div style="margin-top:55px">My Account</div></a>	
			</div><!--/.col-->
			<div class="col-lg-2 col-md-3 col-sm-12 col-xs-12 mydash">
				<a href="lib/login.php?act=logout" class="btn btn-default btn-circle"><div style="margin-top:55px">Logout</div></a>	
			</div><!--/.col-->				
		</div><!-- row -->
		<br>
		<br>
	</div>
	<?php } ?>
	<!-- container -->
<?php include_once("includes/footer.php"); ?>
