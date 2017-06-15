<?php
	include_once("../admin/includes/db_connect.php");
	include_once("../admin/includes/functions.php");
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
		$query = http_build_query($R);
		///Checking Username Exits or not ////
		$SQL="SELECT * FROM student WHERE student_username = '$_REQUEST[student_username]'";
		$rs=mysql_query($SQL);
		$data=mysql_fetch_assoc($rs);
		if($data['student_username'] && $R['student_id'] == "") {
			header("Location:../student.php?".$query."&msg=Username Already Exits. Kindly choose another....");
			return;
		}
		/////////////////////////////////////
		$image_name = $_FILES[student_image][name];
		$location = $_FILES[student_image][tmp_name];
		if($image_name!="")
		{
			move_uploaded_file($location,"../admin/uploads/".$image_name);
		}
		else
		{
			$image_name = $R[avail_image];
		}
		//die;
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
		if(!$_SESSION['login'])
		{
			header("Location:../login.php??act=check_student_login&msg=You are registered successfully. Login with your credential !!!");
			exit;
		}
		header("Location:../student.php?msg=Your account updated successfully !!!");
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
	if($data[student_image])
	{
		unlink("../uploads/".$data[student_image]);
	}
	header("Location:../student-report.php?msg=Deleted Successfully.");
}
##############Function for reporting ##################3
function get_report()
{
$fname = 'myCSV.csv';
$fp = fopen($fname,'w');
$column_name = '"ID","student_name","student_add1","student_add2","student_state","student_email","student_city","student_mobile","student_gender","student_dob","student_nl_id","student_image"'."\n\r";
fwrite($fp,$column_name);	
	
$SQL="SELECT * FROM student,city WHERE student_city = city_id";
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