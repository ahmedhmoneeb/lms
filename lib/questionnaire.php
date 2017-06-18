<?php
    session_start();
	
	include_once("../admin/includes/db_connect.php");

    $sID = $_SESSION['user_details']['user_id'];
    $SQL="SELECT * FROM student WHERE student_id = '$sID'";
	$rs = mysql_query($SQL) or die(mysql_error());
    $c = 1;
    
	if(mysql_num_rows($rs))
	{
        $statement = "UPDATE `student` SET";
			$cond = "WHERE `student_id` = '$sID'";
            $SQL=   $statement."
				`questionnaire` = '$c'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
        
        $statement = "INSERT INTO `questionnaire` SET ";
			$cond = "";
			
		$SQL=   $statement." 
				`student_id` = '$sID', 
				`q1` = '$_REQUEST[q1]',
                `q2` = '$_REQUEST[q2]',
                `q3` = '$_REQUEST[q3]',
                `q4` = '$_REQUEST[q4]',
				`q5` = '$_REQUEST[q5]'";

		    
        $result = mysql_query($SQL);
        if (!$result) 
        {
            header("Location:../login.php");
        } 
        else
        {
            header("Location:../dashboard.php");
		    exit;
        }
        
    }
    else
    {
         header("Location:../login.php");
    }
?>