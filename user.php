<?php 
	include_once("includes/header.php"); 
	$data = $_REQUEST;
	if($_SESSION['user_details']['user_id'])
	{
		$SQL="SELECT * FROM user WHERE user_id = ".$_SESSION['user_details']['user_id'];
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?>
<script>
jQuery(function() {
	jQuery( "#user_dob" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-0:+1",
	   dateFormat: 'd MM,yy'
	});
});
</script>

	<div class="container w">
		<div class="row centered">
		<div class="col-sm-8">
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Professor Signup</h3></div>
		<?php if($_REQUEST['msg']) { ?>
			<div class="alert alert-danger fade in" style="margin:10px;">
			  <strong><?=$_REQUEST['msg']?></strong>
			</div>
		 <?php } ?>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/user.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				  <label class="col-sm-3 control-label">User Name</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="user_name" value="<?=$data[user_name]?>">
				  </div>
			  </div>
			  <div class="form-group" style="display:none">
				  <label class="col-sm-3 control-label">User Level</label>
				  <div class="col-sm-8">
					<select name="user_level_id" id="user_level_id" class="form-control m-bot15" required/>
						<?php echo get_new_optionlist("role","role_id","role_name",2); ?>
					</select>
				  </div>
			  </div>
			  <div class="form-group hide1">
				  <label class="col-sm-3 control-label">Username</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="user_username" value="<?=$data[user_username]?>">
				  </div>
			  </div>
			  <div class="form-group hide1">
				  <label class="col-sm-3 control-label">Password</label>
				  <div class="col-sm-8">
					  <input type="password" class="form-control" required name="user_password" value="<?=$data[user_password]?>">
				  </div>
			  </div>
			  <div class="form-group hide1">
				  <label class="col-sm-3 control-label">Confirm Password</label>
				  <div class="col-sm-8">
					  <input type="password" class="form-control" required name="user_confirm_password" value="<?=$data[user_password]?>">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Mobile</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="user_mobile" value="<?=$data[user_mobile]?>">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Email</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="user_email" value="<?=$data[user_email]?>">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Date of Birth</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="user_dob" value="<?=$data[user_dob]?>" id="user_dob">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Address Line 1</label>
				  <div class="col-sm-8">
					  <textarea class="form-control" required name="user_add1"><?=$data[user_add1]?></textarea>
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Address Line 2</label>
				  <div class="col-sm-8">
					  <textarea class="form-control" required name="user_add2"><?=$data[user_add2]?></textarea>
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">City</label>
				  <div class="col-sm-8">
					<select name="user_city" class="form-control m-bot15" required/>
						<?php echo get_new_optionlist("city","city_id","city_name",$data[user_city]); ?>
					</select>
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">State</label>
				  <div class="col-sm-8">
					<select name="user_state" class="form-control m-bot15" required/>
						<?php echo get_new_optionlist("state","state_id","state_name",$data[user_state]); ?>
					</select>
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Country</label>
				  <div class="col-sm-8">
					<select name="user_country" class="form-control m-bot15" required/>
						<?php echo get_new_optionlist("country","country_id","country_name",$data[user_country]); ?>
					</select>
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Photo</label>
				  <div class="col-sm-8">
					  <input type="file" class="form-control" name="user_image">
				  </div>
			  </div>
			  <div class="form-group"> 
				<label class="control-label col-sm-3" for="email"></label>
				<div class="col-sm-8" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Submit</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="save_user">
			  <input type="hidden" name="avail_image" value="<?=$data[user_image]?>">
			  <input type="hidden" name="user_id" value="<?=$data[user_id]?>">
			</form>
			</div>
			<div class="col-sm-3" style="margin-bottom:10px;">
				<div><img src="assets/img/side1.jpg" style="width:250px;"></div>
			</div>
		</div>
	</div>
<?php
	if($_SESSION['login'] == 1)
	{
?>
	<script>
		jQuery( ".hide1" ).hide();
	</script>
<?php		
	}
?>
<?php include_once("includes/footer.php"); ?>
