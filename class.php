<?php 
	include_once("includes/header.php"); 
	if($_REQUEST[class_id])
	{
		$SQL="SELECT * FROM class WHERE class_id = $_REQUEST[class_id]";
		$rs=mysql_query($SQL) or die(mysql_error());
		$data=mysql_fetch_assoc($rs);
	}
?>
	<div class="container w">
		<div class="row centered">
		<div class="col-sm-8">
		<div style="text-align:left; clear:both; font-weight:bold; border-bottom:1px solid #cccccc; width:100%; margin-bottom:20px;"><h3>Add Class</h3></div>
		<div style="clear:both"></div>
			<form class="form-horizontal" role="form" action="lib/class.php" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Title : </label>
				<div class="col-sm-10">
				  <input type="text" value="<?=$data['class_title']?>" class="form-control" id="class_title" name="class_title" placeholder="Enter Class Title" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Description : </label>
				<div class="col-sm-10">
				  <textarea class="form-control" rows="5" id="comment" name="class_description" placeholder="Enter Class Description" required><?=$data['class_description']?></textarea>
				</div>
			  </div>
			  <div class="form-group"> 
				<label class="control-label col-sm-2" for="email"></label>
				<div class="col-sm-10" style="text-align:left;">
				  <button type="submit" class="btn btn-primary" style="width:140px; padding:8px;">Submit</button>
				  <button type="reset" class="btn btn-danger" style="width:140px; padding:8px;">Reset</button>
				</div>
			  </div>
			  <input type="hidden" name="act" value="save_class">
			  <input type="hidden" name="avail_file" value="<?=$data[class_filename]?>">
			  <input type="hidden" name="class_id" value="<?=$data[class_id]?>">
			</form>
			</div>
			<div class="col-sm-4" style="margin-bottom:10px;">
				<div><img src="assets/img/side1.jpg" style="width:250px;"></div>
			</div>
		</div>
	</div>
<?php include_once("includes/footer.php"); ?>
