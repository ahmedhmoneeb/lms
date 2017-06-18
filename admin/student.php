<?php include_once("includes/header.php"); ?>
<?php include_once("includes/sidebar.php"); ?>
<?php
if($_REQUEST[student_id])
{
	$SQL="SELECT * FROM student WHERE student_id = $_REQUEST[student_id]";
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
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i>Student Form</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            Student Management
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " method="post" action="lib/student.php" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Student Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="student_name" value="<?=$data[student_name]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Student Course</label>
                                      <div class="col-sm-10">
										<select name="student_course_id" id="student_course_id" class="form-control m-bot15" required/>
											<?php echo get_new_optionlist("class","class_id","class_title",$data[student_course_id]); ?>
										</select>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Username</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="student_username" value="<?=$data[student_username]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Password</label>
                                      <div class="col-sm-10">
                                          <input type="password" class="form-control" required name="student_password" value="<?=$data[student_password]?>">
                                      </div>
                                  </div><div class="form-group">
                                      <label class="col-sm-2 control-label">Confirm Password</label>
                                      <div class="col-sm-10">
                                          <input type="password" class="form-control" required name="student_confirm_password" value="<?=$data[student_password]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Roll No.</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="student_rollno" value="<?=$data[student_rollno]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Father Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="student_father_name" value="<?=$data[student_father_name]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Date of Birth</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="student_dob" id="student_dob" value="<?=$data[student_dob]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Mobile Number</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="student_mobile" value="<?=$data[student_mobile]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Photo</label>
                                      <div class="col-sm-10">
                                          <input type="file" class="form-control" name="student_photo">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Other Details</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" required name="student_details"><?=$data[student_details]?></textarea>
                                      </div>
                                  </div>
								  <div class="form-group" style="float:right; margin-right:20px;">
                                      <button class="btn btn-primary" type="submit" style="width:120px;">Submit</button> &nbsp;&nbsp;&nbsp;
									  <button class="btn btn-primary" type="reset" style="width:120px;">Reset</button>
                                  </div>
								  <input type="hidden" name="student_id" value="<?=$data[student_id]?>">
								  <input type="hidden" name="avail_image" value="<?=$data[student_photo]?>">
								  <input type="hidden" name="act" value="save_student">
                              </form>
                          </div>
                      </section>                          
                   </div>
                 </div>
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>