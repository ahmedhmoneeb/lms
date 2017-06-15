<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[announcement_id])
	{
		$SQL="SELECT * FROM announcement WHERE announcement_id = $_REQUEST[announcement_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?>
<script>
jQuery(function() {
	jQuery( "#announcement_date" ).datepicker({
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
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Add Announcement</h3></div>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/announcement.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Title : </label>
				<div class="col-sm-10">
				  <input type="text" value="<?=$data['announcement_title']?>" class="form-control" id="announcement_title" name="announcement_title" placeholder="Enter Announcement Title" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Select Class : </label>
				<div class="col-sm-10">
				  <select class="form-control" id="sel1" name="announcement_class_id" required>
					<?php echo get_new_optionlist("class","class_id","class_title",$data[announcement_class_id]); ?>
				  </select>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Date : </label>
				<div class="col-sm-10">
				  <input type="text" value="<?=$data['announcement_date']?>" class="form-control" id="announcement_date" name="announcement_date" placeholder="Enter Announcement Date" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Description : </label>
				<div class="col-sm-10">
				  <textarea class="form-control" rows="5" id="comment" name="announcement_description" placeholder="Enter Announcement Description" required><?=$data['announcement_description']?></textarea>
				</div>
			  </div>
			  <div class="form-group"> 
				<label class="control-label col-sm-2" for="email"></label>
				<div class="col-sm-10" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Submit</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="save_announcement">
			  <input type="hidden" name="avail_file" value="<?=$data[announcement_filename]?>">
			  <input type="hidden" name="announcement_id" value="<?=$data[announcement_id]?>">
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<div><img src="assets/img/side1.jpg" style="width:250px;"></div>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
