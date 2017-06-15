<?php
	include_once("../admin/includes/db_connect.php");
	include_once("../admin/includes/functions.php");
	if($_REQUEST[act]=="save_class")
	{
		save_class();
		exit;
	}
	if($_REQUEST[act]=="delete_class")
	{
		delete_class();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save class#####
	function save_class()
	{
		$R=$_REQUEST;
		if($R[class_id])
		{
			$statement = "UPDATE `class` SET";
			$cond = "WHERE `class_id` = '$R[class_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `class` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`class_title` = '$R[class_title]', 
				`class_description` = '$R[class_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../class-report.php?msg=$msg");
	}
#########Function for delete class##########3
function delete_class()
{
	/////////Delete the record//////////
	$SQL="DELETE FROM class WHERE class_id = $_REQUEST[class_id]";
	mysql_query($SQL) or die(mysql_error());
	
	header("Location:../class-report.php?msg=Deleted Successfully.");
}
?>