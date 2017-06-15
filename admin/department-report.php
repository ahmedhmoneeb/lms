<?php 
	include_once("includes/header.php");
	include_once("includes/sidebar.php");
	include_once("includes/db_connect.php");
	$SQL="SELECT * FROM department";
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
$(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(department_id)
{
	this.document.frm_department.act.value="delete_department";
	this.document.frm_department.submit();
}
</script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Department Report</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
				    <form name="frm_department" action="lib/department.php" method="post">
                      <section class="panel">
                          <header class="panel-heading">
                              Department Listing Page
                          </header>
						  <?php if($_REQUEST['msg']) { ?>
						  <div class="alert alert-success fade in" style="margin:10px;">
							  <strong><?=$_REQUEST['msg']?></strong>
						  </div>
						  <?php } ?>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th>Sr. No.</th>
								 <th>Department Title</th>
								 <th>Department Code</th>
                                 <th>Description</th>
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>
							  <?php 
								$sr_no=1;
								while($data = mysql_fetch_assoc($rs))
								{
							  ?>
                              <tr>
                                 <td><?=$sr_no++?></td>
                                 <td><?=$data[department_title]?></td>
								 <td><?=$data[department_code]?></td>
								 <td><?=$data[department_description]?></td>
                                 <td>
                                  <div class="btn-group">
                                      <a href="department.php?department_id=<?php echo $data[department_id] ?>" class="btn btn-success"><i class="icon_check_alt2"></i></a>
                                      <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[department_id] ?>" data-toggle="modal" href="#myModal-2"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
							  <?php } ?>
                           </tbody>
                        </table>
                      </section>
					  <input type="hidden" name="act" />
					  <input type="hidden" name="department_id" id="recordID" />
					 </form>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>