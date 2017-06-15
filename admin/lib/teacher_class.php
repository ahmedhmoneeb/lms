<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_teacher_class")
	{
		save_teacher_class();
		exit;
	}
	if($_REQUEST[act]=="delete_teacher_class")
	{
		delete_teacher_class();
		exit;
	}
	###Code for save teacher_class#####
	function save_teacher_class()
	{
		$R=$_REQUEST;
		if($R[tc_id])
		{
			$statement = "UPDATE `teacher_class` SET";
			$cond = "WHERE `tc_id` = '$R[tc_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `teacher_class` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`tc_user_id` = '$R[tc_user_id]', 
				`tc_class_id` = '$R[tc_class_id]',
				`tc_description` = '$R[tc_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../teacher-class-report.php?msg=$msg");
	}
#########Function for delete teacher_class##########3
function delete_teacher_class()
{
	/////////Delete the record//////////
	$SQL="DELETE FROM teacher_class WHERE tc_id = $_REQUEST[tc_id]";
	mysql_query($SQL) or die(mysql_error());
	
	header("Location:../teacher-class-report.php?msg=Deleted Successfully.");
}
?>