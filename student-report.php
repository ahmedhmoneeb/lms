<?php 
include_once("includes/header.php"); 
$SQL="SELECT * FROM student";
$rs=mysql_query($SQL) or die(mysql_error());
?>
<script>
jQuery(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(student_id)
{
	this.document.frm_student.act.value="delete_student";
	this.document.frm_student.submit();
}
</script>
	<div class="container w">
		<div class="row">
			<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:95%; margin-bottom:10px; margin-left:20px"><h3>Assigments Report</h3></div>
			<div style="clear:both"></div>
		  <div class="col-lg-12">
			<form name="frm_student" action="lib/student.php" method="post">
			  <section class="panel">
				  <header class="panel-heading">
					  Student Listing Page
				  </header>
				  <?php if($_REQUEST['msg']) { ?>
				  <div class="alert alert-success fade in" style="margin:10px;">
					  <strong><?=$_REQUEST['msg']?></strong>
				  </div>
				  <?php } ?>
				  <table class="table table-striped table-advance table-hover">
				   <tbody>
					  <tr>
							<th scope="col">Sr. No.</th>
							<th scope="col">Image</th>
							<th scope="col">Name</th>
							<th scope="col">Roll No.</th>
							<th scope="col">Father Name</th>
							<th scope="col">Mobile</th>
							<th><i class="icon_cogs"></i> Action</th>
					  </tr>
					  <?php 
						$sr_no=1;
						while($data = mysql_fetch_assoc($rs))
						{
					  ?>
					  <tr>
							<td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
							<td><img src="<?=$SERVER_PATH.'uploads/'.$data[student_photo]?>" style="heigh:50px; width:50px"></td>
							<td><?=$data[student_name]?></td>
							<td><?=$data[student_rollno]?></td>
							<td><?=$data[student_father_name]?></td>
							<td><?=$data[student_mobile]?></td>
							<td>
							  <div class="btn-group">
								  <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[student_id] ?>" data-toggle="modal" href="#myModal-2">View</a>
							  </div>
							</td>
					  </tr>
					  <?php } ?>
				   </tbody>
				</table>
			  </section>
			  <input type="hidden" name="act" />
			  <input type="hidden" name="student_id" id="recordID" />
			 </form>
		  </div>
	  </div>
	</div>
<?php include_once("includes/footer.php"); ?>
