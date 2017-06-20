<?php
    session_start();
	
	include_once("../admin/includes/db_connect.php");
    
    $sID =  $_SESSION['user_details']['user_id'];
        $rate = $_POST['rate'];
    
     $statement = "SELECT * FROM `students_files_rating` ";
			$cond = "WHERE `file_id` = '$_SESSION[files_id]' AND `student_id` = '$sID'";
        
		$SQL=   $statement.
				 $cond;

		    
            
        $result = mysql_query($SQL);
        if(mysql_num_rows($result) > 0)
        {
            $statement = "UPDATE `students_files_rating` SET ";
            $cond = "WHERE `student_id` = '$sID' AND 
                    `file_id` = '$_SESSION[files_id]'";
                   
            $SQL=   $statement." 
                    `rate` = '$rate'"
                    . $cond;

                
            $result = mysql_query($SQL);
            
        }
        else
        {
            $statement = "INSERT INTO `students_files_rating` SET ";
        
            $SQL=   $statement." 
                    `student_id` = '$sID', 
                    `file_id` = '$_SESSION[files_id]',
                    `rate` = '$rate'";

                
            $result = mysql_query($SQL);
            
        }
       
        if(!$result)
        {
              echo "0";
        }
        else
        { 
            $statement1 = "SELECT * FROM `students_files_rating` ";
			$cond1 = "WHERE `file_id` = '$_SESSION[files_id]'";
        
            $SQL1 =   $statement1.
                    $cond1;

                
            $result1 = mysql_query($SQL1);
            $rowcount = mysql_num_rows($result1);
            
            $sum = 0;
            while($row = mysql_fetch_assoc($result1)) 
            {
                $sum += $row["rate"];
            }
            
            $avg = (int) $sum / $rowcount;
            
            $statement = "UPDATE `files` SET";
                $cond = "WHERE `files_id` = '$_SESSION[files_id]'";
            
            $SQL=   $statement." 
                    
                    `files_rate` = '$avg'". 
                    $cond;

                
            $result = mysql_query($SQL);
        }
        
      
?>