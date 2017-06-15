<?php
	session_start();
	include_once("admin/includes/db_connect.php");
	include_once("admin/includes/functions.php");
	ini_set("display_errors",1);
	error_reporting(E_ERROR);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>E-Learning Management System</title>

    <!-- Bootstrap core CSS -->
	<link href="assets/css/jquery-ui.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
		
    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">
	<script src="assets/js/jquery-1.10.2.min.js"></script>
	<script src="assets/js/jquery-ui.js"></script>
	<link href="admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="admin/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
	<!-- jQuery full calendar -->
	<script src="admin/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="admin/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
	<!--script for this page only-->
	<script src="admin/js/calendar-custom.js"></script>
	<script src="admin/js/jquery.rateit.min.js"></script>
	<!-- custom select -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png"></a>
        </div>
        <div class="navbar-collapse collapse">
		  <ul class="nav navbar-nav navbar-right">
		  <li class="active"><a href="index.php">Home</a></li>
		  <li><a href="about.php">About Us</a></li>
		  <li><a href="professors.php">Professors</a></li>
		  <?php if($_SESSION['user_details']['user_level_id'] == 3) {?>
		  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">My Accounts
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="assignment-report.php">View Assignments</a></li>
			  <li><a href="announcement-report.php">View Anouncements</a></li>
			  <li><a href="event-report.php">View Class Events</a></li>
			  <li><a href="subject-report.php">My Subjects</a></li>
			  <li><a href="files-report.php">View Downloaded Files</a></li>	
			  <li><a href="inbox-message.php?tab3=active">Messages</a></li>	
			  <li><a href="student-quiz-report.php">My Quiz</a></li>				  
			</ul>
		  </li>
		  <?php } ?>
		  <?php if($_SESSION['user_details']['user_level_id'] == 2) {?>
		  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Administration
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="class.php">Add Class</a></li>
			  <li><a href="assignment.php">Add Assignments</a></li>
			  <li><a href="announcement.php">Add Anouncements</a></li>
			  <li><a href="event.php">Add Class Events</a></li>
			  <li><a href="quiz.php">Add Quiz</a></li>			  
			  <li><a href="files.php">Add Files</a></li>			  
			  <li><a href="send_message.php?tab1=active">Send Message</a></li>
			</ul>
		  </li>
		  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Report
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
			  <li><a href="class-report.php">Class Reports</a></li>
			  <li><a href="assignment-report.php">Assignments Reports</a></li>
			  <li><a href="announcement-report.php">Anouncements Reports</a></li>
			  <li><a href="event-report.php">Class Events Reports</a></li>
			  <li><a href="quiz-report.php">Quiz Reports</a></li>			  
			  <li><a href="files-report.php">File Reports</a></li>
			  <li><a href="student-report.php">Student Reports</a></li>	
			  <li><a href="inbox-message.php?tab3=active">Message Inbox</a></li>			  
			</ul>
		  </li>
		  <?php } ?>
		  <?php if($_SESSION['login'] != 1) {?>
		    <li><a data-toggle="modal" data-target="#myModal" href="#myModal">Contact Us</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">User Login 
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a data-toggle="modal" data-target="#loginModal" href="#loginModal">Professor Login</a></li>
					<li><a data-toggle="modal" data-target="#studentLoginModal" href="#studentLoginModal">Student Login</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Signup 
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="user.php">I am Professor</a></li>
					<li><a href="student.php">I am Student</a></li>
				</ul>
			</li>
		  <?php } else { ?>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome <?=$_SESSION['user_details']['user_name']?> 
				<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<?php if($_SESSION['user_details']['user_level_id'] == 2) {?>
					<li><a href="user.php">My Account</a></li>
					<?php }?>
					<li><a href="lib/login.php?act=logout">Logout</a></li>
				</ul>
			</li>			
		  <?php } ?>
		  <li style="color:#fffff; float:right"><a href="#"></a></li>
		</ul>
		
        </div><!--/.nav-collapse -->
      </div>
    </div>