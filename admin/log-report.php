<?php 
	include_once("includes/header.php");
	include_once("includes/sidebar.php");
	include_once("includes/db_connect.php");
	$SQL="SELECT * FROM user_log";
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
$(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(ulog_id)
{
	this.document.frm_ulog.act.value="delete_ulog";
	this.document.frm_ulog.submit();
}
</script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>User Log Report</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
				    <form name="frm_ulog" action="lib/ulog.php" method="post">
                      <section class="panel">
                          <header class="panel-heading">
                              User Acivity Log
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
								 <th>UserID</th>
								 <th>Username</th>
                                 <th>Login Date</th>
								 <th>Logout Date</th>
                              </tr>
							  <?php 
								$sr_no=1;
								while($data = mysql_fetch_assoc($rs))
								{
							  ?>
                              <tr>
                                 <td><?=$sr_no++?></td>
                                 <td><?=$data[ulog_user_id]?></td>
								 <td><?=$data[ulog_username]?></td>
								 <td><?=$data[ulog_login_date]?></td>
								 <td><?=$data[ulog_logout_date]?></td>
                              </tr>
							  <?php } ?>
                           </tbody>
                        </table>
                      </section>
					  <input type="hidden" name="act" />
					  <input type="hidden" name="ulog_id" id="recordID" />
					 </form>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>