<?php
	include_once("../admin/includes/db_connect.php");
	include_once("../admin/includes/functions.php");
	if($_REQUEST[act]=="save_assignment")
	{
		save_assignment();
		exit;
	}
	if($_REQUEST[act]=="delete_assignment")
	{
		delete_assignment();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save assignment#####
	function save_assignment()
	{
		$R=$_REQUEST;
		/////////////////////////////////////
		$file_name = $_FILES[assignment_filename][name];
		$location = $_FILES[assignment_filename][tmp_name];
		if($file_name!="")
		{
			move_uploaded_file($location,"../admin/uploads/".$file_name);
		}
		else
		{
			$file_name = $R[avail_file];
		}
		//die;
		if($R[assignment_id])
		{
			$statement = "UPDATE `assignment` SET";
			$cond = "WHERE `assignment_id` = '$R[assignment_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `assignment` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`assignment_title` = '$R[assignment_title]', 
				`assignment_class_id` = '$R[assignment_class_id]', 
				`assignment_teacher_id` = '".$_SESSION['user_details']['user_id']."',	 
				`assignment_date` = '$R[assignment_date]', 
				`assignment_description` = '$R[assignment_description]', 
				`assignment_filename` = '$file_name'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../assignment-report.php?msg=$msg");
	}
#########Function for delete assignment##########3
function delete_assignment()
{
	$SQL="SELECT * FROM assignment WHERE assignment_id = $_REQUEST[assignment_id]";	
	$rs=mysql_query($SQL);
	$data=mysql_fetch_assoc($rs);
	/////////Delete the record//////////
	$SQL="DELETE FROM assignment WHERE assignment_id = $_REQUEST[assignment_id]";
	mysql_query($SQL) or die(mysql_error());
	
	//////////Delete the file///////////
	if($data[assignment_filename])
	{
		unlink("../uploads/".$data[assignment_filename]);
	}
	header("Location:../assignment-report.php?msg=Deleted Successfully.");
}
##############Function for reporting ##################3
function get_report()
{
$fname = 'myCSV.csv';
$fp = fopen($fname,'w');
$column_name = '"ID","assignment_name","assignment_add1","assignment_add2","assignment_state","assignment_email","assignment_city","assignment_mobile","assignment_gender","assignment_dob","assignment_nl_id","assignment_filename"'."\n\r";
fwrite($fp,$column_name);	
	
$SQL="SELECT * FROM assignment,city WHERE assignment_city = city_id";
$rs=mysql_query($SQL);
while($data=mysql_fetch_assoc($rs))
{
	$csvdata=implode(",",$data)."\n\r";
	fwrite($fp,$csvdata);		
}
fclose($fp);
header('Content-type: application/csv');
header("Content-Disposition: inline; filename=".$fname);
readfile($fname);
}
?>