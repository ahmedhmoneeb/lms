<?php
	include_once("../admin/includes/db_connect.php");
	include_once("../admin/includes/functions.php");
	if($_REQUEST[act]=="save_announcement")
	{
		save_announcement();
		exit;
	}
	if($_REQUEST[act]=="delete_announcement")
	{
		delete_announcement();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save announcement#####
	function save_announcement()
	{
		$R=$_REQUEST;
		if($R[announcement_id])
		{
			$statement = "UPDATE `announcement` SET";
			$cond = "WHERE `announcement_id` = '$R[announcement_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `announcement` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`announcement_title` = '$R[announcement_title]', 
				`announcement_class_id` = '$R[announcement_class_id]', 
				`announcement_teacher_id` = '".$_SESSION['user_details']['user_id']."',	
				`announcement_date` = '$R[announcement_date]', 
				`announcement_description` = '$R[announcement_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../announcement-report.php?msg=$msg");
	}
#########Function for delete announcement##########3
function delete_announcement()
{
	/////////Delete the record//////////
	$SQL="DELETE FROM announcement WHERE announcement_id = $_REQUEST[announcement_id]";
	mysql_query($SQL) or die(mysql_error());
	
	header("Location:../announcement-report.php?msg=Deleted Successfully.");
}
?>