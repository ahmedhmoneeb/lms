<?php include_once("includes/header.php"); ?>
<?php include_once("includes/sidebar.php"); ?>
<?php
if($_REQUEST[syear_id])
{
	$SQL="SELECT * FROM school_year WHERE syear_id = $_REQUEST[syear_id]";
	$rs=mysql_query($SQL) or die(mysql_error());
	$data=mysql_fetch_assoc($rs);
}
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Add New School Year Form</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            School Year Management
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " method="post" action="lib/school_year.php">
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Title</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="syear_title" value="<?=$data[syear_title]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Description</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" required name="syear_description"><?=$data[syear_description]?></textarea>
                                      </div>
                                  </div>
								  <div class="form-group" style="float:right; margin-right:20px;">
                                      <button class="btn btn-primary" type="submit" style="width:120px;">Submit</button> &nbsp;&nbsp;&nbsp;
									  <button class="btn btn-primary" type="reset" style="width:120px;">Reset</button>
                                  </div>
								  <input type="hidden" name="syear_id" value="<?=$data[syear_id]?>">
								  <input type="hidden" name="act" value="save_school_year">
                              </form>
                          </div>
                      </section>                          
                   </div>
                 </div>
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>