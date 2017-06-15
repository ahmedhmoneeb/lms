<?php 
	include_once("includes/header.php"); 
	if(isset($_SESSION['user_details']['student_course_id']))
	{
		$SQL="SELECT * FROM announcement,user,class WHERE announcement_class_id = class_id AND announcement_teacher_id = user_id AND announcement_class_id = '".$_SESSION['user_details']['student_course_id']."'";
	}
	else
	{
		$SQL="SELECT * FROM announcement,user,class WHERE announcement_class_id = class_id AND announcement_teacher_id = user_id AND user_id = '".$_SESSION['user_details']['user_id']."'";
	}
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
jQuery(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(announcement_id)
{
	this.document.frm_announcement.act.value="delete_announcement";
	this.document.frm_announcement.submit();
}
</script>
	<div class="container w">
		<div class="row">
			<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:95%; margin-bottom:10px; margin-left:20px"><h3>Announcement Report</h3></div>
			<div style="clear:both"></div>
		  <div class="col-lg-12">
			<form name="frm_announcement" action="lib/announcement.php" method="post">
			  <section class="panel">
				  <header class="panel-heading">
					  Announcement Listing Page
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
						 <th>Date</th>
						 <th>Action</th>
					  </tr>
					  <?php 
						$sr_no=1;
						while($data = mysql_fetch_assoc($rs))
						{
					  ?>
					  <tr>
						 <td><?=$data[announcement_title]?></td>
						 <td><?=$data[class_title]?></td>
						 <td><?=$data[user_name]?></td>
						 <td><?=$data[announcement_date]?></td>
						 <td>
						  <div class="btn-group">
						     <a href="announcement-view.php?announcement_id=<?php echo $data[announcement_id] ?>" class="btn btn-primary">View</a>
							<?php if($_SESSION['user_details']['user_level_id'] == 2) { ?>
							  <a href="announcement.php?announcement_id=<?php echo $data[announcement_id] ?>" class="btn btn-success">Edit</a>
							  <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[announcement_id] ?>" data-toggle="modal" href="#myModal-2">Delete</i></a>
						    <?php } ?>
						  </div>
						  </td>
					  </tr>
					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="announcement_id" id="recordID" />
			 </form>
		  </div>
	  </div>
	</div>
<?php include_once("includes/footer.php"); ?>
