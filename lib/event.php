<?php
	include_once("../admin/includes/db_connect.php");
	include_once("../admin/includes/functions.php");
	if($_REQUEST[act]=="save_event")
	{
		save_event();
		exit;
	}
	if($_REQUEST[act]=="delete_event")
	{
		delete_event();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save event#####
	function save_event()
	{
		$R=$_REQUEST;
		if($R[event_id])
		{
			$statement = "UPDATE `event` SET";
			$cond = "WHERE `event_id` = '$R[event_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `event` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`event_title` = '$R[event_title]', 
				`event_class_id` = '$R[event_class_id]', 
				`event_teacher_id` = '".$_SESSION['user_details']['user_id']."',	
				`event_date_start` = '$R[event_date_start]', 
				`event_date_end` = '$R[event_date_end]', 
				`event_description` = '$R[event_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../event-report.php?msg=$msg");
	}
#########Function for delete event##########3
function delete_event()
{
	/////////Delete the record//////////
	$SQL="DELETE FROM event WHERE event_id = $_REQUEST[event_id]";
	mysql_query($SQL) or die(mysql_error());
	
	header("Location:../event-report.php?msg=Deleted Successfully.");
}
?>