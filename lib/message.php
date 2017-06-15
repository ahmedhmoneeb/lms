<?php
	include_once("../admin/includes/db_connect.php");
	include_once("../admin/includes/functions.php");
	if($_REQUEST[act]=="save_message")
	{
		save_message();
		exit;
	}
	if($_REQUEST[act]=="delete_message")
	{
		delete_message();
		exit;
	}
	if($_REQUEST[act]=="getData")
	{
		getData();
		exit;
	}
	if($_REQUEST[act]=="get_report")
	{
		get_report();
		exit;
	}
	###Code for save message#####
	function save_message()
	{
		$R=$_REQUEST;
		if($R[message_id])
		{
			$statement = "UPDATE `message` SET";
			$cond = "WHERE `message_id` = '$R[message_id]'";
			$msg = "Data Updated Successfully.";
		}
		else
		{
			$statement = "INSERT INTO `message` SET";
			$cond = "";
			$msg="Data saved successfully.";
		}
		$SQL=   $statement." 
				`message_receiver_id` = '$R[message_receiver_id]', 
				`message_sender_id` = '".$_SESSION['user_details']['user_id']."',
				`message_sender_type` = '".$_SESSION['user_details']['user_level_id']."',				
				`message_subject` = '$R[message_subject]',
				`message_type` = '$R[message_type]',				
				`message_content` = '$R[message_content]'". 
				 $cond;
		$rs = mysql_query($SQL) or die(mysql_error());
		$msg = "Message sent successfully.";
		header("Location:../send_message.php?msg=$msg");
	}
#########Function for delete message##########3
function delete_message()
{
	/////////Delete the record//////////
	$SQL="DELETE FROM message WHERE message_id = $_REQUEST[message_id]";
	mysql_query($SQL) or die(mysql_error());
	
	header("Location:../message-report.php?msg=Deleted Successfully.");
}
#########Function for get message##########3
function getData()
{
	/////////Delete the record//////////
	$SQL = "SELECT * FROM message WHERE message_id = $_REQUEST[message_id]";
	$rs = mysql_query($SQL) or die(mysql_error());
	$data = mysql_fetch_assoc($rs);
	$data['message_content'] = nl2br($data['message_content']);
	echo json_encode($data);
}
?>