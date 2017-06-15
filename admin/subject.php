<?php include_once("includes/header.php"); ?>
<?php include_once("includes/sidebar.php"); ?>
<?php
if($_REQUEST[subject_id])
{
	$SQL="SELECT * FROM subject WHERE subject_id = $_REQUEST[subject_id]";
	$rs=mysql_query($SQL) or die(mysql_error());
	$data=mysql_fetch_assoc($rs);
}
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Add New Subject Form</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            Subject Management
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " method="post" action="lib/subject.php">
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Subject Code</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="subject_code" value="<?=$data[subject_code]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Title</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="subject_title" value="<?=$data[subject_title]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
									<label class="control-label col-sm-2" for="email">Select Class : </label>
									<div class="col-sm-10">
									  <select class="form-control" id="sel1" name="subject_class_id" required>
										<?php echo get_new_optionlist("class","class_id","class_title",$data[subject_class_id]); ?>
									  </select>
									</div>
								  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Description</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" required name="subject_description"><?=$data[subject_description]?></textarea>
                                      </div>
                                  </div>
								  <div class="form-group" style="float:right; margin-right:20px;">
                                      <button class="btn btn-primary" type="submit" style="width:120px;">Submit</button> &nbsp;&nbsp;&nbsp;
									  <button class="btn btn-primary" type="reset" style="width:120px;">Reset</button>
                                  </div>
								  <input type="hidden" name="subject_id" value="<?=$data[subject_id]?>">
								  <input type="hidden" name="act" value="save_subject">
                              </form>
                          </div>
                      </section>                          
                   </div>
                 </div>
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>