<?php
	include_once("../admin/includes/db_connect.php");
	include_once("../admin/includes/functions.php");
	if($_REQUEST[act]=="save_files")
	{
		save_files();
		exit;
	}
	if($_REQUEST[act]=="delete_files")
	{
		delete_files();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save files#####
	function save_files()
	{
		$R=$_REQUEST;
		/////////////////////////////////////
		$file_name = $_FILES[files_filename][name];
		$location = $_FILES[files_filename][tmp_name];
		if($file_name!="")
		{
			move_uploaded_file($location,"../admin/uploads/".$file_name);
		}
		else
		{
			$file_name = $R[avail_file];
		}
		//die;
		if($R[files_id])
		{
			$statement = "UPDATE `files` SET";
			$cond = "WHERE `files_id` = '$R[files_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `files` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`files_title` = '$R[files_title]', 
				`files_class_id` = '$R[files_class_id]', 
				`files_teacher_id` = '".$_SESSION['user_details']['user_id']."',	
				`files_description` = '$R[files_description]', 
				`files_filename` = '$file_name'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../files-report.php?msg=$msg");
	}
#########Function for delete files##########3
function delete_files()
{
	$SQL="SELECT * FROM files WHERE files_id = $_REQUEST[files_id]";	
	$rs=mysql_query($SQL);
	$data=mysql_fetch_assoc($rs);
	/////////Delete the record//////////
	$SQL="DELETE FROM files WHERE files_id = $_REQUEST[files_id]";
	mysql_query($SQL) or die(mysql_error());
	
	//////////Delete the file///////////
	if($data[files_filename])
	{
		unlink("../uploads/".$data[files_filename]);
	}
	header("Location:../files-report.php?msg=Deleted Successfully.");
}
##############Function for reporting ##################3
function get_report()
{
$fname = 'myCSV.csv';
$fp = fopen($fname,'w');
$column_name = '"ID","files_name","files_add1","files_add2","files_state","files_email","files_city","files_mobile","files_gender","files_dob","files_nl_id","files_filename"'."\n\r";
fwrite($fp,$column_name);	
	
$SQL="SELECT * FROM files,city WHERE files_city = city_id";
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