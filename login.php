<?php include_once("includes/header.php"); ?>
	<div class="container w">
		<div class="row centered">
		<div class="col-sm-8">
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Login To Account</h3></div>
		<?php if($_REQUEST['msg']) { ?>
		  <div class="alert alert-danger fade in" style="margin:10px;">
			  <strong><?=$_REQUEST['msg']?></strong>
		  </div>
		<?php } ?>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/login.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Username : </label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="user_user" name="user_user" placeholder="Enter Username" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Password : </label>
				<div class="col-sm-8">
				  <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter Password" required>
				</div>
			  </div>
			  <div class="form-group"> 
				<label class="control-label col-sm-2" for="email"></label>
				<div class="col-sm-10" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Login To Account</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="<?=$_REQUEST['act']?>">
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<?php include_once("includes/sidebar.php"); ?>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
