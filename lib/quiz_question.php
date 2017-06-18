<?php
	include_once("../admin/includes/db_connect.php");
	include_once("../admin/includes/functions.php");
	if($_REQUEST[act]=="save_quiz_question")
	{
		save_quiz_question();
		exit;
	}
	if($_REQUEST[act]=="delete_quiz_question")
	{
		delete_quiz_question();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save quiz_question#####
	function save_quiz_question()
	{
		$R=$_REQUEST;
		if($R[qq_id])
		{
			$statement = "UPDATE `quiz_question` SET";
			$cond = "WHERE `qq_id` = '$R[qq_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `quiz_question` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`qq_quiz_id` = '$R[qq_quiz_id]', 
				`qq_question` = '$R[qq_question]',
				`qq_option1` = '$R[qq_option1]',
				`qq_option2` = '$R[qq_option2]',
				`qq_option3` = '$R[qq_option3]',
				`qq_option4` = '$R[qq_option4]',
				`qq_correct` = '$R[qq_correct]',
				`qq_description` = '$R[qq_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../quiz-question-report.php?quiz_id=$R[qq_quiz_id]&msg=$msg");
	}
#########Function for delete quiz_question##########3
function delete_quiz_question()
{
	/////////Delete the record//////////
	$SQL="DELETE FROM quiz_question WHERE qq_id = $_REQUEST[qq_id]";
	mysql_query($SQL) or die(mysql_error());
	
	header("Location:../quiz-question-report.php?msg=Deleted Successfully.");
}
?>