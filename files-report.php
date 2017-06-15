<?php 
	include_once("includes/header.php"); 
	global $SERVER_PATH;
	if(isset($_SESSION['user_details']['student_course_id']))
	{
		$SQL="SELECT * FROM files,user,class WHERE files_class_id = class_id AND files_teacher_id = user_id AND files_class_id = '".$_SESSION['user_details']['student_course_id']."'";
	}
	else
	{
		$SQL="SELECT * FROM files,user,class WHERE files_class_id = class_id AND files_teacher_id = user_id AND user_id = '".$_SESSION['user_details']['user_id']."'";
	}
	$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
jQuery(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(files_id)
{
	this.document.frm_files.act.value="delete_files";
	this.document.frm_files.submit();
}
</script>
	<div class="container w">
		<div class="row">
			<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:95%; margin-bottom:10px; margin-left:20px"><h3>Downloaded Files Report</h3></div>
			<div style="clear:both"></div>
		  <div class="col-lg-12">
			<form name="frm_files" action="lib/files.php" method="post">
			  <section class="panel">
				  <header class="panel-heading">
					  Downloaded Files Listing Page
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
						 <th>Class</th>
						 <th>Teacher</th>
						 <th>Filename</th>
						 <th style="width:14%">Download</th>
						 <?php if($_SESSION['user_details']['user_level_id'] == 2) { ?>
							<th style="width:14%">Action</th>
						 <?php } ?>
					  </tr>
					  <?php 
						$sr_no=1;
						while($data = mysql_fetch_assoc($rs))
						{
					  ?>
					  <tr>
						 <td><?=$data[files_title]?></td>
						 <td><?=$data[class_title]?></td>
						 <td><?=$data[user_name]?></td>
						 <td><?=$data[files_filename]?></td>
						 <td>
							 <div class="btn-group">
							  <a href="<?php echo $SERVER_PATH."uploads/".$data[files_filename] ?>" class="btn btn-primary" target="_blank">Download File</a>
							 </div>
					     </td>
						 <?php if($_SESSION['user_details']['user_level_id'] == 2) { ?>
						 <td>
						  <div class="btn-group">
							  <a href="files.php?files_id=<?php echo $data[files_id] ?>" class="btn btn-success">Edit</a>
							  <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[files_id] ?>" data-toggle="modal" href="#myModal-2">Delete</i></a>
						  </div>
						  </td>
						  <?php } ?>
					  </tr>
					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="files_id" id="recordID" />
			 </form>
		  </div>
	  </div>
	</div>
<?php include_once("includes/footer.php"); ?>
