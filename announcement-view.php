<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[announcement_id])
	{
		$SQL="SELECT * FROM announcement,user,class WHERE announcement_class_id = class_id AND announcement_teacher_id = user_id AND announcement_id = $_REQUEST[announcement_id]";
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
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>View Announcement</h3></div>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/announcement.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Title : </label>
				<div class="col-sm-10" style="text-align:left"><?=$data['announcement_title']?></div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Class : </label>
				<div class="col-sm-10" style="text-align:left"><?=$data[class_title]?></div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Teacher : </label>
				<div class="col-sm-10" style="text-align:left"><?=$data[user_name]?></div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Date : </label>
				<div class="col-sm-10" style="text-align:left"><?=$data['announcement_date']?></div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Description : </label>
				<div class="col-sm-10" style="text-align:left"><?=$data['announcement_description']?></div>
			  </div>
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<div><img src="assets/img/side1.jpg" style="width:250px;"></div>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
