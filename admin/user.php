<?php include_once("includes/header.php"); ?>
<?php include_once("includes/sidebar.php"); ?>
<?php
if($_REQUEST[user_id])
{
	$SQL="SELECT * FROM user WHERE user_id = $_REQUEST[user_id]";
	$rs=mysql_query($SQL) or die(mysql_error());
	$data=mysql_fetch_assoc($rs);
}
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>User Form</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            User Management
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " method="post" action="lib/user.php" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">User Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="user_name" value="<?=$data[user_name]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">User Level</label>
                                      <div class="col-sm-10">
										<select name="user_level_id" id="user_level_id" class="form-control m-bot15" required/>
											<?php echo get_new_optionlist("role","role_id","role_name",$data[user_level_id]); ?>
										</select>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Username</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="user_username" value="<?=$data[user_username]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Password</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="user_password" value="<?=$data[user_password]?>">
                                      </div>
                                  </div><div class="form-group">
                                      <label class="col-sm-2 control-label">Confirm Password</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="user_confirm_password" value="<?=$data[user_confirm_password]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Mobile</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="user_mobile" value="<?=$data[user_mobile]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Email</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="user_email" value="<?=$data[user_email]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Date of Birth</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="user_dob" value="<?=$data[user_dob]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Address Line 1</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" required name="user_add1"><?=$data[user_add1]?></textarea>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Address Line 2</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" required name="user_add2"><?=$data[user_add2]?></textarea>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">City</label>
                                      <div class="col-sm-10">
										<select name="user_city" class="form-control m-bot15" required/>
											<?php echo get_new_optionlist("city","city_id","city_name",$data[user_city]); ?>
										</select>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">State</label>
                                      <div class="col-sm-10">
										<select name="user_state" class="form-control m-bot15" required/>
											<?php echo get_new_optionlist("state","state_id","state_name",$data[user_state]); ?>
										</select>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Country</label>
                                      <div class="col-sm-10">
										<select name="user_country" class="form-control m-bot15" required/>
											<?php echo get_new_optionlist("country","country_id","country_name",$data[user_country]); ?>
										</select>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Photo</label>
                                      <div class="col-sm-10">
                                          <input type="file" class="form-control" required name="user_image">
                                      </div>
                                  </div>
								  <div class="form-group" style="float:right; margin-right:20px;">
                                      <button class="btn btn-primary" type="submit" style="width:120px;">Submit</button> &nbsp;&nbsp;&nbsp;
									  <button class="btn btn-primary" type="reset" style="width:120px;">Reset</button>
                                  </div>
								  <input type="hidden" name="act" value="save_user">
								  <input type="hidden" name="avail_image" value="<?=$data[user_image]?>">
  								  <input type="hidden" name="user_id" value="<?=$data[user_id]?>">
                              </form>
                          </div>
                      </section>                          
                   </div>
                 </div>
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>