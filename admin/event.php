<?php include_once("includes/header.php"); ?>
<?php include_once("includes/sidebar.php"); ?>
<?php
if($_REQUEST[event_id])
{
	$SQL="SELECT * FROM event WHERE event_id = $_REQUEST[event_id]";
	$rs=mysql_query($SQL) or die(mysql_error());
	$data=mysql_fetch_assoc($rs);
}
?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Add New Event Form</h3>
				</div>
			</div>
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            Event Management
                          </header>
                          <div class="panel-body">
                              <form class="form-horizontal " method="post" action="lib/event.php">
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Title</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="event_title" value="<?=$data[event_title]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
									<label class="control-label col-sm-2" for="email">Select Class : </label>
									<div class="col-sm-10">
									  <select class="form-control" id="sel1" name="event_class_id" required>
										<?php echo get_new_optionlist("class","class_id","class_title",$data[event_class_id]); ?>
									  </select>
									</div>
								  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Event Start Date</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="event_date_start" value="<?=$data[event_date_start]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Event End Date</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control" required name="event_date_end" value="<?=$data[event_date_end]?>">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">Description</label>
                                      <div class="col-sm-10">
                                          <textarea class="form-control" required name="event_description"><?=$data[event_description]?></textarea>
                                      </div>
                                  </div>
								  <div class="form-group" style="float:right; margin-right:20px;">
                                      <button class="btn btn-primary" type="submit" style="width:120px;">Submit</button> &nbsp;&nbsp;&nbsp;
									  <button class="btn btn-primary" type="reset" style="width:120px;">Reset</button>
                                  </div>
								  <input type="hidden" name="event_id" value="<?=$data[event_id]?>">
								  <input type="hidden" name="act" value="save_event">
                              </form>
                          </div>
                      </section>                          
                   </div>
                 </div>
              <!-- page end-->
          </section>
      </section>
<?php include_once("includes/footer.php"); ?>