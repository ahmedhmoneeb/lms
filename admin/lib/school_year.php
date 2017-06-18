<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_school_year")
	{
		save_school_year();
		exit;
	}
	if($_REQUEST[act]=="delete_school_year")
	{
		delete_school_year();
		exit;
	}
	###Code for save school_year#####
	function save_school_year()
	{
		$R=$_REQUEST;
		if($R[syear_id])
		{
			$statement = "UPDATE `school_year` SET";
			$cond = "WHERE `syear_id` = '$R[syear_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `school_year` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`syear_title` = '$R[syear_title]', 
				`syear_description` = '$R[syear_description]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../school_year-report.php?msg=$msg");
	}
#########Function for delete school_year##########3
function delete_school_year()
{
	/////////Delete the record//////////
	$SQL="DELETE FROM school_year WHERE syear_id = $_REQUEST[syear_id]";
	mysql_query($SQL) or die(mysql_error());
	
	header("Location:../school_year-report.php?msg=Deleted Successfully.");
}
?>