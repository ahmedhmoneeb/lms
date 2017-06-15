<?php 
	include_once("includes/header.php"); 
	$data = $_REQUEST;
	if($_SESSION['user_details']['student_id'])
	{
		$SQL="SELECT * FROM student WHERE student_id = ".$_SESSION['user_details']['student_id'];
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?>
<script>
jQuery(function() {
	jQuery( "#student_dob" ).datepicker({
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
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Student Signup</h3></div>
		<?php if($_REQUEST['msg']) { ?>
			<div class="alert alert-danger fade in" style="margin:10px;">
			  <strong><?=$_REQUEST['msg']?></strong>
			</div>
		 <?php } ?>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/student.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Student Name</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="student_name" value="<?=$data[student_name]?>">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Student Course</label>
				  <div class="col-sm-8">
					<select name="student_course_id" id="student_course_id" class="form-control m-bot15" required/>
						<?php echo get_new_optionlist("class","class_id","class_title",$data[student_course_id]); ?>
					</select>
				  </div>
			  </div>
			  <div class="form-group hide1">
				  <label class="col-sm-3 control-label">Username</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="student_username" value="<?=$data[student_username]?>">
				  </div>
			  </div>
			  <div class="form-group hide1">
				  <label class="col-sm-3 control-label">Password</label>
				  <div class="col-sm-8">
					  <input type="password" class="form-control" required name="student_password" value="<?=$data[student_password]?>">
				  </div>
			  </div><div class="form-group hide1">
				  <label class="col-sm-3 control-label">Confirm Password</label>
				  <div class="col-sm-8">
					  <input type="password" class="form-control" required name="student_confirm_password" value="<?=$data[student_confirm_password]?>">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Roll No.</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="student_rollno" value="<?=$data[student_rollno]?>">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Father Name</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="student_father_name" value="<?=$data[student_father_name]?>">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Date of Birth</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="student_dob" id="student_dob" value="<?=$data[student_dob]?>">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Mobile Number</label>
				  <div class="col-sm-8">
					  <input type="text" class="form-control" required name="student_mobile" value="<?=$data[student_mobile]?>">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Photo</label>
				  <div class="col-sm-8">
					  <input type="file" class="form-control" name="student_image">
				  </div>
			  </div>
			  <div class="form-group">
				  <label class="col-sm-3 control-label">Other Details</label>
				  <div class="col-sm-8">
					  <textarea class="form-control" required name="student_details"><?=$data[student_details]?></textarea>
				  </div>
			  </div>
			  <div class="form-group"> 
				<label class="control-label col-sm-3" for="email"></label>
				<div class="col-sm-8" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Submit</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="save_student">
			  <input type="hidden" name="avail_image" value="<?=$data[student_image]?>">
			  <input type="hidden" name="student_id" value="<?=$data[student_id]?>">
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
