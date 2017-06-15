<?php include_once("includes/header.php"); ?>
<?php include_once("includes/sidebar.php"); ?>
<?php
if($_REQUEST[tc_id])
{
	$SQL="SELECT * FROM teacher_class WHERE tc_id = $_REQUEST[tc_id]";
	$rs=mysql_query($SQL) or die(mysql_error());
	$data=mysql_fetch_assoc($rs);
}
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Assing Teacher To Class </h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            Teacher Class Assigments
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " method="post" action="lib/teacher_class.php">
								  <div class="form-group">
									<label class="control-label col-sm-2" for="email">Select Teacher : </label>
									<div class="col-sm-10">
									  <select class="form-control" id="sel1" name="tc_user_id" required>
										<?php echo get_new_optionlist("user","user_id","user_name",$data[tc_user_id],"user_level_id = 2"); ?>
									  </select>
									</div>
								  </div>
								  <div class="form-group">
									<label class="control-label col-sm-2" for="email">Select Class : </label>
									<div class="col-sm-10">
									  <select class="form-control" id="sel1" name="tc_class_id" required>
										<?php echo get_new_optionlist("class","class_id","class_title",$data[tc_class_id]); ?>
									  </select>
									</div>
								  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Description</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" required name="tc_description"><?=$data[tc_description]?></textarea>
                                      </div>
                                  </div>
								  <div class="form-group" style="float:right; margin-right:20px;">
                                      <button class="btn btn-primary" type="submit" style="width:120px;">Assign Teacher</button> &nbsp;&nbsp;&nbsp;
									  <button class="btn btn-primary" type="reset" style="width:120px;">Reset</button>
                                  </div>
								  <input type="hidden" name="tc_id" value="<?=$data[tc_id]?>">
								  <input type="hidden" name="act" value="save_teacher_class">
                              </form>
                          </div>
                      </section>                          
                   </div>
                 </div>
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>