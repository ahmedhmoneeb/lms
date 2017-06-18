<?php 
	include_once("includes/header.php"); 
	$SQL="SELECT * FROM message WHERE message_sender_id = '".$_SESSION['user_details']['user_id']."' AND message_sender_type = '".$_SESSION['user_details']['user_level_id']."'";
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
jQuery(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(message_id)
{
	this.document.frm_message.act.value="delete_message";
	this.document.frm_message.submit();
}
</script>
	<div class="container w">
		<div class="row">
			<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:95%; margin-bottom:10px; margin-left:20px"><h3>Sent Message History</h3></div>
			<div style="clear:both"></div>
			<?php include_once("includes/message_tabs.php"); ?>
		  <div class="col-lg-12" style="margin-top:10px;">
			<form name="frm_message" action="lib/message.php" method="post">
			  <section class="panel">
				  <?php if($_REQUEST['msg']) { ?>
				  <div class="alert alert-success fade in" style="margin:10px;">
					  <strong><?=$_REQUEST['msg']?></strong>
				  </div>
				  <?php } ?>
				  <table class="table table-striped table-advance table-hover">
				   <tbody>
					  <tr>
					     <th>Sent To</th>
						 <th>Sent To User</th>
						 <th>Subject</th>
						 <th>Date</th>
						 <th>Action</th>
					  </tr>
					  <?php 
						$sr_no=1;
						while($data = mysql_fetch_assoc($rs))
						{
							if($data['message_type'] == 2)
							{
								$SQL= "SELECT * FROM user WHERE user_id = '".$data[message_receiver_id]."'";
								$senderRs = mysql_query($SQL) or die(mysql_error());
								$senderData = mysql_fetch_assoc($senderRs);
								$name = $senderData['user_name'];
								$type = "Professor";
							}
							if($data['message_type'] == 3)
							{
								$SQL= "SELECT * FROM student WHERE student_id = '$data[message_receiver_id]'";
								$senderRs = mysql_query($SQL) or die(mysql_error());
								$senderData = mysql_fetch_assoc($senderRs);
								$type ="Student";
								$name = $senderData['student_name'];
							}
					  ?>
					  <tr>
						 <td><?=$type?></td>
						 <td><?=$name?></td>
						 <td><?=$data[message_subject]?></td>
						 <td><?=$data[message_date]?></td>
						 <td>
						  <div class="btn-group">
						     <a href="message-view.php?message_id=<?php echo $data[message_id] ?>" class="btn btn-primary">View</a>
						  </div>
						  </td>
					  </tr>
					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="message_id" id="recordID" />
			 </form>
		  </div>
	  </div>
	</div>
<?php include_once("includes/footer.php"); ?>
