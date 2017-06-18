<?php
	include_once("../includes/db_connect.php");
	include_once("../includes/functions.php");
	if($_REQUEST[act]=="save_student")
	{
		save_student();
		exit;
	}
	if($_REQUEST[act]=="delete_student")
	{
		delete_student();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save student#####
	function save_student()
	{
		$R=$_REQUEST;
		$image_name = $_FILES[student_photo][name];
		$location = $_FILES[student_photo][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}
		if($R[student_id])
		{
			$statement = "UPDATE `student` SET";
			$cond = "WHERE `student_id` = '$R[student_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `student` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`student_course_id` = '$R[student_course_id]', 
				`student_rollno` = '$R[student_rollno]', 
				`student_name` = '$R[student_name]', 
				`student_username` = '$R[student_username]', 
				`student_password` = '$R[student_password]', 
				`student_father_name` = '$R[student_father_name]', 
				`student_dob` = '$R[student_dob]', 
				`student_mobile` = '$R[student_mobile]', 
				`student_photo` = '$image_name', 
				`student_details` = '$R[student_details]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		header("Location:../student-report.php?msg=$msg");
	}
#########Function for delete student##########3
function delete_student()
{
	$SQL="SELECT * FROM student WHERE student_id = $_REQUEST[student_id]";
	$rs=mysql_query($SQL);
	$data=mysql_fetch_assoc($rs);
	
	/////////Delete the record//////////
	$SQL="DELETE FROM student WHERE student_id = $_REQUEST[student_id]";
	mysql_query($SQL) or die(mysql_error());
	
	//////////Delete the image///////////
	if($data[student_photo])
	{
		unlink("../uploads/".$data[student_photo]);
	}
	header("Location:../student-report.php?msg=Deleted Successfully.");
}
?>