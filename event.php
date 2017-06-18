<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[event_id])
	{
		$SQL="SELECT * FROM event WHERE event_id = $_REQUEST[event_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?>
<script>
jQuery(function() {
	jQuery( "#event_date_end" ).datepicker({
	  changeMonth: true,
	  changeYear: true,
	   yearRange: "-0:+1",
	   dateFormat: 'd MM,yy'
	});
	jQuery( "#event_date_start" ).datepicker({
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
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Add Event</h3></div>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/event.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Title : </label>
				<div class="col-sm-10">
				  <input type="text" value="<?=$data['event_title']?>" class="form-control" id="event_title" name="event_title" placeholder="Enter Event Title" required>
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
				<label class="control-label col-sm-2" for="email">Start Date : </label>
				<div class="col-sm-10">
				  <input type="text" value="<?=$data['event_date_start']?>" class="form-control" id="event_date_start" name="event_date_start" placeholder="Enter Start Date" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">End Date : </label>
				<div class="col-sm-10">
				  <input type="text" value="<?=$data['event_date_end']?>" class="form-control" id="event_date_end" name="event_date_end" placeholder="Enter End Date" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Description : </label>
				<div class="col-sm-10">
				  <textarea class="form-control" rows="5" id="comment" name="event_description" placeholder="Enter Event Description" required><?=$data['event_description']?></textarea>
				</div>
			  </div>
			  <div class="form-group"> 
				<label class="control-label col-sm-2" for="email"></label>
				<div class="col-sm-10" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Submit</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="save_event">
			  <input type="hidden" name="avail_file" value="<?=$data[event_filename]?>">
			  <input type="hidden" name="event_id" value="<?=$data[event_id]?>">
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<div><img src="assets/img/side1.jpg" style="width:250px;"></div>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
