<?php 
	include_once("includes/header.php"); 
	global $SERVER_PATH;
	if(isset($_SESSION['user_details']['student_course_id']))
	{
		$SQL="SELECT * FROM assignment,user,class WHERE assignment_class_id = class_id AND assignment_teacher_id = user_id AND assignment_class_id = '".$_SESSION['user_details']['student_course_id']."'";
	}
	else
	{
		$SQL="SELECT * FROM assignment,user,class WHERE assignment_class_id = class_id AND assignment_teacher_id = user_id AND user_id = '".$_SESSION['user_details']['user_id']."'";
	}
	
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
jQuery(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(assignment_id)
{
	this.document.frm_assignment.act.value="delete_assignment";
	this.document.frm_assignment.submit();
}
</script>
	<div class="container w">
		<div class="row">
			<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:95%; margin-bottom:10px; margin-left:20px"><h3>Assigments Report</h3></div>
			<div style="clear:both"></div>
		  <div class="col-lg-12">
			<form name="frm_assignment" action="lib/assignment.php" method="post">
			  <section class="panel">
				  <header class="panel-heading">
					  Assigments Listing Page
				  </header>
				  <?php if($_REQUEST['msg']) { ?>
				  <div class="alert alert-success fade in" style="margin:10px;">
					  <strong><?=$_REQUEST['msg']?></strong>
				  </div>
				  <?php } ?>
				  <table class="table table-striped table-advance table-hover">
				   <tbody>
					  <tr>
						 <th style="width:14%">Title</th>
						 <th style="width:14%">Class</th>
						 <th style="width:14%">Teacher</th>
						 <th style="width:14%">Filename</th>
						 <th style="width:14%">Download</th>
						 <?php if($_SESSION['user_details']['user_level_id'] == 2) { ?>
							<th style="width:14%"><i class="icon_cogs"></i> Action</th>
						 <?php } ?>
					  </tr>
					  <?php 
						$sr_no=1;
						while($data = mysql_fetch_assoc($rs))
						{
					  ?>
					  <tr>
						 <td><?=$data[assignment_title]?></td>
						 <td><?=$data[class_title]?></td>
						 <td><?=$data[user_name]?></td>
						 <td><?=$data[assignment_filename]?></td>
						 <td>
							 <div class="btn-group">
							  <a href="<?php echo $SERVER_PATH."uploads/".$data[assignment_filename] ?>" class="btn btn-primary" target="_blank">Download Assigment</a>
							 </div>
					     </td>
						 <?php if($_SESSION['user_details']['user_level_id'] == 2) { ?>
						 <td>
						  <div class="btn-group">
							  <a href="assignment.php?assignment_id=<?php echo $data[assignment_id] ?>" class="btn btn-success">Edit</a>
							  <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[assignment_id] ?>" data-toggle="modal" href="#myModal-2">Delete</i></a>
						  </div>
						 </td>
						 <?php } ?>
					  </tr>
					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="assignment_id" id="recordID" />
			 </form>
		  </div>
	  </div>
	</div>
<?php include_once("includes/footer.php"); ?>
