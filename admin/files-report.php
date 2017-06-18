<?php 
	include_once("includes/header.php");
	include_once("includes/sidebar.php");
	include_once("includes/db_connect.php");
	$SQL="SELECT * FROM files,user,class WHERE files_class_id = class_id AND files_teacher_id = user_id";
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
$(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(files_id)
{
	this.document.frm_files.act.value="delete_files";
	this.document.frm_files.submit();
}
</script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Files Report</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
				    <form name="frm_files" action="lib/files.php" method="post">
                      <section class="panel">
                          <header class="panel-heading">
                              Files Listing Page
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
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>