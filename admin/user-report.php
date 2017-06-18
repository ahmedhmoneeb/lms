<?php 
	include_once("includes/header.php");
	include_once("includes/sidebar.php");
	include_once("includes/db_connect.php");
	$SQL="SELECT * FROM user";
	$rs=mysql_query($SQL) or die(mysql_error());
	global $SERVER_PATH;
?>
<script>
$(document).on("click", ".delete-dialog", function () {
     var id = $(this).data('id');
	 $("#recordID").val( id );
});
function delete_record(user_id)
{
	this.document.frm_user.act.value="delete_user";
	this.document.frm_user.submit();
}
</script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>User Report</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
				    <form name="frm_user" action="lib/user.php" method="post">
                      <section class="panel">
                          <header class="panel-heading">
                              User Listing Page
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
								<th scope="col">Mobile</th>
								<th scope="col">Email</th>
								<th scope="col">Date Of Birth</th>
                                <th><i class="icon_cogs"></i> Action</th>
                              </tr>
							  <?php 
								$sr_no=1;
								while($data = mysql_fetch_assoc($rs))
								{
							  ?>
                              <tr>
                                <td style="text-align:center; font-weight:bold;"><?=$sr_no++?></td>
								<td><img src="<?=$SERVER_PATH.'uploads/'.$data[user_image]?>" style="heigh:50px; width:50px"></td>
								<td><?=$data[user_name]?></td>
								<td><?=$data[user_mobile]?></td>
								<td><?=$data[user_email]?></td>
								<td><?=$data[user_dob]?></td>
                                <td>
                                  <div class="btn-group">
                                      <a href="user.php?user_id=<?php echo $data[user_id] ?>" class="btn btn-success"><i class="icon_check_alt2"></i></a>
                                      <a class="delete-dialog btn btn-danger" data-id="<?php echo $data[user_id] ?>" data-toggle="modal" href="#myModal-2"><i class="icon_close_alt2"></i></a>
                                  </div>
                                </td>
                              </tr>
							  <?php } ?>
                           </tbody>
                        </table>
                      </section>
					  <input type="hidden" name="act" />
					  <input type="hidden" name="user_id" id="recordID" />
					 </form>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>