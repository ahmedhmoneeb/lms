<?php
    session_start();
	
	include_once("../admin/includes/db_connect.php");
        $rate = $_POST['rate'];
    $fileID = $_POST['fileID'];
 
           
            $statement = "UPDATE `files` SET files_rate = $rate WHERE `files_id` = $fileID;";
            echo $statement;
  
                    
             
       

                
            $result = mysql_query($statement);
if ($result)echo "done";
        
        
      
?>
