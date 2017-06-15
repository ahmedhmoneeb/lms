<?php
	include_once("../admin/includes/db_connect.php");
	include_once("../admin/includes/functions.php");
	if($_REQUEST[act]=="save_quiz")
	{
		save_quiz();
		exit;
	}
	if($_REQUEST[act]=="delete_quiz")
	{
		delete_quiz();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	if($_REQUEST[act]=="save_quiz_ans")
	{
		save_quiz_ans();
		exit;
	}
	###Code for save quiz#####
	function save_quiz()
	{
		$R=$_REQUEST;
		if($R[quiz_id])
		{
			$statement = "UPDATE `quiz` SET";
			$cond = "WHERE `quiz_id` = '$R[quiz_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `quiz` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`quiz_title` = '$R[quiz_title]', 
				`quiz_class_id` = '$R[quiz_class_id]',
				`quiz_teacher_id` = '".$_SESSION['user_details']['user_id']."',				
				`quiz_description` = '$R[quiz_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../quiz-report.php?msg=$msg");
	}
#########Function for delete quiz##########3
function delete_quiz()
{
	/////////Delete the record//////////
	$SQL="DELETE FROM quiz WHERE quiz_id = $_REQUEST[quiz_id]";
	mysql_query($SQL) or die(mysql_error());
	
	header("Location:../quiz-report.php?msg=Deleted Successfully.");
}
#########Function for delete quiz##########3
function save_quiz_ans()
{
	$quiz_correct_answer = $_SESSION['quiz_answer'];
	$total_question = count($_SESSION['quiz']);
	$quiz_id = $_SESSION['quiz'][1]['qq_quiz_id'];
	$student_id = $_SESSION['user_details']['student_id'];
	$SQL = "INSERT INTO quiz_result SET
			qr_quiz_id = '$quiz_id',
			qr_student_id = '$student_id',
			qr_total_question = '$total_question',
			qr_answer = '$quiz_correct_answer'
		   ";
	mysql_query($SQL) or die(mysql_error());
	
	header("Location:../student-quiz-report.php?msg=Exam was successfully completed.");
}
?>