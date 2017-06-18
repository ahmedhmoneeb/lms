<?php 
	include_once("includes/header.php");
	include_once("includes/sidebar.php");
	include_once("includes/db_connect.php");
	$SQL="SELECT * FROM student";
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
$(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(student_id)
{
	this.document.frm_student.act.value="delete_student";
	this.document.frm_student.submit();
}
</script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Student Report</h3>
				</div>
			</div>
              <div class="row">
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
                                      <a href="student.php?student_id=<?php echo $data[student_id] ?>" class="btn btn-success"><i class="icon_check_alt2"></i></a>
                                      <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[student_id] ?>" data-toggle="modal" href="#myModal-2"><i class="icon_close_alt2"></i></a>
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
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>