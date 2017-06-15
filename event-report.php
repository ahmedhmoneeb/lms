<?php 
	include_once("includes/header.php"); 
	if(isset($_SESSION['user_details']['student_course_id']))
	{
		$SQL="SELECT * FROM event,user,class WHERE event_class_id = class_id AND event_teacher_id = user_id AND event_class_id = '".$_SESSION['user_details']['student_course_id']."'";
	}
	else
	{
		$SQL="SELECT * FROM event,user,class WHERE event_class_id = class_id AND event_teacher_id = user_id AND user_id = '".$_SESSION['user_details']['user_id']."'";
	}
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
jQuery(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(event_id)
{
	this.document.frm_event.act.value="delete_event";
	this.document.frm_event.submit();
}
</script>
	<div class="container w">
		<div class="row">
			<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:95%; margin-bottom:10px; margin-left:20px"><h3>Event Report</h3></div>
			<div style="clear:both"></div>
		  <div class="col-lg-12">
			<form name="frm_event" action="lib/event.php" method="post">
			  <section class="panel">
				  <header class="panel-heading">
					  Event Listing Page
				  </header>
				  <?php if($_REQUEST['msg']) { ?>
				  <div class="alert alert-success fade in" style="margin:10px;">
					  <strong><?=$_REQUEST['msg']?></strong>
				  </div>
				  <?php } ?>
				  <table class="table table-striped table-advance table-hover">
				   <tbody>
					  <tr>
						 <th>Title</th>
						 <th>Class Name</th>
						 <th>Teacher Name</th>
						 <th>Start Date</th>
						 <th>End Date</th>
						 <th>Action</th>
					  </tr>
					  <?php 
						$sr_no=1;
						while($data = mysql_fetch_assoc($rs))
						{
					  ?>
					  <tr>
						 <td><?=$data[event_title]?></td>
						 <td><?=$data[class_title]?></td>
						 <td><?=$data[user_name]?></td>
						 <td><?=$data[event_date_start]?></td>
						 <td><?=$data[event_date_end]?></td>
						 <td>
						  <div class="btn-group">
						     <a href="event-view.php?event_id=<?php echo $data[event_id] ?>" class="btn btn-primary">View</a>
							<?php if($_SESSION['user_details']['user_level_id'] == 2) { ?>
							  <a href="event.php?event_id=<?php echo $data[event_id] ?>" class="btn btn-success">Edit</a>
							  <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[event_id] ?>" data-toggle="modal" href="#myModal-2">Delete</i></a>
						    <?php } ?>
						  </div>
						  </td>
					  </tr>
					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="event_id" id="recordID" />
			 </form>
		  </div>
	  </div>
	</div>
<?php include_once("includes/footer.php"); ?>
