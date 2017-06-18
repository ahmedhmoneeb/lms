<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_subject")
	{
		save_subject();
		exit;
	}
	if($_REQUEST[act]=="delete_subject")
	{
		delete_subject();
		exit;
	}
	###Code for save subject#####
	function save_subject()
	{
		$R=$_REQUEST;
		if($R[subject_id])
		{
			$statement = "UPDATE `subject` SET";
			$cond = "WHERE `subject_id` = '$R[subject_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `subject` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`subject_title` = '$R[subject_title]', 
				`subject_class_id` = '$R[subject_class_id]', 
				`subject_code` = '$R[subject_code]',
				`subject_description` = '$R[subject_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../subject-report.php?msg=$msg");
	}
#########Function for delete subject##########3
function delete_subject()
{
	/////////Delete the record//////////
	$SQL="DELETE FROM subject WHERE subject_id = $_REQUEST[subject_id]";
	mysql_query($SQL) or die(mysql_error());
	
	header("Location:../subject-report.php?msg=Deleted Successfully.");
}
?>