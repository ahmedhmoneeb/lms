<?php
    session_start();
    include_once("../admin/includes/db_connect.php");
    
    $statement = "SELECT * FROM `files` ORDER BY files_rate DESC";
			$cond = "";
         
		$SQL=   $statement.
				 $cond;
     
    $result = mysql_query($SQL);
    if(mysql_num_rows($result) > 0)
        {
            $rows = array();
            while($r = mysql_fetch_assoc($result)) {
                $rows[] = $r;
         }
        }
        echo json_encode($rows);


    /*
    $subject_id = $_SESSION['subject_id'];
    //echo $subject_id;
     $statement = "SELECT * FROM `files` ";
			$cond = "WHERE `files_subject_id` = '$subject_id'";
        
		$SQL=   $statement.
				 $cond;
     
    $result = mysql_query($SQL);
    //echo mysql_num_rows($result);
    //$records = [];
        if(mysql_num_rows($result) > 0)
        {
            $rows = array();
            while($r = mysql_fetch_assoc($result)) {
                $rows[] = $r;
                //echo $r;
            }
            print $rows;
            //print json_encode($rows);

            /*
            while( $row = mysql_fetch_row( $result ) )
            {
                array_push( $records, $row );
            }
            //echo "1";
            
        }
        else
        {
            echo "nooooo";
        }

   */ 
    
    
?>